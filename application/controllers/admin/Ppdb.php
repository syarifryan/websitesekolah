<?php
class Ppdb extends CI_Controller{
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
		$this->load->view('admin/v_ppdb',$x);
	}
	
	function simpan_ppdb(){
				$config['upload_path'] = './assets/images/ppdb/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
							$gbr2 = $this->upload->data();
							$gbr3 = $this->upload->data();
							$gbr4 = $this->upload->data();
							$gbr5 = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/ppdb/'.$gbr['file_name'];
							$config['source_image']='./assets/images/ppdb/'.$gbr2['file_name'];
							$config['source_image']='./assets/images/ppdb/'.$gbr3['file_name'];
							$config['source_image']='./assets/images/ppdb/'.$gbr4['file_name'];
							$config['source_image']='./assets/images/ppdb/'.$gbr5['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 300;
	                        $config['height']= 300;
	                        $config['new_image']= './assets/images/ppdb/'.$gbr['file_name'];
							$config['new_image']= './assets/images/ppdb/'.$gbr2['file_name'];
							$config['new_image']= './assets/images/ppdb/'.$gbr3['file_name'];
							$config['new_image']= './assets/images/ppdb/'.$gbr4['file_name'];
							$config['new_image']= './assets/images/ppdb/'.$gbr5['file_name'];
	
	                        $this->load->library('image_lib', $config);
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
							echo $this->session->set_flashdata('msg','success');
							redirect('admin/ppdb');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/ppdb');
	                }
	                 
	            }else{
	            	$nama_lengkap=strip_tags($this->input->post('xnama_lengkap'));
					$nama_panggilan=strip_tags($this->input->post('xnama_panggilan'));
					$alamat=strip_tags($this->input->post('xalamat'));
					$tempat_tanggal_lahir=strip_tags($this->input->post('xtempat_tanggal_lahir'));

					$this->m_ppdb->simpan_guru_tanpa_img($nama_lengkap,$nama_panggilan,$alamat,$tempat_tanggal_lahir);
					echo $this->session->set_flashdata('msg','success');
					redirect('admin/ppdb');
				}
				
	}
	
	function update_guru(){
				
	            $config['upload_path'] = './assets/images/ppdb'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 300;
	                        $config['height']= 300;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();
	                        $gambar=$this->input->post('gambar');
							$path='./assets/images/'.$gambar;
							unlink($path);

	                        $photo=$gbr['file_name'];
	                        $kode=$this->input->post('kode');
							$nip=strip_tags($this->input->post('xnip'));
							$nama=strip_tags($this->input->post('xnama'));
							$jenkel=strip_tags($this->input->post('xjenkel'));
							$tmp_lahir=strip_tags($this->input->post('xtmp_lahir'));
							$tgl_lahir=strip_tags($this->input->post('xtgl_lahir'));
							$mapel=strip_tags($this->input->post('xmapel'));

							$this->m_ppdb->update_guru($kode,$nip,$nama,$jenkel,$tmp_lahir,$tgl_lahir,$mapel,$photo);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/guru');
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/guru');
	                }
	                
	            }else{
							$kode=$this->input->post('kode');
							$nip=strip_tags($this->input->post('xnip'));
							$nama=strip_tags($this->input->post('xnama'));
							$jenkel=strip_tags($this->input->post('xjenkel'));
							$tmp_lahir=strip_tags($this->input->post('xtmp_lahir'));
							$tgl_lahir=strip_tags($this->input->post('xtgl_lahir'));
							$mapel=strip_tags($this->input->post('xmapel'));
							$this->m_ppdb->update_guru_tanpa_img($kode,$nip,$nama,$jenkel,$tmp_lahir,$tgl_lahir,$mapel);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/guru');
	            } 

	}

	function hapus_guru(){
		$kode=$this->input->post('kode');
		$gambar=$this->input->post('gambar');
		$path='./assets/images/'.$gambar;
		unlink($path);
		$this->m_ppdb->hapus_guru($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/guru');
	}

}