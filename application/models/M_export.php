<?php
class M_export extends CI_Model{
    
    function get_all_ppdb(){
		$hsl=$this->db->query("SELECT * FROM tbl_ppdb");
		return $hsl;
	}

	function simpan_ppdb($nama_lengkap,$nama_panggilan,$alamat,$tempat_tanggal_lahir,$ijazah_tk,$akta_kelahiran,$ktp_orang_tua,$kartu_keluarga,$sertifikat_penghargaan){
		$hsl=$this->db->query("INSERT INTO tbl_ppdb (nama_lengkap,nama_panggilan,alamat,tempat_tanggal_lahir,ijazah_tk,akta_kelahiran,kartu_keluarga,sertifikat_penghargaan) VALUES ('$nama_lengkap','$nama_panggilan','$alamat','$tempat_tanggal_lahir','$ijazah_tk','$akta_kelahiran','$ktp_orang_tua','$kartu_keluarga','$sertifikat_penghargaan')");
		return $hsl;
	}
	function simpan_guru_tanpa_img($nama_lengkap,$nama_panggilan,$alamat,$tempat_tanggal_lahir,$ijazah_tk,$akta_kelahiran,$ktp_orang_tua,$kartu_keluarga){
		$hsl=$this->db->query("INSERT INTO tbl_ppdb (nama_lengkap,nama_panggilan,alamat,tempat_tanggal_lahir,ijazah_tk,akta_kelahiran,ktp_orang_tua,kartu_keluarga) VALUES ($nama_lengkap,$nama_panggilan,$alamat,$tempat_tanggal_lahir,$ijazah_tk,$akta_kelahiran,$ktp_orang_tua,$kartu_keluarga)");
		return $hsl;
	}

	function update_guru($kode,$nama_lengkap,$nama_panggilan,$alamat,$tempat_tanggal_lahir,$ijazah_tk,$akta_kelahiran,$ktp_orang_tua,$kartu_keluarga,$sertifikat_penghargaan){
		$hsl=$this->db->query("UPDATE tbl_ppdb SET nama_lengkap='$nama_lengkap',nama_panggilan='$nama_panggilan',alamat='$alamat',tempat_tanggal_lahir='$tempat_tanggal_lahir',ijazah_tk='$ijazah_tk',akta_kelahiran='$akta_kelahiran',ktp_orang_tua='$ktp_orang_tua',kartu_keluarga='$kartu_keluarga',sertifikat_penghargaan='$sertifikat_penghargaan' WHERE ppdb_id='$kode'");
		return $hsl;
	}
	function update_guru_tanpa_img($kode,$nama_lengkap,$nama_panggilan,$alamat,$tempat_tanggal_lahir,$ijazah_tk,$akta_kelahiran,$ktp_orang_tua,$kartu_keluarga){
		$hsl=$this->db->query("UPDATE tbl_ppdb SET nama_lengkap='$nama_lengkap',nama_panggilan='$nama_panggilan',alamat='$alamat',tempat_tanggal_lahir='$tempat_tanggal_lahir',ijazah_tk='$ijazah_tk',akta_kelahiran='$akta_kelahiran',ktp_orang_tua='$ktp_orang_tua',kartu_keluarga='$kartu_keluarga',ktp_orang_tua='$ktp_orang_tua',kartu_keluarga='$kartu_keluarga' WHERE ppdb_id='$kode'");
		return $hsl;
	}
	function hapus_guru($kode){
		$hsl=$this->db->query("DELETE FROM tbl_ppdb WHERE ppdb_id='$kode'");
		return $hsl;
	}

	//front-end
	function guru(){
		$hsl=$this->db->query("SELECT * FROM tbl_ppdb");
		return $hsl;
	}
	function guru_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT * FROM tbl_ppdb limit $offset,$limit");
		return $hsl;
	}



}