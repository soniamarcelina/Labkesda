<?php if ( !defined('BASEPATH')) exit ('No direct Script allowed');

class OrgChart extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// jika belum login redirect ke login
		if ($this->session->userdata('logged')<>1){
			redirect(site_url(auth));
		}
	}

	public function index($id = null)
	{
		
		$rows = array();
		$parent = array();
		$content = '';
		if ($id != null) {
			$parent = $this->DirectPosition_model->getById($id)->row();
			if ($parent->Divisi != '') {
				$child = $this->DirectPosition_model->getDiv($parent->Divisi)->result();
				$rows['parent'] = $parent;
				$rows['child'] = $child;
				$content = ' - '.$parent->Divisi;
			}

		}

		$data = array(
			'title' => 'Organization Chart Regional 4'.$content,
			'content' => $content,
			'rows' => json_encode($rows),
			'id' => $id,	
			);

			$this->load->view('/headfoot/header',$data);
			
			
			$this->load->view('/Orgchart',$data);
            
            $this->load->view('/headfoot/footer');
	}

	public function d3(){
		$rows = $this->OCF_model->getAll()->result();

		$data = array(
			'title' => 'OCF Request',
			'content' => 'Data List',
			'rows' => $rows,
			'sidebar' => 'sidebar-tad'	
			);

			//ini adalah controller user
            $this->load->view('/headfoot/header',$data);
			$this->load->view('/OrgChartd3',$data);
            $this->load->view('/headfoot/footer');
	}

	public function detail($id = null)
	{
		
		$rows = array();
		$parent = array();
		$content = '';
		if ($id != null) {
			$parent = $this->DirectPosition_model->groupByChief(array())->result();
			foreach ($parent as $par) {
				
			}

		}

		$data = array(
			'title' => 'Organization Chart Regional 4'.$content,
			'content' => $content,
			'rows' => json_encode($rows),
			'id' => $id,	
		);

		$this->load->view('/headfoot/header',$data);
			
		$this->load->view('/OrgchartDetail',$data);
			
        $this->load->view('/headfoot/footer');
	}

	public function getByChief()
	{
		//GL2
		$posData = $this->DirectPosition_model->groupByChief(array())->result();
		
		echo json_encode($posData);

	}

	public function getGL($no = 0)
	{
		//GL2
		$posData = $this->DirectPosition_model->getGL($no)->result();
		foreach ($posData as $pos) {
			if ($pos->Divisi != '') {
				$pos->Headcount = (int)$this->DirectPosition_model->countDiv($pos->Divisi)->row()->total_div;
				if($this->input->post('id') == $pos->ID_Position){
					if ($pos->Headcount > 250) {
						$pos->Child = $this->DirectPosition_model->getDivLimit($pos->Divisi,$pos->ID_Position,['GL8','GL7'])->result();
						foreach ($pos->Child as $pC) {
								$pC->Headcount = (int)$this->DirectPosition_model->countbyAtasan($pC->ID_Position)->row()->total;	
								if ($pC->Name == ""){
									$pC->Name = 'Vacant';
									$pC->color = "red";
								}else{
									$pC->color = "black";
								}
						}
					}else{

						$pos->Child = $this->DirectPosition_model->getDiv($pos->Divisi,$pos->ID_Position)->result();
						foreach ($pos->Child as $pC) {
								$pC->Headcount = (int)$this->DirectPosition_model->countbyAtasan($pC->ID_Position)->row()->total;	
								if ($pC->Name == ""){
									$pC->Name = 'Vacant';
									$pC->color = "red";
								}else{
									$pC->color = "black";
								}
						}
					}
				}
			}else if($pos->Sub_Division != ''){
				$pos->Headcount = (int)$this->DirectPosition_model->countSubDiv($pos->Sub_Division)->row()->total_div;

				if($this->input->post('id') == $pos->ID_Position){
					if ($pos->Headcount > 250) {
						$pos->Child = $this->DirectPosition_model->getSubDivLimit($pos->Sub_Division,$pos->ID_Position)->result();

						foreach ($pos->Child as $pC) {
								$pC->Headcount = (int)$this->DirectPosition_model->countbyAtasan($pC->ID_Position)->row()->total;	
								if ($pC->Name == ""){
									$pC->Name = 'Vacant';
									$pC->color = "red";
								}else{
									$pC->color = "black";
								}
						}
					}else{
						$pos->Child = $this->DirectPosition_model->getSubDiv($pos->Sub_Division,$pos->ID_Position)->result();
						foreach ($pos->Child as $pC) {
								$pC->Headcount = (int)$this->DirectPosition_model->countbyAtasan($pC->ID_Position)->row()->total;	
								if ($pC->Name == ""){
									$pC->Name = 'Vacant';
									$pC->color = "red";
								}else{
									$pC->color = "black";
								}
						}
					}
				}
			}else{
				$pos->Headcount = 0;
			}
			//GL3
			if($this->input->post('id') == $pos->ID_Position){
				
				//$pos->Child = $this->DirectPosition_model->getChild($pos->ID_Position)->result();
				

				// foreach ($pos->Child as $p) {
				// 	if ($p->Sub_Division != '') {
				// 		$p->Headcount = (int)$this->DirectPosition_model->countSubDiv($p->Sub_Division)->row()->total_div;	
				// 		//GL4
				// 		$p->Child = $this->DirectPosition_model->getSubDiv($p->Sub_Division,$p->ID_Position)->result();
				// 		foreach ($p->Child as $pC) {
				// 			$pC->Headcount = (int)$this->DirectPosition_model->countbyChief($pC->ID_Position)->row()->total;	
				// 			if ($pC->Name == ""){
				// 				$pC->Name = 'Vacant';
				// 				$pC->color = "red";
				// 			}else{
				// 				$pC->color = "black";
				// 			}
				// 		}
				// 	}else if($p->Departemen != ''){
				// 		$p->Headcount = (int)$this->DirectPosition_model->countDept($p->Departemen)->row()->total_div;
				// 		$p->Child = $this->DirectPosition_model->getChild($p->ID_Position)->result();
				// 		foreach ($p->Child as $pC) {
							
							
				// 			$pC->Headcount = (int)$this->DirectPosition_model->countbyChief($pC->ID_Position)->row()->total;	
				// 			if ($pC->Name == ""){
				// 				$pC->Name = 'Vacant';
				// 				$pC->color = "red";
				// 			}else{
				// 				$pC->color = "black";
				// 			}
				// 		}
				// 	}else{
				// 		$p->Headcount = 0;
				// 		$p->Child = array();
				// 	}

				// 	if ($p->Name == ""){
				// 		$p->Name = 'Vacant';
				// 		$p->color = "red";
				// 	}else{
				// 		$p->color = "black";
				// 	}
				// }
			}else{
				$pos->Child = array();
			}

			if ($pos->Name == ""){
				$pos->Name = 'Vacant';
				$pos->color = "red";
			}else{
				$pos->color = "black";
			}


			
		}
		echo json_encode($posData);

	}

}