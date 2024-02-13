<?php if ( !defined('BASEPATH')) exit ('No direct Script allowed');

class Costumer extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// jika belum login redirect ke login
		if ($this->session->userdata('logged')<>1){
			redirect(site_url(auth));
		}
	}


    public function create()
    {	
		
		$data = array(
			'title' => 'Pemeriksaan',
			'content' => 'user',
			// 'listRoles' => json_encode($listRoles),
			'sidebar' => 'sidebar-tad',
		);

		//$data['FormData'] = $FormData;
		$this->load->view('/headfoot/header',$data);
		$this->load->view('/TAD/Costumer/form',$data);
		$this->load->view('/headfoot/footer');
	}
	
	public function insert()
	{

		$data = $this->input->post();

		$this->costumer_model->input_data($data,'costumer');

		 if(isset($data['hematologi']) && is_array($data['hematologi'])) {
			$data['hematologi'] = implode(',', $data['hematologi']);
		}
	
		if(isset($data['kimia']) && is_array($data['kimia'])) {
			$data['kimia'] = implode(',', $data['kimia']);
		}

		if(isset($data['sputum']) && is_array($data['sputum'])) {
			$data['sputum'] = implode(',', $data['sputum']);
		}

		if(isset($data['urinalisa']) && is_array($data['urinalisa'])) {
			$data['urinalisa'] = implode(',', $data['urinalisa']);
		}

		$data = array(
			'id' => $this->input->post('id'),
			'nama' => $this->input->post('nama'),
			'nik' => $this->input->post('nik'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'umur' => $this->input->post('umur'),
			'alamat' => $this->input->post('alamat'),
			'hematologi' => isset($data['hematologi']) ? $data['hematologi'] : '',
			'kimia' => isset($data['kimia']) ? $data['kimia'] : '',
			'urinalisa' => isset($data['urinalisa']) ? $data['urinalisa'] : '',
			'sputum' => isset($data['sputum']) ? $data['sputum'] : '',
		);
		$this->alert->set('alert-success', 'Berhasil Tambah Data!');
		redirect(site_url('TAD/Costumer'));
	}
	
	public function index()
	{
		
		$rows = $this->costumer_model->getAll()->result();

		$data = array(
			'title' => 'Data Pemeriksaan',
			'content' => 'Data List',
			'rows' => $rows,
			'sidebar' => 'sidebar-tad'
			);

			//ini adalah controller user
               $this->load->view('/headfoot/header',$data);
				$this->load->view('/TAD/Costumer/index',$data);
               $this->load->view('/headfoot/footer');
	}

	public function api_post() {
		$nama = $this->input->post('nama');
		$nik = $this->input->post('nik');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$umur = $this->input->post('umur');
		$alamat = $this->input->post('alamat');
		$hematologi = $this->input->post('hematologi');
		$kimia = $this->input->post('kimia');
		$sputum = $this->input->post('sputum');
		$urinalisa = $this->input->post('urinalisa');

		$data = array(
			'nama' => $nama,
			'nik' => $nik,
			'tgl_lahir' => $tgl_lahir,
			'umur' => $umur,
			'alamat' => $alamat,
			'hematologi' => $hematologi,
			'kimia' => $kimia,
			'sputum' => $sputum,
			'urinalisa' => $urinalisa

		);

		$insert = $this->costumer->input_data($data);

		if($insert) {
			$res['error'] = false;
			$res['message'] = 'insert success';
			$res['data'] = $data;
		} else {
			$res['error'] = true;
			$res['message'] = 'insert failed';
			$res['data'] = null;
		}

		$this->response(res, 200);
	}

	public function api_get() {
		$data = $this->costumer_model->getAll(); 
	
		if ($data) {
			$res['error'] = false;
			$res['message'] = 'Data retrieved successfully';
			$res['data'] = $data;
		} else {
			$res['error'] = true;
			$res['message'] = 'No data found';
			$res['data'] = null;
		}
	
		$this->response($res, 200);
	}

	public function edit($id){
		$data_grade = $this->costumer_model->getById($id)->row();
		$data = array(
			'title' => 'Costumer',
			'judul' => 'Edit Costumer',
			'id' => $id,
			'data_grade' => $data_grade,
			'sidebar' => 'sidebar-tad'
		);
		

		$this->load->view('/headfoot/header',$data	);
		$this->load->view('/TAD/Costumer/update',$data);
		$this->load->view('/headfoot/footer');


	}
	
    public function submit() {

		try {
			$json = $this->input->post();  

          $this->load->model('costumer_model');  
			$checklist = $json['checklist'];
			$json['checklist'] = json_encode($checklist);
	
          $result = $this->costumer_model->input_data($json);
			$response = array(
				'status' => 1, 
				'msg' => 'Data berhasil disimpan',
								
			);   
			echo json_encode($response);

		} catch (Exception $e) {
			$response = array(
				'status' => 2, 
				'msg' => 'Gagal menyimpan data: ' . $e->getMessage(),
			);
			// Kembalikan respons sebagai JSON
			echo json_encode($response);
			exit;
		}
	 }
    
}