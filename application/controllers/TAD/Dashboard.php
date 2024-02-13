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
            'title' => 'TAD Dashboard',
            'content' => 'home',
            'sess_date' => $sess_data,
            'sidebar' => 'sidebar-tad'
        );
        $data['emp_count'] = $this->dashboard_model->countEmployee(); 
        $data['actv_count'] = $this->dashboard_model->countEmpActive();
        $data['cand_count'] = $this->dashboard_model->countEmpCandidat();  
        $data['contr_count'] = $this->dashboard_model->countContractor(); 
        $data['empEducation'] = $this->dashboard_model->groupLastEdu()->result(); 

        $this->load->view('headfoot/header',$data);
        $this->load->view ('TAD/dashboard',$data);
        $this->load->view('headfoot/footer');
    }

}