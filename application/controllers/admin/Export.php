<?php
class Export extends CI_Controller{
	
    function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_ppdb');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index(){
		$x['data']=$this->m_ppdb->get_all_ppdb();
		$this->load->view('admin/v_export',$x);
	}

}