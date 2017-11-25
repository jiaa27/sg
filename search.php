<?php
    include 'header.php';
    include 'carousel1.php';
?>

<!--produk-->
<div class="container">
	<div class="row">

<?php
	if(isset($_POST['cari'])) {
		$cari = $_POST['txtcari'];

		
		$hasil = mysqli_query($db,"SELECT * from barang WHERE kode_brg LIKE '%$cari%' or nama_brg LIKE '%$cari%'");
		$hitung = mysqli_num_rows($hasil);
		//$hasil = $_GET["hasil"];

		if($cari == "") {
?>
			<div class="container">
				<h1 class="well text-center" style="margin-bottom: 60px;margin-top: 60px;">Pencarian Kosong, Isi dengan Benar</h1>
			</div>
		
<?php
		} else {
		if($hitung == 0) {
?>
			<div class="container">
				<h1 class="well text-center" style="margin-bottom: 60px;margin-top: 60px;">Pencarian tidak ditemukan</h1>
			</div>
<?php
		}else{ 
?>
			<h3 class="well text-center">Pencarian ditemukan : "<?=$cari?>"</h3>
<?php
		while($baris = mysqli_fetch_array($hasil)) {
			$gambar =  $baris['foto'];
			$nama = $baris['nama_brg'];
			$harga = $baris['harga_jual'];
			$kode = $baris['kode_brg'];
?>
	
	
		<div class="col-sm-3 col-md-3 col-xs-3">
			<div class="thumbnail"
				 style="-webkit-box-shadow: 0px 5px 16px -3px rgba(0,0,0,0.60);
						-moz-box-shadow: 0px 5px 16px -3px rgba(0,0,0,0.60);
						box-shadow: 0px 5px 16px -3px rgba(0,0,0,0.60);">

				<img src="<?= $gambar?>" alt="<?= $nama;?>" style="width:auto; height:200px;padding-top: 20px;">
					<div class="caption">
						<h5> <?= $nama; ?> </h5>
	                    <p> Harga : <?= money($harga); ?></p>
	                    <p><a href="#" class="btn-sm btn-primary" onclick="detailsmodal('<?= $kode ?>')">Details</a></p>
	                </div>
			</div>
		</div>

<?php
		}

		
?>


<?php
		}		
		}
	}
?>


		
	</div>
</div>
<!-- end -->

<?php
	include 'footer.php';
?>