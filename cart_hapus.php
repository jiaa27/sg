<?php
	include'core/init.php';
		$kd = $_GET['kd'];
	mysqli_query($db,"delete from jualtemp where kode_brg = '".$kd."'");
?>
	<script> 
		document.location=('cart_add.php');
	</script>
<?php

?>