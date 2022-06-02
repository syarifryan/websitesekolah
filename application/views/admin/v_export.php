<?php
//import koneksi ke database
?>
<html>
<head>
  <title>Stock Barang</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>Export</h2>
			<h4>PPDB</h4>
			<div class="data-tables datatable-dark">
					
                <table id="mauexport" class="table table-striped" style="font-size:13px;">
                <thead>
                <tr>
                    <th>Foto</th>
          			<th>Nama Lengkap</th>
          			<th>Nama Panggilan</th>
          			<th>Alamat</th>
          			<th>Tempat, Tanggal Lahir</th>
          			<th>Ijazah TK</th>
                    <th>Akta Kelahiran</th>
                    <th>KTP Orang Tua</th>
                    <th>Kartu Keluarga</th>
                    <th>Sertifikat Penghargaan</th>
                    
                </tr>
                </thead>
                <tbody>
          			<?php
          				$no=0;
          				foreach ($data->result_array() as $i) :
          					$no++;
          					$id=$i['ppdb_id'];
          					$nama_lengkap=$i['nama_lengkap'];
          					$nama_panggilan=$i['nama_panggilan'];
          					$alamat=$i['alamat'];
          					$tempat_tanggal_lahir=$i['tempat_tanggal_lahir'];
          					$ijazah_tk=$i['ijazah_tk'];
                            $akta_kelahiran=$i['akta_kelahiran'];
                            $ktp_orang_tua=$i['ktp_orang_tua'];
                            $kartu_keluarga=$i['kartu_keluarga'];
                            $sertifikat_penghargaan=$i['sertifikat_penghargaan'];

                    ?>
                <tr>
                    <?php if(empty($sertifikat_penghargaan)):?>
                        <td><img width="40" height="40" class="img-circle" src="<?php echo base_url().'assets/images/user_blank.png';?>"></td>
                        <?php else:?>
                        <td><img width="40" height="40" class="img-circle" src="<?php echo base_url().'assets/images/ppdb/'.$photo;?>"></td>
                        <?php endif;?>
                        <td><?php echo $nama_lengkap;?></td>
                            <td><?php echo $nama_panggilan;?></td>
                        <td><?php echo $tempat_tanggal_lahir;?></td>
                  
                </tr>
				<?php endforeach;?>
                </tbody>
              </table>
					
			</div>
</div>
	
<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>