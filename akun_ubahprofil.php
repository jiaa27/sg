<style type="text/css">   
 body > .container {
    /*height: 100%;*/
    margin-top: 40px;
    padding-bottom: 20px;
    }
</style>

<?php
    include 'header.php';
?>
<script type="text/javascript" src="ajax/ajax_kota.js"></script>

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
						$kode_pemb= $baris['kode_pembeli'];
						$nama = $baris['nama_pembeli'];
						$telp = $baris['telepon'];
						$alamat = $baris['alamat'];
						$kodepos = $baris['kodepos'];
						$kota = $baris['kota'];
						$prov =$baris['provinsi'];
					} 
				?>

				<a href="#" class="list-group-item active disabled" style="font-size: 18px;" align="center"><span class ="fa fa-user"></span>  <?= $nama ?></a>  
			</div>
			<div class="list-group">
				<a href="akun_akunsaya.php" class="list-group-item active"><span class="glyphicon glyphicon-heart"></span> Akun Saya</a>
				<a href="akun_belanjaansaya.php" class="list-group-item"><span class="glyphicon glyphicon-briefcase"></span> Belanjaan saya</a>
			</div>
		</div>

		<div class="col-md-9">
		<form class="form-horizontal" action="script/kd_ubahprofil.php" method="post" enctype="multipart/form-data" id="form1">
		<div class="panel panel-primary">
		<div class="panel-heading"><span class="glyphicon glyphicon-edit"></span>&nbsp; Ubah Profil atau Alamat</div>
			<div class="panel-body">
				<div class="form-group">
					<label for="nama" class="control-label col-md-2">Nama</label>
					<div class="col-md-10">
						<input  class="form-control" type="text" id="nama" name="nama" style="text-transform: capitalize" placeholder="Nama anda" value="<?= $nama ?>" required="">
					</div>
				</div>
				<div class="form-group">
					<label for="notlp" class="control-label col-md-2">No. Telp</label>
					<div class="col-md-10">
						<input  class="form-control" type="text" id="notlp" name="notlp" value="<?= $telp ?>"  placeholder="Nomor Handphone/Telephone" required="">
					</div>
				</div>
				<div class="form-group">
		        	<label for="prop" class="control-label col-md-2">Provinsi</label>
		        	<div class="col-md-10">
		        		<select name="prop" id="prop" class="form-control" onchange="showResultKota(this.value)">
		            	<option value="" selected="selected" >Pilih Provinsi</option>
		                <?php 
		                    include "ongkir/Propinsi.php";
		                    echo $list_propinsi;
		                ?>          
		        		</select>
				    </div>
		  		</div>

		  		<div class="form-group">
          			<label for="kota" class="control-label col-md-2">Kota/Kab</label>
          			<div class="col-md-10">
           	    		<select name="kota" id="kota" class="form-control" required>
                    	<option selected="selected" value="">Pilih Kota/Kabupaten</option>       
               			 </select>
              		</div>
      			</div>

      			 <div class="form-group">
                    <label class="control-label col-md-2" for="alamat">Alamat</label>
                    <div class="col-md-10">
                        <textarea rows="2" class="form-control" style="text-transform: capitalize" id="alamat" name="alamat"  placeholder="Masukan Alamat Lengkap"><?= $alamat?></textarea>
                        </div>
                 </div>

                <div class="form-group">
       				<label for="kodepos" class="control-label col-md-2">Kode Pos</label>
       				<div class="col-md-10">
       					<input type="text" id="kodepos" name="kodepos" value="<?= $kodepos?>" class="form-control" placeholder="Kode pos" required="">
       				</div>
       			</div>

				<div class="form-group">
				   <div class="col-md-12" align="right">
	            		<button type="submit" class="btn btn-sm btn-primary" value="ubah" name="ubah"><span class="glyphicon glyphicon-check"></span>  Ubah Profil atau Alamat</button>
	       				<input class="btn btn-sm btn-default" type="reset" value="reset">
	       	 		</div>
	      		</div>

			</div> 
		</div>
		</form>
		</div>
	</div>	
</div>

<?php include 'footer.php' ?>