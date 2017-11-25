<style type="text/css">   
 body > .container {
    /*height: 100%;*/
    margin-top: 50px;
    /*padding-bottom: 100px;*/
    }
</style>

<?php
    include 'header.php';
?>

<div class="container well" style="background-color: white;">
	<div class="row">
		<div class="col-md-3">
			<div class="list-group">
				<?php 
					if(isset($_SESSION['email'])){
						$email = $_SESSION['email'];
						$sql = "SELECT * FROM pembeli WHERE email = '{$email}'";
						$perintah = $db->query($sql);
						$baris = mysqli_fetch_assoc($perintah);
						$nama = $baris['nama_pembeli'];
						$telp = $baris['telepon'];
						$alamat = $baris['alamat'];
						$kodepos = $baris['kodepos'];
						$kota = $baris['kota'];
						$prov =$baris['provinsi'];
					} 
				?>
				<a href="#" class="list-group-item active disable" style="font-size: 18px;" align="center"><span class ="fa fa-user"></span>  <?= $nama ?></a>  
			</div>
			<div class="list-group">
				<a href="akun_akunsaya.php" class="list-group-item active"><span class="glyphicon glyphicon-heart"></span> Akun Saya</a>
				<a href="akun_belanjaansaya.php" class="list-group-item"><span class="glyphicon glyphicon-briefcase"></span> Belanjaan saya</a>
			</div>
		</div>

		<div class="col-md-9">
		<form class="form-horizontal" id="form1" name="form1" method="post" action="akun_ubahpassword.php">
			<div class="panel panel-primary shadow">
				<div class="panel-heading" style="padding: 5px 15px ;">
					<h5><i class="fa fa-user" > </i>&nbsp Profilku</h5>
				</div>
				<div class="panel-body" style="font-size: 16px; padding-bottom: 0;">
					<div class="form-group" style="margin-bottom: 0;">
						<table width="100%" class="table" style="margin-bottom: 0;">
							<tr>
								<td width="20%"><label>Nama Lengkap</label></td>
								<td width="5%">:</td>
								<td> <?= $nama?> </td>
							</tr>
							<tr>
								<td><label>Email</label></td>
								<td>:</td>
								<td><?= $email?> </td>
							</tr>
							<tr>
								<td><label>No.Telepon</label></td>
								<td>:</td>
								<td><?= $telp ?></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td align="right">
								<button type="submit" class="btn btn-sm btn-danger" value="ubah"><span class="glyphicon glyphicon-edit"></span> Ubah Password</button></td>
							</tr>
						</table>
					</div>
				</div>
			</div>	
		</form>

		<form class="form-horizontal" id="form1" name="form1" method="post" action="akun_ubahprofil.php">	
			<div class="panel panel-primary shadow">
				<div class="panel-heading" style="padding: 5px 15px ;">
					<h5><i class="fa fa-home" > </i>&nbsp Alamat Saya</h5>
				</div>

				<div class="panel-body" style="font-size: 16px; style="margin-bottom: 0;"">
					<div class="form-group" style="margin-bottom: 0;">
						<table width="100%" class="table" style="margin-bottom: 0;">
							<tr>
								<td width="20%"><label>Nama Penerima</label></td>
								<td width="5%">:</td>
								<td> <?= $nama?> </td>
							</tr>
							<tr>
								<td><label>No.Telepon</label></td>
								<td>:</td>
								<td><?= $telp?> </td>
							</tr>
							<tr>
								<td><label>Alamat</label></td>
								<td>:</td>
								<td><?= $alamat ?></td>
							</tr>
							<tr>
								<td><label>Kode Pos</label></td>
								<td>:</td>
								<td><?= $kodepos ?></td>
							</tr>
							<tr>
								<td><label>Kota</label></td>
								<td>:</td>
								<td><?= $kota ?></td>
							</tr>
							<tr>
								<td><label>Provinsi</label></td>
								<td>:</td>
								<td><?= $prov ?></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td align="right"><button href="akun_ubahalamat.php" type="submit" class="btn btn-sm btn-danger" value="ubah" style="margin-top:-10px;margin-bottom:-10px;"><span class="glyphicon glyphicon-edit"></span> Ubah Profil atau Alamat</button></td>
							</tr>
						</table>
					</div>
				</div>


			</div>
		</form>

		</div>	

	</div>
</div>

<?php
    include 'footer.php'
?>
