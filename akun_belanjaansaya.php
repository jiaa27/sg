 <style type="text/css">
    body > .container {
      /*height: 100%;*/
      margin-top: 90px;
      padding-bottom: 98px;
    }
 </style>

 <?php 
 	include 'header.php';

	$kode_pemb = $_SESSION['kode_pembeli1'];

	if(isset($_SESSION['email'])){
		$email = $_SESSION['email'];
		$sql = "SELECT * FROM pembeli WHERE email = '{$email}'";
		$perintah = $db->query($sql);
		$baris = mysqli_fetch_assoc($perintah);
		$kode_pemb = $baris['kode_pembeli'];
		$nama = $baris['nama_pembeli'];
	} 

//isi
	$sql1 = "SELECT * FROM jualhd WHERE kode_pembeli = '$kode_pemb' and (status = 1 or status = 2 or status = 3 or status = 4) ORDER BY kode_jual asc";
	$perintah1 = $db->query($sql1); 

	$no = 0;
	$btn ="";
	$isi = "";
	$status = "";

	while ($baris1 = mysqli_fetch_array($perintah1)) {
		$no++;
		$kode_jual = $baris1['kode_jual'];
		$tgl = $baris1['tgl_jual'];
		$status = $baris1['status'];
		$gtotal = $baris1['grand_total'];

		$tglbaru = strtotime('+3 day',strtotime($tgl));
		$tglbaru2 = date('Y-m-j', $tglbaru);
		$tglbaru3 = date('H:i', $tglbaru);
		// $hari = date('D', strtotime($tglbaru2));
		// $dayList = array(
		// 	'Sun' => 'Minggu',
		// 	'Mon' => 'Senin',
		// 	'Tue' => 'Selasa',
		// 	'Wed' => 'Rabu',
		// 	'Thu' => 'Kamis',
		// 	'Fri' => 'Jumat',
		// 	'Sat' => 'Sabtu');

	if ($status == 1){
		$btn = "danger";
		$status = "Belum Dibayar";
	}elseif ($status == 2){
		$btn = "warning";
		$status = "Sedang diVerifikasi";
	}elseif ($status == 3){
		$btn = "success";
		$status = "Sedang diproses";
	}elseif ($status == 4){
		$btn = "info";
		$status = "Sedang dikirim";
	}elseif ($status == 5){
		$btn = "default";
		$status = "Belanja Selesai";}
	elseif ($status == 0){
		$btn = "danger";
		$status = "Batal";
	}
	
		
	$isi .= "<tr class=$btn>
  				<td>$no</td>
  				<td><a data-toggle=\"modal\" href=\"#detail$kode_jual\">$kode_jual</a></td>
  				<td>".date('d M Y H:i', strtotime($tgl))." </td>
  				<td>".date('d M Y H:i', strtotime($tglbaru2.$tglbaru3))." </td>
  				<td>".money($gtotal)."</td>
  				<td><span class=\"badge\">$status</span></td>
		     </tr>";
		       include 'modal_belanja.php';	     
}
//end-isi
?>

<?php 

//isi1
	$sql2 = "SELECT * FROM jualhd WHERE kode_pembeli = '$kode_pemb' and status = 4  ORDER BY kode_jual asc";
	$perintah2 = $db->query($sql2); 

	$no = 0;
	$btn ="";
	$isi1 = "";
	$status = "";

	while ($baris2 = mysqli_fetch_array($perintah2)) {
		$no++;
		$kode_jual = $baris2['kode_jual'];
		$tgl = $baris2['tgl_jual'];
		$status = $baris2['status'];
		$noresi = $baris2['no_resi'];
		$gtotal = $baris2['grand_total'];

		$tglbaru = strtotime('+3 day',strtotime($tgl));
		$tglbaru2 = date('Y-m-j', $tglbaru);
		$tglbaru3 = date('H:i', $tglbaru);
		// $hari = date('D', strtotime($tglbaru2));
		// $dayList = array(
		// 	'Sun' => 'Minggu',
		// 	'Mon' => 'Senin',
		// 	'Tue' => 'Selasa',
		// 	'Wed' => 'Rabu',
		// 	'Thu' => 'Kamis',
		// 	'Fri' => 'Jumat',
		// 	'Sat' => 'Sabtu');

	if ($status == 1){
		$btn = "Danger";
		$status = "Belum Dibayar";
	}elseif ($status == 2){
		$btn = "warning";
		$status = "Sedang diVerifikasi";
	}elseif ($status == 3){
		$btn = "success";
		$status = "Sedang diproses";
	}elseif ($status == 4){
		$btn = "info";
		$status = "Sedang dikirim";
	}elseif ($status == 5){
		$btn = "default";
		$status = "Belanja Selesai";}
	elseif ($status == 0){
		$btn = "danger";
		$status = "Batal";
	}
	
		
	$isi1 .= "<tr class=$btn>
  				<td>$no</td>
  				<td><a data-toggle=\"modal\" href=\"#detail$kode_jual\">$kode_jual</a></td>
  				<td>".date('d M Y H:i', strtotime($tgl))." </td>
  				<td>".money($gtotal)."</td>
  				<td>$noresi</td>
  				<td><span class=\"badge\">$status</span></td>
  				<td>
					<div class=\"btn-group btn-group-xs\" role=\"group\">
      				<a data-toggle=\"modal\" href=\"update_status.php?id=$kode_jual\" onclick=\"return confirm ('Anda sudah menerima pesanan dengan nomor pesanan $kode_jual?');\" class=\"btn btn-primary \">Diterima</a>
      				</div>
  				</td>
		     </tr>";	
		     include 'modal_belanja.php';     
}
//end-isi1	
 ?>


 <?php 
