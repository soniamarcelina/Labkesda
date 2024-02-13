<?php if ( !defined('BASEPATH')) exit ('No direct Script allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		// jika belum login redirect ke login
		if ($this->session->userdata('logged')<>1){
			redirect(site_url(auth));
		}
	}


	public function index()
	{
		
		
		$this->load->library('pagination');
		
		$rows = $this->User_model->tampilkanSemua()->result();

		$config['base_url'] = base_url().'user/';
		$config['total_rows'] = count($rows);
		$config['per_page'] = 10;

		$config['full_tag_open'] = "<ul class='pagination'>";
	    $config['full_tag_close'] = '</ul>';
	    $config['num_tag_open'] = '<li class="unactive">';
	    $config['num_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="active"><a href="#">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['prev_tag_open'] = '<li class="unactive">';
	    $config['prev_tag_close'] = '</li>';
	    $config['first_tag_open'] = '<li class="unactive">';
	    $config['first_tag_close'] = '</li>';
	    $config['last_tag_open'] = '<li class="unactive">';
	    $config['last_tag_close'] = '</li>';
	    $config["uri_segment"] = 4;


	    $config['prev_link'] = '<i class="material-icons" style="color:black">keyboard_arrow_left</i>';
	    $config['prev_tag_open'] = '<li class="unactive">';
	    $config['prev_tag_close'] = '</li>';


	    $config['next_link'] = '<i class="material-icons" style="color:black">keyboard_arrow_right</i>';
	    $config['next_tag_open'] = '<li class="unactive">';
	    $config['next_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$from = $this->uri->segment(4);
		$rows = $this->User_model->data($config['per_page'],$from);

		$data = array(
			'title' => 'dashboard',
			'judul' => 'User',
			'content' => 'user',
			'rows' => $rows,
			'event_id' => '0'	
			);

			//ini adalah controller user
               $this->load->view('/headfoot/header',$data);
				$this->load->view('/User/index',$data);
               $this->load->view('/headfoot/footer');
	}

	public function add()
	{
		$positions = $this->DirectPosition_model->getPositions()->result();
		$data = array(
			'title' => 'Add User',
			'content' => 'user',
			'event_id' => '0',
			'positions' =>$positions,
			
			);

		 $this->load->view('/headfoot/header',$data	);
		$this->load->view('/User/add',$data);
		$this->load->view('/headfoot/footer');

	}


	public function insert()
	{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'PositionID' => $this->input->post('idPos'),
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
			'event_id' => '1',
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

	public function edit_pw($id){
		
		$this->load->model('User_model');
		$query = $this->User_model->getPassById($id);
		$old_pw =  md5($this->input->post('old_pw'));
		$true_oldpw = $query->password;

		$data = array(
			'nama' => $this->input->post('nama'),
			'password' => $this->input->post('new_pw'),
			'confirmpass' => $this->input->post('con_pw'),
			'level' => $this->input->post('level')
		);

		$newpass = $data['password'];
		$conpass = $data['confirmpass'];

		if ( $true_oldpw == $old_pw){
			if ( $newpass == $conpass){
				
				$array = array(
					'nama' => $this->input->post('nama'),
					'username' => $this->input->post('username'),
					'password' => md5($newpass),
					'level'		=> $data['level'],

				);
				echo $this->User_model->ubah($id,$array);
				$this->alert->set('alert-success', 'Berhasil Ubah Data User!');
    			redirect($_SERVER['HTTP_REFERER']);




			}else{
				$this->alert->set('alert-danger', 'Password Baru dengan Confirm Password Beda!');
    			redirect($_SERVER['HTTP_REFERER']);
			}
		} else {
			if ($this->session->userdata('level') == 'admin') {
				if ( $newpass == $conpass){
				
					$array = array(
						'nama' => $this->input->post('nama'),
						'username' => $this->input->post('username'),
						'password' => md5($newpass),
						'level'		=> $data['level'],

					);
					echo $this->User_model->ubah($id,$array);
					$this->alert->set('alert-success', 'Berhasil Ubah Data User!');
	    			redirect($_SERVER['HTTP_REFERER']);




				}else{
					$this->alert->set('alert-danger', 'Password Baru dengan Confirm Password Beda!');
	    			redirect($_SERVER['HTTP_REFERER']);
				}
			}else{
				$this->alert->set('alert-danger', 'Password Lama Tidak Cocok');
    			redirect($_SERVER['HTTP_REFERER']);	
			}
			
			
			
		}

		// if ( $true_oldpw == $old_pw){
		// 	if ( $newpass == $conpass){
				
		// 		$array = array(
		// 			'nama' => $this->input->post('nama'),
		// 			'username' => $this->input->post('username'),
		// 			'password' => md5($newpass),
		// 			'level'		=> $data['level'],

		// 		);
		// 		echo $this->User_model->ubah($id,$array);
		// 		$this->alert->set('alert-success', 'Berhasil Ubah Data User!');
  //   			redirect($_SERVER['HTTP_REFERER']);




		// 	}else{
		// 		$this->alert->set('alert-danger', 'Password Baru dengan Confirm Password Beda!');
  //   			redirect($_SERVER['HTTP_REFERER']);
		// 	}
		// } else {
			
		// 	$this->alert->set('alert-danger', 'Password Lama Tidak Cocok');
  //   		redirect($_SERVER['HTTP_REFERER']);
			
			
		// }


	}
		


	

	
	

}