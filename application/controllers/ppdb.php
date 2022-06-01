<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ppdb extends CI_Controller {
    public function index()
    {
        $x['tot_guru']=$this->db->get('tbl_guru')->num_rows();
		$x['tot_siswa']=$this->db->get('tbl_siswa')->num_rows();
		$x['tot_files']=$this->db->get('tbl_files')->num_rows();
		$x['tot_agenda']=$this->db->get('tbl_agenda')->num_rows();
        $this->load->view('depan/v_ppdb',$x);
    }
}