//isi2
	$sql3 = "SELECT * FROM jualhd WHERE kode_pembeli = '$kode_pemb' and (status = 5 or status = 0) ORDER BY kode_jual asc";
	$perintah3 = $db->query($sql3); 

	$no = 0;
	$btn ="";
	$isi2 = "";
	$status = "";

	while ($baris3 = mysqli_fetch_array($perintah3)) {
		$no++;
		$kode_jual = $baris3['kode_jual'];
		$tgl = $baris3['tgl_jual'];
		$status = $baris3['status'];
		$noresi = $baris3['no_resi'];
		$gtotal = $baris3['grand_total'];

		$tglbaru = strtotime('+3 day',strtotime($tgl));
		$tglbaru2 = date('Y-m-j', $tglbaru);
		$tglbaru3 = date('H:i', $tglbaru);
		// $hari = date('D', strtotime($tglbaru2));
		// $dayList = array(
		// 	'Sun' => 'Minggu',
		// 	'Mon' => 'Senin',
		// 	'Tue' => 'Selasa',
		// 	'Wed' => 'Rabu',
		// 	'Thu' => 'Kamis',
		// 	'Fri' => 'Jumat',
		// 	'Sat' => 'Sabtu');

	if ($status == 1){
		$btn = "Danger";
		$status = "Belum Dibayar";
	}elseif ($status == 2){
		$btn = "warning";
		$status = "Sedang diVerifikasi";
	}elseif ($status == 3){
		$btn = "success";
		$status = "Sedang diproses";
	}elseif ($status == 4){
		$btn = "info";
		$status = "Sedang dikirim";
	}elseif ($status == 5){
		$btn = "default";
		$status = "Belanja Selesai";}
	elseif ($status == 0){
		$btn = "danger";
		$status = "Batal";
	}
	
		
	$isi2 .= "<tr class=$btn>
  				<td>$no</td>
  				<td><a data-toggle=\"modal\" href=\"#detail$kode_jual\">$kode_jual</a></td>
  				<td>".date('d M Y H:i', strtotime($tgl))." </td>
  				<td>".money($gtotal)."</td>
  				<td>$noresi</td>
  				<td><span class=\"badge\">$status</span></td>
  				
		     </tr>";	
		     include 'modal_belanja.php';     
}
//end-isi2
 ?>

<div class="container well" style="background-color: white;">
	<div class="row">
		<div class="col-md-3">
			<div class="list-group">


				<a href="#" class="list-group-item active disabled" style="font-size: 18px;" align="center"><span class ="fa fa-user"></span>  <?= $nama ?></a>  
			</div>
			<div class="list-group">
				<a href="akun_akunsaya.php" class="list-group-item"><span class="glyphicon glyphicon-heart"></span> Akun Saya</a>
				<a href="akun_belanjaansaya.php" class="list-group-item active"><span class="glyphicon glyphicon-briefcase"></span> Belanjaan saya</a>
			</div>
		</div>

		<div class="col-md-9">
      		<div class="panel panel-primary shadow">
        	<div class="panel-heading" style="padding: 5px 15px;">
          		<h5><i class="fa fa-bag" > </i>&nbsp Belanjaan Saya</h5>
        	</div>
        <div class="panel-body">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#2" data-toggle="tab">Status Pemesanan</a></li>
              <li><a href="#3" data-toggle="tab">Konfirmasi Penerimaan</a></li>
              <li><a href="#4" data-toggle="tab">Daftar Belanjaan</a></li>
            </ul>

            <div class="panel panel-default panel-body" style="border-top-left-radius: 0px; border-top-right-radius: 0px; ">
              <div class="tab-content">
                <div class="tab-pane active" id="2">
                  <div class="table-responsive">
                     <table width="100%" class="table table-condensed table-striped table-hover" style="text-align: center;">
						<thead>
							<th class="text-center">No</th>
							<th class="text-center">Kode Pesanan</th>
							<th class="text-center">Tanggal Pemesanan</th>
							<th class="text-center">Batas Tanggal Bayar</th>
							<th class="text-center">Total Belanjaan</th>
							<th class="text-center">Status</th>
						</thead>
						<tbody>
							<?php echo $isi ?>
					  	</tbody>
					 </table>
                  </div>
                </div>

                <div class="tab-pane" id="3">
                  <div class="table-responsive">
                     <table width="100%" class="table table-condensed table-striped table-hover">
						<thead>
							<th>No</th>
							<th>Kode Pesanan</th>
							<th>Tanggal Pemesanan</th>
							<th>Total Belanjaan</th>
							<th>No. Resi</th>
							<th>Status</th>
							<th>Aksi</th>
						</thead>
						<tbody>
							<?php echo $isi1 ?>
					  	</tbody>
					 </table>
                  </div>
                </div>

                <div class="tab-pane" id="4">
                  <div class="table-responsive">
                     <table width="100%" class="table table-striped table-hover">
						<thead>
							<th>No</th>
							<th>Kode Pesanan</th>
							<th>Tanggal Pemesanan</th>
							<!-- <th>Batas Tanggal Bayar</th> -->
							<th>Total Belanjaan</th>
							<th>No. Resi</th>
							<th>Status</th>
						</thead>
						<tbody>
							<?php echo $isi2 ?> 
					  	</tbody>
					 </table>
                  </div>
                </div>


              </div>
            </div>
        	</div>
      		</div>
    	</div>


	</div>	
</div>

  <?php 
  	include 'footer.php';
   ?>