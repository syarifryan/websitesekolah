<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ppdb extends CI_Controller {

    public function index()
    {
        $this->load->model('m_ppdb');
        $x['data']=$this->m_ppdb->get_all_ppdb();
        $this->load->view('depan/v_ppdb',$x);

    }

    function simpan_ppdb(){
        $this->load->model('m_ppdb');
        $this->load->library('upload');

		$config['upload_path'] = './assets/images/ppdb/'; //path folder
        $config2['upload_path'] = './assets/images/ppdb/'; //path folder
        $config3['upload_path'] = './assets/images/ppdb/'; //path folder
        $config4['upload_path'] = './assets/images/ppdb/'; //path folder
        $config5['upload_path'] = './assets/images/ppdb/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config2['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config3['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config4['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config5['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config2['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config3['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config4['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config5['encrypt_name'] = TRUE; //nama yang terupload nantinya

	      $this->upload->initialize($config);
	      if(!empty($_FILES['filefoto']['name']))
          $this->upload->initialize($config2);
	      if(!empty($_FILES['filefoto2']['name']))
          $this->upload->initialize($config3);
	      if(!empty($_FILES['filefoto3']['name']))
          $this->upload->initialize($config4);
	      if(!empty($_FILES['filefoto4']['name']))
          $this->upload->initialize($config5);
	      if(!empty($_FILES['filefoto5']['name']))

	        {
	      if ($this->upload->do_upload('filefoto'))
          if ($this->upload->do_upload('filefoto2'))
          if ($this->upload->do_upload('filefoto3'))
          if ($this->upload->do_upload('filefoto4'))
          if ($this->upload->do_upload('filefoto5'))
	        {
	        $gbr = $this->upload->data();
			$gbr2 = $this->upload->data();
			$gbr3 = $this->upload->data();
			$gbr4 = $this->upload->data();
			$gbr5 = $this->upload->data();
	        //Compress Image
	        $config['image_library']='gd2';
            $config2['image_library']='gd2';
            $config3['image_library']='gd2';
            $config4['image_library']='gd2';
            $config5['image_library']='gd2';
	        $config['source_image']='./assets/images/ppdb/'.$gbr['file_name'];
			$config2['source_image']='./assets/images/ppdb/'.$gbr2['file_name'];
			$config3['source_image']='./assets/images/ppdb/'.$gbr3['file_name'];
			$config4['source_image']='./assets/images/ppdb/'.$gbr4['file_name'];
			$config5['source_image']='./assets/images/ppdb/'.$gbr5['file_name'];
	        $config['create_thumb']= FALSE;
            $config2['create_thumb']= FALSE;
            $config3['create_thumb']= FALSE;
            $config4['create_thumb']= FALSE;
            $config5['create_thumb']= FALSE;
	        $config['maintain_ratio']= FALSE;
            $config2['maintain_ratio']= FALSE;
            $config3['maintain_ratio']= FALSE;
            $config4['maintain_ratio']= FALSE;
            $config5['maintain_ratio']= FALSE;
	        $config['quality']= '60%';
            $config2['quality']= '60%';
            $config3['quality']= '60%';
            $config4['quality']= '60%';
            $config5['quality']= '60%';
	        $config['width']= 300;
            $config2['width']= 300;
            $config3['width']= 300;
            $config4['width']= 300;
            $config5['width']= 300;
	        $config['height']= 300;
            $config2['height']= 300;
            $config3['height']= 300;
            $config4['height']= 300;
            $config5['height']= 300;
	        $config['new_image']= './assets/images/ppdb/'.$gbr['file_name'];
			$config2['new_image']= './assets/images/ppdb/'.$gbr2['file_name'];
			$config3['new_image']= './assets/images/ppdb/'.$gbr3['file_name'];
			$config4['new_image']= './assets/images/ppdb/'.$gbr4['file_name'];
			$config5['new_image']= './assets/images/ppdb/'.$gbr5['file_name'];
	
	        $this->load->library('image_lib', $config);
            $this->load->library('image_lib', $config2);
            $this->load->library('image_lib', $config3);
            $this->load->library('image_lib', $config4);
            $this->load->library('image_lib', $config5);
	        $this->image_lib->resize();

	        $ijazah_tk=$gbr['file_name'];
			$akta_kelahiran=$gbr2['file_name'];
			$ktp_orang_tua=$gbr3['file_name'];
			$kartu_keluarga=$gbr4['file_name'];
			$sertifikat_penghargaan=$gbr5['file_name'];
			$nama_lengkap=strip_tags($this->input->post('xnama_lengkap'));
			$nama_panggilan=strip_tags($this->input->post('xnama_panggilan'));
			$alamat=strip_tags($this->input->post('xalamat'));
			$tempat_tanggal_lahir=strip_tags($this->input->post('xtempat_tanggal_lahir'));

			$this->m_ppdb->simpan_ppdb($nama_lengkap,$nama_panggilan,$alamat,$tempat_tanggal_lahir,$ijazah_tk,$akta_kelahiran,$ktp_orang_tua,$kartu_keluarga,$sertifikat_penghargaan);
			echo $this->session->set_flashdata('msg','<p><strong> NB: </strong> Berkas Pendaftaran Sudah Dikirim.</p>');
			redirect('');
			}else{
	        echo $this->session->set_flashdata('msg','warning');
	        redirect('');
	        }
	                 
	        }else{
	        $nama_lengkap=strip_tags($this->input->post('xnama_lengkap'));
			$nama_panggilan=strip_tags($this->input->post('xnama_panggilan'));
			$alamat=strip_tags($this->input->post('xalamat'));
			$tempat_tanggal_lahir=strip_tags($this->input->post('xtempat_tanggal_lahir'));

			$this->m_ppdb->simpan_guru_tanpa_img($nama_lengkap,$nama_panggilan,$alamat,$tempat_tanggal_lahir);
			echo $this->session->set_flashdata('msg','<p><strong> NB: </strong> Berkas Pendaftaran Sudah Dikirim.</p>');
			redirect('');
	    }
				
	}
    
}