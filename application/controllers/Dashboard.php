<?php

class Dashboard extends CI_Controller{
 
    function __construct() {
        parent::__construct();
        
        if ($this->session->userdata('logged')<>1){
            $this->alert->set('alert-danger', 'Login First');
            redirect(site_url(auth));
        }
        $this->load->model('dashboard_model');

    }
    
    
    public function index(){
       
        $sess_data = $this->session->userdata();
        $data = array(
            'title' => 'E-Labkesda',
            'content' => 'home',
            'sess_date' => $sess_data,
        );
        $this->load->view('headerfooter/header',$data);
        $this->load->view ('landingPage',$data);
        $this->load->view('headerfooter/footer');
    }



}