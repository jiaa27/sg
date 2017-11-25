<?php 
  include "core/init.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Toko Sepeda Succesfull Garden</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/logo.png">

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="core/main.css">
    <link rel="stylesheet" type="text/css" href="core/bootstrapValidator.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
   
    <script type="text/javascript" src="bootstrap/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrapValidator.min.js"></script>
</head>
<body>
	<div class="header">
		<?php include "header.php"; ?>
	</div>	

	<div class="container-fixed" style="margin-top: 0px;">
		<?php include "carousel1.php"; ?>
	</div>

	<div class="container-fluid">
		<div class="row">
			<?php include "content.php";?>
		</div>
	</div>

	<?php include "footer.php";?>

</body>	
</html>