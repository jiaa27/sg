<?php
	include'core/init.php';
	//session_start();
	$kode_pemb = $_SESSION['kode_pembeli1'];
	$id = $_GET['id'];
	$qty = 1;

	$sql = mysqli_query($db,"SELECT * FROM jualtemp where kode_brg = '$id' and kode_pembeli = '$kode_pemb'");
	while($baris = mysqli_fetch_array($sql)){
		$qty2 = $baris['qty'];
	}

	if($qty2 == 1){
?>
		<script>
			confirm("Kuantitas anda hanya 1, Tekan hapus untuk membuangnya");
			document.location=('cart_add.php');
		</script>
<?php

	}else{
	$hasil = mysqli_query($db,"UPDATE jualtemp set qty = qty - '$qty' where kode_brg = '$id' And kode_pembeli ='$kode_pemb'");
	}
?>
	<script>
		document.location=('cart_add.php');
	</script>
