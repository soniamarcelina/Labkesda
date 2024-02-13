<?php if ( !defined('BASEPATH')) exit ('No direct Script allowed');

class Performance extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// jika belum login redirect ke login
		if ($this->session->userdata('logged')<>1){
			redirect(site_url(auth));
		}
	}


	public function index()
	{
		
		
		$rows = $this->empTKJP_model->getAll()->result();

		$data = array(
			'title' => 'Outsourcing Employee',
			
			'rows' => $rows,
			'sidebar' => 'sidebar-tad'
			);

			//ini adalah controller user
               $this->load->view('/headfoot/header',$data);
				$this->load->view('/TAD/PerformanceReview/index',$data);
               $this->load->view('/headfoot/footer');
	}

	public function create()
	{
		$requestor = $this->user_model->getByIdJoinPos($this->session->userdata('id'))->row();
		$directReport = '';
		$gradeData = $this->grade_model->getAll()->result();
		if ($requestor != '') {
			$directReport = $this->DirectPosition_model->getById($requestor->ID_Position_Atasan)->row();
		}

		$listRoles = $this->db->distinct();
		$listRoles = $this->db->select('Verb');
		$listRoles = $this->db->order_by('Verb','asc');
		$listRoles = $this->db->get('JobRoles')->result();
		$listPosition = $this->DirectPosition_model->getDirectPos()->result();
		$allData = $this->empTKJP_model->getById(1)->row();
		$gradeData = $this->grade_model->getAll()->result();
		$data = array(
			'title' => 'Performance Review',
			'content' => 'user',
			'gradeData' => $gradeData,
			'requestor' => $requestor,
			'directReport' => $directReport,
			'listPosition' => $listPosition,
			'listGrade' => $gradeData,
			'listRoles' => json_encode($listRoles),
			'sidebar' => 'sidebar-tad'
			);

		 $this->load->view('/headfoot/header',$data);
		$this->load->view('/TAD/PerformanceReview/performance',$data);
		$this->load->view('/headfoot/footer');
	}

	public function view($id = null) {

		$rows = $this->MRF_model->getPerformance($id)->row();

		$data = array(
			'title' => 'Performance',
			'rows' => $rows,
			'mrf_id' => $id	,
			'sidebar' => 'sidebar-tad'
		);

        $this->load->view('/headfoot/header',$data);
		$this->load->view('/TAD/PerformanceReview/performance',$data);
        $this->load->view('/headfoot/footer');

	}

	public function getGrade()
	{
		
		$gradeData = $this->grade_model->getAll()->result();
		echo json_encode($gradeData);

	}

	public function infoData(){
		$searchName = $_GET['searchName'];
		$searchID = $_GET['searchID'];

		$data = array(
			'Nama' => $searchName,
			'Nopek' => $searchID 
		);
		$rows = $this->empTKJP_model->getFilter($data);
		// Returning the generated HTML content
		echo json_encode($rows);
	}

	public function getListPos()
	{
		
		$listPosition = $this->DirectPosition_model->getPositionsActive()->result();
		
		echo json_encode($listPosition);

	}

	public function getPosition()
	{
		
		$listCompetency = $this->db->get('Technical_comp')->result();
		
		echo json_encode($listCompetency);

	}


	public function insert()
	{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'nama' => $this->input->post('nama'),
			'level' => $this->input->post('level')
			

		);

		$this->User_model->input_data($data,'user');


		$this->alert->set('alert-success', 'Berhasil Tambah User!');
		redirect(site_url('user'));
	}

	 
	public function edit($id){
		$data_user = $this->User_model->getById($id)->row();
		$data = array(
			'title' => 'dashboard',
			'judul' => 'Edit password',
			'content' => 'user',
			'sidebar' => 'sidebar-tad',
			'id' => $id,
			'data_user' => $data_user,
			
			);
		

		$this->load->view('/headfoot/header',$data	);
		$this->load->view('/User/edit',$data);
		$this->load->view('/headfoot/footer');


	}

	public function delete($id)
	{


		$this->User_model->hapus($id);
		$this->alert->set('alert-success', 'Berhasil Hapus User!');
		redirect(site_url('user'));
	}

	public function medical()
	{
		
		$data = array(
			'title' => 'Record Medical Check Up',
			'content' => 'user',
			'sidebar' => 'sidebar-tad'
			);

		$this->load->view('/headfoot/header',$data);
		$this->load->view('/TAD/PerformanceReview/mcu',$data);
		$this->load->view('/headfoot/footer');
	}

	public function upload_file() {
		$data = $this->input->post();
		$config['upload_path'] = 'C:/xampp/htdocs/hc_digital/upload/'; // Ganti dengan path direktori penyimpanan file upload Anda
		$config['allowed_types'] = 'pdf|doc|docx'; // Tipe file yang diizinkan diupload		 
        $this->load->library('upload', $config);

		if (!$this->upload->do_upload('file')) {
			$error = array('status' => 0, 'error' => $this->upload->display_errors());
			echo json_encode($error);
		} else {
			// Jika unggahan file berhasil
			$data = array('upload_data' => $this->upload->data());
			echo json_encode(array('status' => 1, 'data' => $data));
		}

	
    }
	
	public function submit_data() 
	{		
			$config['upload_path'] = './upload/';
			$config['allowed_types'] = 'pdf|doc|docx'; 
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('file')) {
				$error = array('error' => $this->upload->display_errors());
				$this->load->view($error);
			} else {
				$file = $this->upload->data(); 
				$file = $file['file_name'];
				$nopek = $this->input->post('nopek');
				$dateMcu = $this->input->post('dateMcu');
				$resume = $this->input->post('resume');
				$saran = $this->input->post('saran');
				$kesimpulan = $this->input->post('kesimpulan');

				$data = array (
					'nopek' => $nopek,
					'dateMcu' => $dateMcu,
					'resume' => $resume,
					'saran' => $saran,
					'kesimpulan' => $kesimpulan,
					'file' => $file,
				);
				
				$this->db->insert('mcu', $data);
				$this->alert->set('alert-success', 'Berhasil Record Data MCU!');

				redirect('TAD/Performance/medical');

			}
	}


}