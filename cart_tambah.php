<?php
	include'core/init.php';
	//session_start();
	$kode_pemb = $_SESSION['kode_pembeli1'];
	$id = $_GET['id'];
	$qty = 1;

	$hasil = mysqli_query($db,"SELECT * FROM barang WHERE kode_brg ='$id'");
		while($baris = mysqli_fetch_array($hasil)){
  			echo $db_qty = $baris['qty'];
		}

	$sql = mysqli_query($db,"SELECT * FROM jualtemp WHERE kode_brg='$id'");
		while($baris1 = mysqli_fetch_assoc($sql)){
			echo $qty2 = $baris1['qty'];
		}

	if($db_qty < 3 OR $db_qty == $qty2 ){
?>
		<script>
			confirm("Stok tidak cukup");
			 document.location=('cart_add.php');
		</script>

<?php

	}else{

	$hasil = mysqli_query($db,"UPDATE jualtemp set qty = qty + '$qty' where kode_brg = '$id' and kode_pembeli ='$kode_pemb'");
	}
?>

	<script>
		document.location=('cart_add.php');
	</script>