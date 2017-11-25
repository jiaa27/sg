<?php 
require_once 'core/init.php';
$kode_brg = $_POST['kode_brg'];	
// $kode_brg = (varchar)$kode_brg;
$sql = "SELECT * FROM barang WHERE kode_brg = '$kode_brg' ";
$result = $db->query($sql);
$barang = mysqli_fetch_assoc($result);

$merk_kode = $barang['merk'];
$sql = "SELECT merk FROM merk WHERE kode_merk ='$merk_kode'";
$merk_query = $db->query($sql);
$merk = mysqli_fetch_assoc($merk_query);

?>

<!-- modal -->
<?php ob_start(); ?>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="core/main.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" href="core/bootstrapValidator.min.css"/>
    <!-- <link href="bootstrap/tambahan.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
   

    <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/bootstrapValidator.min.js" type="text/javascript"></script>

<form action="script/kd_detailproduk.php?id=<?= $barang['kode_brg']; ?>" method="post" name="form1" enctype="multipart/form-data">
<div class="modal fade details-1" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
		<div class="modal-header">
			<button class="close" type="button" onclick="closemodal()" aria-label="close">
				<span aria-hidden="true">&times;</span>
			</button>
			<h4 class="modal-title text-center"><?= $barang['nama_brg']; ?></h4>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6">
						<div class="center-block">
							<img src="<?= $barang['foto']; ?>"  style="width:90%; height: auto;" alt="<?= $barang['nama_brg']; ?>" class="details img-responsive">

						</div>
					</div>
					<div class="col-sm-6">
						<h4>Details</h4>
						<p><?= $barang['deskripsi']; ?></p>
						<hr>
						<!-- <p>Harga : <?=$barang['harga_jual']; ?> </p> -->
						<p>Harga :<?=money($barang['harga_jual'])?></p>
						<p>Merk : <?= $merk['merk'];?> </p>
						<!-- <p>Berat : <?=$barang['berat']; ?> Gram </p> -->
						<hr>
							<div class="form-group">
								<div class="col-xs-3">
									<label for="quantity">Kuantitas:</label>
									<input type="number" name="qty" class="form-control" id="qty" required="" min="1">
								</div> <br>
								<div class="col-xs-9">&nbsp;</div>
							<p>Tersedia : <?= $barang['qty'];?> </p>
							</div>
					
					</div>
				</div>
			</div>
		</div>

		<div class="modal-footer">
			<input class="btn btn-default" onclick="closemodal()" value="Close"></input>
			<button class="btn btn-primary" type="submit" name="beli" id="beli"><span class="glyphicon glyphicon-shopping-cart"></span> Masukkan Ke Keranjang</button>
		</div>
	  </div>
	</div>
</div>
</form>
<?php
include'validator.php';
?>


<script>
	function closemodal(){
		jQuery('#details-modal').modal('hide');
		setTimeout(function(){
			jQuery('#details-modal').remove();
			jQuery('.modal-backdrop').remove();
		},500);
	}
</script>
<?php echo ob_get_clean(); ?>
<!-- endmodal -->