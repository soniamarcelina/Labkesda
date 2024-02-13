<?php if ( !defined('BASEPATH')) exit ('No direct Script allowed');

class Approval extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// jika belum login redirect ke login
		if ($this->session->userdata('logged')<>1){
			redirect(site_url(auth));
		}
	}

	public function view() {
		
	}
	

    public function index()
	{
		
		$rows = $this->Approval_model->getAll()->result();

		foreach ($rows as $row) {	
			if ($row->type == "OCF") {
				$row->data = $this->OCF_model->getById($row->type_id)->row();
			}
			
		}

		$data = array(
			'title' => 'Approve',
			'content' => 'Data List',
			'rows' => $rows,
			'event_id' => '0'	
			);

			//ini adalah controller user
               $this->load->view('/headfoot/header',$data);
				$this->load->view('/OCF/approval',$data);
               $this->load->view('/headfoot/footer');
	}

	public function show()
	{
		
		$rows = $this->Approval_model->getAll()->result();

		$data = array(
			'title' => 'Approval',
			'content' => 'Data List',
			'rows' => $rows,
			'sidebar' => 'sidebar-home'

			);

			//ini adalah controller user
               $this->load->view('/headfoot/header',$data);
				$this->load->view('/approval',$data);
               $this->load->view('/headfoot/footer');
	}

	public function MRF()
	{
		$rows = $this->Approval_model->getbyType('MRF')->result();

		foreach ($rows as $row) {	
			if ($row->type == "MRF") {
				// $select = '*';
				$select = array(
					'mrf.id_mrf as id',
					'mrf.status as status',
					'mrf.mrf_code as Code',
					'TadPosition.PosTitle as PosTitle',
					'mrf.created_at as CreatedDate',
					'mrf.mrf_type as Type',
					'mrf.RequestorID as RequestorID',
					'mrf.start_date as start',
					'mrf.end_date as end'
				);
				$row->data = $this->MRF_model->getById($row->type_id,$select)->row();
			}
			
		}

		$data = array(
			'title' => 'Approve',
			'content' => 'Data List',
			'rows' => $rows,
			'sidebar' => 'sidebar-tad'	
			);

			//ini adalah controller user
               $this->load->view('/headfoot/header',$data);
				$this->load->view('/TAD/MRF/approval',$data);
               $this->load->view('/headfoot/footer');
	}

	public function OCF()
	{
		
		$rows = $this->Approval_model->getbyType('OCF')->result();

		foreach ($rows as $row) {	
			if ($row->type == "OCF") {
				$row->data = $this->OCF_model->getById($row->type_id)->row();
			}
			
		}

		$data = array(
			'title' => 'Approve',
			'content' => 'Data List',
			'rows' => $rows,
			'sidebar' => 'sidebar-tad'	
			);

			//ini adalah controller user
               $this->load->view('/headfoot/header',$data);
				$this->load->view('/TAD/OCF/approval',$data);
               $this->load->view('/headfoot/footer');
	}

	public function AO()
	{
		
		$rows = $this->Approval_model->getbyType('AO')->result();

		foreach ($rows as $row) {	
			if ($row->type == "AO") {
				$row->data = $this->AO_model->getById($row->type_id)->row();
			}
			
		}

		$data = array(
			'title' => 'Approve',
			'content' => 'Data List',
			'rows' => $rows,
			'sidebar' => 'sidebar-tad'	
			);

			//ini adalah controller user
               $this->load->view('/headfoot/header',$data);
				$this->load->view('/TAD/AO/approval',$data);
               $this->load->view('/headfoot/footer');
	}

	public function approveAO($id = 0){
		$json = $this->input->post();
		$approvalAO = $this->Approval_model->getById($id)->row();
		$AoDetail = $this->AO_model->getById($approvalAO->type_id)->row();

		if ($approvalAO->status == 'Waiting') {
			

			$posData = array(
				'ID_AO' => $AoDetail->id,
			);
			$this->TadPosition_model->update($AoDetail->id_position,$posData);

			$updateAO = array(
				'status' => 'Approved',
				'AO_No' => 'PPC51200/2023/AO/'.str_pad($AoDetail->id, 4, '0', STR_PAD_LEFT),
				
			);

			$this->AO_model->update($AoDetail->id,$updateAO);

			$updateCandidate = array(
				'status' => 'Onboard',
				'final_salary' => $AoDetail->personnel_salary,
				
			);
			$candidateData = $this->Candidate_model->getByPersMrf($AoDetail->mrf_id,$AoDetail->id_personnel)->row();
			$this->Candidate_model->update($candidateData->id,$updateCandidate);

			$data = array(
				'approver_persID' => 1,
				'comments' => $json['comments'],
				'status' => 'Approved',
				'updated_at' => date('Y-m-d H:i:s')
			);
			$this->Approval_model->update($approvalAO->id,$data);
			

			$msg = 'Approve AO Success';
			$status = 2;
		}else{
			$msg = 'Approval Expired';
			$status = 0;
		}

		$data = array(
			'msg' => $msg,
			'status' => $status,
		);
		echo json_encode($data);
	}

	public function forceApproveAO(){
		$json = $this->input->post();
		
		$OCFData = $this->OCF_model->checkSubmit($json['tempKey'])->row();

		if ($json['password'] == 'AO') { //Pass Force Approve 'OCFFRCAPPRPPC5100'
			if ($OCFData != '') {
				$approval = $this->Approval_model->getByOCFId($OCFData->id)->result();
				foreach ($approval as $appr) {
					$data = array(
						'approver_persID' => 1,
						'comments' => 'Approved By '.$json['comments'],
						'status' => 'Approved',
						'updated_at' => date('Y-m-d H:i:s')
					);
					$this->Approval_model->update($appr->id,$data);
				}

				$total_approval = $this->Approval_model->countApproveOCFId($OCFData->id)->row();
				if ($total_approval->total == count($approval)) {
					$approve = $this->ApproveOCF($OCFData->tempKey);
					$msg = 'Force Approve OCF Success';
					$status = 2;
				}else{
					$msg = 'Approval Not Complete';
					$status = 1;
				}
			}else{
				$msg = 'No Data';
				$status = 1;
			}
			
		}else{
			$msg = 'Password Not Match, Try Again!';
			$status = 0;
		}

		$data = array(
			'msg' => $msg,
			'status' => $status,
		);
		echo json_encode($data);
	}

	public function updateApproveOCF($id) {
		$json = $this->input->post();
		
		$OCFApproval = $this->Approval_model->getById($id)->row();

		$update = array(
			'approver_persID' => $this->session->userdata('id'),
			'comments' => $json['comments'],
			'status' => 'Approved',
			'updated_at' => date('Y-m-d H:i:s')
		);
		
		$this->Approval_model->update($OCFApproval->id,$update);
		
		$OCFApprovalNext = $this->Approval_model->getByApproveOrder($OCFApproval->type,$OCFApproval->type_id,((int)$OCFApproval->approver_order)+1)->row();
		$OCFData = $this->OCF_model->getById($OCFApproval->type_id)->row();
		$approval = $this->Approval_model->getByOCFId($OCFApproval->type_id)->result();
		$total_approval = $this->Approval_model->countApproveOCFId($OCFApproval->type_id)->row();
		
		if ($total_approval->total == count($approval)) {
			
			$approve = $this->ApproveOCF($OCFData->tempKey);
			$msg = 'OCF Approval Complete';
			$status = 2;

		}else{
			
			$chgRouting = array(			
				'status' => 'Waiting',
				'updated_at' => date('Y-m-d H:i:s')
			);

			$this->Approval_model->update($OCFApprovalNext->id,$chgRouting);

			$msg = 'Approve Success';
			$status = 1;
		}
		$data['msg'] = $msg;
		$data['status'] = $status;

		echo json_encode($data);

	}

	public function forceApproveOCF(){
		$json = $this->input->post();
		
		$OCFData = $this->OCF_model->checkSubmit($json['tempKey'])->row();

		if ($json['password'] == 'OCF') { //Pass Force Approve 'OCFFRCAPPRPPC5100'
			if ($OCFData != '') {
				$approval = $this->Approval_model->getByOCFId($OCFData->id)->result();
				foreach ($approval as $appr) {
					$data = array(
						'approver_persID' => 1,
						'comments' => 'Approved By '.$json['comments'],
						'status' => 'Approved',
						'updated_at' => date('Y-m-d H:i:s')
					);
					$this->Approval_model->update($appr->id,$data);
				}

				$total_approval = $this->Approval_model->countApproveOCFId($OCFData->id)->row();
				if ($total_approval->total == count($approval)) {
					$approve = $this->ApproveOCF($OCFData->tempKey);
					$msg = 'Force Approve OCF Complete';
					$status = 2;
				}else{
					$msg = 'Approval Not Complete';
					$status = 1;
				}
			}else{
				$msg = 'No Data';
				$status = 1;
			}
			
		}else{
			$msg = 'Password Not Match, Try Again!';
			$status = 0;
		}

		$data = array(
			'msg' => $msg,
			'status' => $status,
		);
		echo json_encode($data);
	}

	public function ApproveOCF($tempKey){
		$OCFData = $this->OCF_model->checkSubmit($tempKey)->row();
		$lastApproved = $this->OCF_model->getByYearId(date('Y'))->row();
		if ($lastApproved == '') {
			$yID = 1;
		}else{
			$yID = $lastApproved->yID + 1;
		}
		
		$updateOCF = array(
			'status' => 'Approved',
			'Code' => 'PPC51200/2023/'.str_pad($yID, 4, '0', STR_PAD_LEFT),
			'yID' => $yID,
			//'tempKey' => '',
		);

		$this->OCF_model->update($OCFData->id,$updateOCF);

		$OCFDataApprove = $this->OCF_model->getById($OCFData->id)->row();
		if ($OCFDataApprove->status == 'Approved') {
			$OCFDataApprove->SPV = $this->DirectPosition_model->getById($OCFDataApprove->DirectPos)->row();
			
			$dataPosition = array(
				'PosTitle' => $OCFDataApprove->PosTitle,
				'Ocf_id' => $OCFDataApprove->id,
				'Status' => 'Vacant',
				'DirectPos_ID' => $OCFDataApprove->DirectPos,
				'Direktorat' => 'Subholding Upstream Regional 4',
				'Division' => $OCFDataApprove->SPV->Divisi,
				'Sub_division' => $OCFDataApprove->SPV->Sub_Division,
				'Department' => $OCFDataApprove->SPV->Departemen,
				'Section' => $OCFDataApprove->SPV->Section,
				'Company_ID' => $OCFDataApprove->SPV->Company_Name,
				'PersArea_ID' => $OCFDataApprove->WorkLoc,
				'PersSubArea_ID' => $OCFDataApprove->WorkCity,
				'CostType' => $OCFDataApprove->costType,
				'CostCenter' => $OCFDataApprove->costCenter,
				'Work_Schedule' => $OCFDataApprove->WorkSch,
				'Grade' => $OCFDataApprove->Grade,
				'Responsibility' => $OCFDataApprove->Responsibility,
				'Qualification' => $OCFDataApprove->Qualification,
				'Competency' => $OCFDataApprove->Competency,
				'Education' => $OCFDataApprove->Education,
				'Experience' => $OCFDataApprove->Experience,
				'Skill' => $OCFDataApprove->Skill,
				'CreatedDate' => date('Y-m-d H:i:s')

			);

			for ($i=0; $i <$OCFDataApprove->Headcount ; $i++) { 
				$this->TadPosition_model->insert($dataPosition);
			}
		}

		return True;
	}

	public function forceApproveMRF(){
		$json = $this->input->post();
		
		$MRFData = $this->MRF_model->checkSubmit($json['tempKey'])->row();

		if ($json['password'] == 'MRF') { //Pass Force Approve 'OCFFRCAPPRPPC5100'
			if ($MRFData != '') {
				$approval = $this->Approval_model->getByMRFId($MRFData->id_mrf)->result();
				foreach ($approval as $appr) {
					$data = array(
						'approver_persID' => 1,
						'comments' => 'Approved By '.$json['comments'],
						'status' => 'Approved',
						'updated_at' => date('Y-m-d H:i:s')
					);
					$this->Approval_model->update($appr->id,$data);
				}

				$total_approval = $this->Approval_model->countApproveMRFId($MRFData->id_mrf)->row();
				if ($total_approval->total == count($approval)) {
					$approve = $this->ApproveMRF($MRFData->tempKey);
					$msg = 'Force Approve MRF Success';
					$status = 2;
				}else{
					$msg = 'Approval Not Complete';
					$status = 1;
				}
			}else{
				$msg = 'No Data';
				$status = 1;
			}
			
		}else{
			$msg = 'Password Not Match, Try Again!';
			$status = 0;
		}

		$data = array(
			'msg' => $msg,
			'status' => $status,
		);
		echo json_encode($data);
	}

	public function ApproveMRF($tempKey){
		$MRFData = $this->MRF_model->checkSubmit($tempKey)->row();

		$lastApproved = $this->MRF_model->getByYearId(date('Y'))->row();
		if ($lastApproved == '') {
			$yID = 1;
		}else{
			$yID = $lastApproved->yID + 1;
		}
		
		$updateMRF = array(
			'status' => 'Approved',
			'mrf_code' => 'REG/PPC51200/2023/MRF/'.str_pad($yID, 4, '0', STR_PAD_LEFT),
			'yID' => $yID,
			//'tempKey' => '',
		);

		$this->MRF_model->update($MRFData->id_mrf,$updateMRF);


		return True;
	}

	public function updateApproveMRF($id) {
		$json = $this->input->post();
		
		$MRFApproval = $this->Approval_model->getById($id)->row();

		$update = array(
			'approver_persID' => $this->session->userdata('id'),
			'comments' => $json['comments'],
			'status' => 'Approved',
			'updated_at' => date('Y-m-d H:i:s')
		);
		
		$this->Approval_model->update($MRFApproval->id,$update);
		
		$MRFApprovalNext = $this->Approval_model->getByApproveOrder($MRFApproval->type,$MRFApproval->type_id,((int)$MRFApproval->approver_order)+1)->row();
		$MRFData = $this->MRF_model->getById($MRFApproval->type_id,'*')->row();
		$approval = $this->Approval_model->getByMRFId($MRFApproval->type_id)->result();
		$total_approval = $this->Approval_model->countApproveMRFId($MRFApproval->type_id)->row();
		
		if ($total_approval->total == count($approval)) {
			
			$approve = $this->ApproveMRF($MRFData->tempKey);
			$msg = 'MRF Approval Complete';
			$status = 2;

		}else{

			$chgRouting = array(			
				'status' => 'Waiting',
				'updated_at' => date('Y-m-d H:i:s')
			);

			$this->Approval_model->update($MRFApprovalNext->id,$chgRouting);

			$msg = 'Approve Success';
			$status = 1;
		}
		$data['msg'] = $msg;
		$data['status'] = $status;

		echo json_encode($data);

	}

	public function reviewOCF() {
		$OCFData = $this->OCF_model->getById($id)->row();
			if($OCFData != ''){
				$data['tempKey'] = $OCFData->tempKey;	
				$data['OCF_id'] = $OCFData->id;
				$data['OCFData'] = $OCFData;
				$SpvData = $this->DirectPosition_model->getById($OCFData->DirectPos)->row();
				$ReqData = $this->DirectPosition_model->getByPersonId($OCFData->RequestorID)->row();
				// print_r($SpvData);
				if($SpvData != ''){
					$data['SPVData'] = $SpvData;
				}
				if($ReqData != ''){
					$data['ReqData'] = $ReqData;
				}
				$respData =  $OCFData->Responsibility;
				if ($respData != '[]') {
					
					$respArray = json_decode($respData);
					if ($respArray === null && json_last_error() !== JSON_ERROR_NONE) {
					    // Handle the error here if needed
					    echo "Error decoding JSON data Respnsibility.";
					} else {
					    // The JSON was decoded successfully, and $phpArray is now a PHP array
					    
					    for ($i=0; $i < count($respArray); $i++) { 
					    	$respArray[$i][2] = $i+1;
					    }
					}
				}else{
					$respArray = '';
				}

				$eduData =  $OCFData->Education;
				if ($eduData != '[]') {
					
					$eduArray = json_decode($eduData);
					if ($eduArray === null && json_last_error() !== JSON_ERROR_NONE) {
					    // Handle the error here if needed
					    echo "Error decoding JSON data Education.";
					} else {
					    // The JSON was decoded successfully, and $phpArray is now a PHP array
					    
					    for ($i=0; $i < count($eduArray); $i++) { 
					    	$eduArray[$i][2] = $i+1;
					    }
					}
				}else{
					$eduArray = '';
				}

				$compData =  $OCFData->Competency;
				if ($compData != '[]') {
					
					$compArray = json_decode($compData);
					if ($compArray === null && json_last_error() !== JSON_ERROR_NONE) {
					    // Handle the error here if needed
					    echo "Error decoding JSON data Competency.";
					} else {
					    // The JSON was decoded successfully, and $phpArray is now a PHP array
					    
					    for ($i=0; $i < count($compArray); $i++) { 
					    	$compArray[$i][4] = $i+1;
					    	$compArray[$i][3] = str_replace("\n", '', $compArray[$i][3]);
					    }
					}
				}else{
					$compArray = '';
				}

				$expData =  $OCFData->Experience;
				if ($expData != '[]') {
					
					$expArray = json_decode($expData);
					if ($expArray === null && json_last_error() !== JSON_ERROR_NONE) {
					    // Handle the error here if needed
					    echo "Error decoding JSON data Experience.";
					} else {
					    // The JSON was decoded successfully, and $phpArray is now a PHP array
					    
					    for ($i=0; $i < count($expArray); $i++) { 
					    	$expArray[$i][2] = $i+1;
					    }
					}
				}else{
					$expArray = '';
				}

				$skillData =  $OCFData->Skill;
				if ($skillData != '[]') {
					
					$skillArray = json_decode($skillData);
					if ($skillArray === null && json_last_error() !== JSON_ERROR_NONE) {
					    // Handle the error here if needed
					    echo "Error decoding JSON data.";
					} else {
					    // The JSON was decoded successfully, and $phpArray is now a PHP array
					    
					    for ($i=0; $i < count($skillArray); $i++) { 
					    	$skillArray[$i][2] = $i+1;
					    }
					}
				}else{
					$skillArray = '';
				}
			}
			
		$FormData = array(
			'subject' => ($OCFData != '' ? $OCFData->subject : ''),
			'empName' => ($OCFData != '' ? $ReqData->Name : ''),
			'empID'  => ($OCFData != '' ? $ReqData->Person_Id : ''),
			'empPos' => ($OCFData != '' ? $ReqData->Position : ''),
			'empDiv' => ($OCFData != '' ? $ReqData->Divisi : ''),
			'empDept' => ($OCFData != '' ? $ReqData->Departemen : ''),
			'empSec' => ($OCFData != '' ? $ReqData->Section : ''),
			'OCF_No' => ($OCFData != '' ? $OCFData->Code : ''),
			'empSubs' => ($OCFData != '' ? $ReqData->Company_Name : ''),
			'newPos' => ($OCFData != '' ? $OCFData->PosTitle : ''),
			'newWL' => ($OCFData != '' ? $OCFData->WorkLoc : ''),
			'newWS' => ($OCFData != '' ? $OCFData->WorkSch : ''),
			'newWC' => ($OCFData != '' ? $OCFData->WorkCity : ''),
			'newCount' => ($OCFData != '' ? $OCFData->Headcount : ''),
			'newGrade' => ($OCFData != '' ? $OCFData->Grade : ''),
			'DirID' => ($OCFData != '' ? $SpvData->ID_Position : ''),
			'DirPos' => ($OCFData != '' ? $SpvData->Position : ''),
			'DirName' => ($OCFData != '' ? $SpvData->Name : ''),
			'DirDept' => ($OCFData != '' ? $SpvData->Departemen : ''),
			'DirDiv' => ($OCFData != '' ? $SpvData->Divisi : ''),
			'cost_opt' =>  ($OCFData != '' ? $OCFData->costType : ''),
			'costCenter' => ($OCFData != '' ? $OCFData->costCenter : ''),
			'Justification' => ($OCFData != '' ? $OCFData->Justification : ''),
			'tableFile' => '',
			'Responsibility' => ($OCFData != '' ? json_encode($respArray) : '[]'),
			'Education' => ($OCFData != '' ? json_encode($eduArray) : '[]'),
			'Competency' => ($OCFData != '' ? json_encode($compArray) : '[]'),
			'Experience' => ($OCFData != '' ? json_encode($expArray) : '[]'),
			'Skill' => ($OCFData != '' ? json_encode($skillArray) : '[]'),
		);

		$data['FormData'] = $FormData;
		echo json_encode($data);
               $this->load->view('/headfoot/header');
				$this->load->view('/TAD/OCF/review');
               $this->load->view('/headfoot/footer');

	}

	public function reviewMRF() {
		$rows = $this->Approval_model->getAll()->result();

		foreach ($rows as $row) {	
			if ($row->type == "MRF") {
				$row->data = $this->MRF_model->getById($row->type_id)->row();
			}
			
		}

		$data = array(
			'title' => 'Approve',
			'content' => 'Data List',
			'rows' => $rows,
			'event_id' => '0'	
			);

               $this->load->view('/headfoot/header',$data);
				$this->load->view('/OCF/review',$data);
               $this->load->view('/headfoot/footer');

	}

	public function updateData() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			// Terima data dari permintaan POST
			$updatedData = $this->input->post();
	
			// Lakukan pembaruan data di sini (sesuai dengan logika aplikasi Anda)
			// Contoh: Simpan data ke database
	
			// Kirim respons balik ke klien (JavaScript)
			$response = array('message' => 'Data berhasil diperbarui.');
			header('Content-Type: application/json');
			echo json_encode($response);
		} else {
			// Jika bukan permintaan POST, tangani kesalahan atau tindakan yang sesuai
			show_404();
		}
	}

}
