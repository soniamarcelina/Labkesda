<?php if (!defined('BASEPATH')) exit('No Direct Script allowed');

class Auth extends CI_Controller {
 
    public function index($error = NULL) {
    	
        $data = array(
            'title' => 'Login Page',
            'action' => base_url('auth/login'),
            'error' => $error
        );
      	
        $this->load->view('/login/login', $data);
        
    }

    public function error_login(){
        echo 'Session Expired, Please Login!';
    }
 
    public function login() {
        $this->load->model('auth_model');
        
        $tipe = $this->input->post('tplogin');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $login = $this->auth_model->login(($username), md5($password));
       if ($tipe == 'officer'){ 
        if ($login == 1) {
            //          ambil detail data
            $row = $this->auth_model->data_login($this->input->post('username'), md5($this->input->post('password')));
 
            //          daftarkan session
                $data = array(
                'logged' => TRUE,
                'username' => $row->username,
                'id' => $row->u_id,
                'level' => $row->level,
                'nama' => $row->nama,
                 );
            $this->session->set_userdata($data);
            $this->alert->set('alert-Success', 'Welcome '.$this->session->userdata('nama'));
           // redirect ke halaman sukses
            redirect(site_url('Dashboard'),$data);
        } else {
           // tampilkan pesan error
            
            $error = 'Username / Password salah';

            $this->alert->set('alert-danger', $error);
            redirect(site_url('auth'));
    

            }
       }
    }

    function logout() {
//        destroy session
        $this->session->sess_destroy();
        
//        redirect ke halaman login
        redirect(site_url('auth'));
    }
 
}
 