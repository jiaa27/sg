<?php
	include 'core/init.php';
	@session_start();
	$kode_pemb = $_SESSION['kode_pembeli1'];
	mysqli_query($db,"delete from jualtemp where kode_pembeli = '".$kode_pemb."'");
?>
	<script> 
		document.location=('index.php');
	</script>
<?php

?>


