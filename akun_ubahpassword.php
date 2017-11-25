<style type="text/css">   
 body > .container {
    /*height: 100%;*/
    margin-top: 87px;
    padding-bottom: 150px;
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
					$kode_pemb = $_SESSION['kode_pembeli1'];

					if(isset($_SESSION['email'])){
						$email = $_SESSION['email'];
						$sql = "SELECT * FROM pembeli WHERE email = '{$email}'";
						$perintah = $db->query($sql);
						$baris = mysqli_fetch_assoc($perintah);
						$nama = $baris['nama_pembeli'];} 
				?>
				<a href="#" class="list-group-item active disable" style="font-size: 18px;" align="center"><span class ="fa fa-user"></span>  <?= $nama ?></a>  
			</div>
			<div class="list-group">
				<a href="akun_akunsaya.php" class="list-group-item active"><span class="glyphicon glyphicon-heart"></span> Akun Saya</a>
				<a href="akun_belanjaansaya.php" class="list-group-item"><span class="glyphicon glyphicon-briefcase"></span> Belanjaan saya</a>
			</div>
		</div>

		<div class="col-md-9">
		<form class="form-horizontal" action="script/kd_ubahpassword.php" method="post" enctype="multipart/form-data" id="form1">
		<div class="panel panel-primary">
		<div class="panel-heading"><span class="glyphicon glyphicon-edit"></span>&nbsp; Ubah Password</div>
			<div class="panel-body">
				<div class="form-group">
					<label for="passlama" class="control-label col-md-4">Password Saat Ini</label>
					<div class="col-md-8">
						<input  class="form-control" type="password" id="passlama" name="passlama" placeholder="Password Anda Saat Ini" required="" autofocus="">
					</div>
				</div>
				<div class="form-group">
					<label for="pass" class="control-label col-md-4">Password Baru</label>
					<div class="col-md-8">
						<input  class="form-control" type="password" id="pass" name="pass" placeholder="Password Baru" required="">
					</div>
				</div>
				<div class="form-group">
					<label for="pass1" class="control-label col-md-4">Ulangi Password Baru</label>
					<div class="col-md-8">
						<input  class="form-control" type="password" id="pass1" name="pass1" placeholder="Ulangi Password Baru" required="">
					</div>
				</div>

				<div class="form-group">
				   <div class="col-md-12" align="right">
	            		<button type="submit" class="btn btn-sm btn-primary" value="ubah" name="ubah"><span class="glyphicon glyphicon-check"></span> Ubah Password</button>
	       				<!-- <input class="btn btn-sm btn-default" type="reset" value="reset"> -->
	       	 		</div>
	      		</div>

			</div> 
		</div>
		</form>
		</div>
	</div>	
</div>

<?php
    include 'footer.php';
?>