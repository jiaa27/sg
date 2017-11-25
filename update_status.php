<?php
	include'core/init.php';
	$kode_jual = $_GET['id'];

	$status = '5';
	$sql = mysqli_query($db,"UPDATE jualhd set status = '".$status."' where kode_jual = '".$kode_jual."' ");
?>

<script>
	document.location=('akun_belanjaansaya.php');
</script>
