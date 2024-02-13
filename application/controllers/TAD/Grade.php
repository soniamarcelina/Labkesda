<?php if ( !defined('BASEPATH')) exit ('No direct Script allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Grade extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// jika belum login redirect ke login
		if ($this->session->userdata('logged')<>1){
			redirect(site_url(auth));
		}
        $this->load->model('Grade_model');
	}


	public function index()
	{
		
		
		$rows = $this->Grade_model->getAll()->result();

		$data = array(
			'title' => 'Grade',
			'content' => 'Data List',
			'rows' => $rows,
			'sidebar' => 'sidebar-tad'
			);

			//ini adalah controller user
               $this->load->view('/headfoot/header',$data);
				$this->load->view('/TAD/Grade/index',$data);
               $this->load->view('/headfoot/footer');
	}

	public function add()
	{
		$allData = $this->Grade_model->getById(1)->row();

		$data = array(
			'title' => 'Add Grade',
			'judul' => 'User Add',
			'sidebar' => 'sidebar-tad'
			);

		 $this->load->view('/headfoot/header',$data	);
		$this->load->view('/TAD/Grade/add',$data);
		$this->load->view('/headfoot/footer');

	}


	public function insert()
	{
		$data = array(
			'id' => $this->input->post('id'),
			'nomenklatur' => $this->input->post('nomenklatur'),
			'kompetensi' => $this->input->post('kompetensi'),
			'WorkExp' => $this->input->post('WorkExp'),
			'MinSalary' => $this->input->post('MinSalary'),
			'MidSalary' => $this->input->post('MidSalary'), 
            'MaxSalary' => $this->input->post('MaxSalary'),
            'MinEdu' => $this->input->post('MinEdu')
		);

		$this->Grade_model->input_data($data,'grade');


		$this->alert->set('alert-success', 'Berhasil Tambah Grade!');
		redirect(site_url('TAD/Grade'));
	}

	 
	public function edit($id){
		$data_grade = $this->Grade_model->getById($id)->row();
		$data = array(
			'title' => 'Grade',
			'judul' => 'Edit Grade',
			'id' => $id,
			'data_grade' => $data_grade,
			'sidebar' => 'sidebar-tad'
		);
		

		$this->load->view('/headfoot/header',$data	);
		$this->load->view('/TAD/Grade/edit',$data);
		$this->load->view('/headfoot/footer');


	}

	public function update($id) {
		 // Ambil data dari formulir edit
		 $id = $this->input->post('id');
		 $data = array(
			'id' => $this->input->post('id'),
			'nomenklatur' => $this->input->post('nomenklatur'),
			'kompetensi' => $this->input->post('kompetensi'),
			'WorkExp' => $this->input->post('WorkExp'),
			'MinSalary' => $this->input->post('MinSalary'),
			'MidSalary' => $this->input->post('MidSalary'), 
            'MaxSalary' => $this->input->post('MaxSalary'),
            'MinEdu' => $this->input->post('MinEdu')
		 );
 
		 // Update data ke database menggunakan model
		 $this->Grade_model->ubah($id, $data);
 
		 // Tampilkan pesan konfirmasi
		 $this->alert->set('alert-success', 'Berhasil Ubah Grade!');
		 redirect(site_url('TAD/Grade'));
	 }


	public function delete($id)
	{
		$this->Grade_model->hapus($id);
		$this->alert->set('alert-success', 'Berhasil Hapus Grade!');
		redirect(site_url('TAD/Grade'));
	}

	public function export() {
		$this->load->library('PHPExcel');
		$objPHPExcel = new PHPExcel();
	
		// Set properti dokumen
		$objPHPExcel->getProperties()->setCreator("HC")
					->setTitle("Export Data");
	
		// Set header tabel
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', 'ID')
					->setCellValue('B1', 'Nomenklatur')
					->setCellValue('C1', 'Kompetensi')
					->setCellValue('D1', 'Work Experience')
					->setCellValue('E1', 'Min Salary')
					->setCellValue('F1', 'Mid Salary')
					->setCellValue('G1', 'Max Salary')
					->setCellValue('H1', 'Min Education');
	
		$objPHPExcel->getActiveSheet()->setTitle('Data Grade');
	
		// Proses output file
		$filename = 'Template Grade_Export.xlsx';
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename . '"');
		header('Cache-Control: max-age=0');
		ob_end_clean();
	
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}
	
	
	public function import()
	{

	try {
			
		if(isset($_FILES["file_excel"]["name"])){
			$file_tmp = $_FILES['file_excel']['tmp_name'];
			$file_name = $_FILES['file_excel']['name'];
			$file_size =$_FILES['file_excel']['size'];
			$file_type=$_FILES['file_excel']['type'];
			
			$object = PHPExcel_IOFactory::load($file_tmp);
	
			foreach($object->getWorksheetIterator() as $worksheet){
	
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
	
				for($row=3; $row<=$highestRow; $row++){
	
					$id = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$nomenklatur = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$kompetensi = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$workExp = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$minSal = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$midSal = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$maxSal = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$minEdu = $worksheet->getCellByColumnAndRow(7, $row)->getValue();

					$data[] = array(
						'id' => $id,
						'nomenklatur' =>$nomenklatur,
						'kompetensi'=>$kompetensi,
						'WorkExp' => $workExp,
						'MinSalary' => $minSal,
						'MidSalary' => $midSal,
						'MaxSalary' => $maxSal,
						'MinEdu' => $minEdu,
					);
	
				} 
	
			}
	
			$this->db->insert_batch('grade', $data);
	
			$message = array(
				'message'=>'<div class="alert alert-success">Import file excel berhasil disimpan di database</div>',
			);
			$this->session->set_flashdata($message);
			redirect('TAD/Grade/');
		
		}
		else
		{
			 $message = array(
				'message'=>'<div class="alert alert-danger">Import file gagal, coba lagi</div>',
			);
			
			$this->session->set_flashdata($message);
			redirect('TAD/Grade/');
		}
		
	} catch (Exception $e) {
		$response = array(
			'status' => 2, 
			'msg' => 'Gagal menyimpan data: ' . $e->getMessage(),
		);
		echo json_encode($response);
		exit;
	}

	}
 

}