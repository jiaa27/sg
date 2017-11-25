 <style type="text/css">
    body > .container {
      height: 50%;
      margin-top: 150px;
      margin-bottom: 85px;
      /*margin-bottom: -35px;*/
    }
 </style>

<?php 
    include "header.php"
 ?>

<div class="container">
    <div class="row">
    <div class="col-sm-6 col-md-6 col-md-offset-3">
     <div class="panel-primary">
     	<div class="panel-heading" align="center" style="font-size: 20px"> 
       Masukkan Email Anda
        </div>
        <div class="panel-body" style="background-color: #dadada;">
      	<form class="form">
        	<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">


        	<div align="right" style="margin-top: 10px; margin-bottom: -10px">
			<button class="btn btn-sm btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Kirim</button>
			<button class="btn btn-sm btn-primary" type="reset"><i class="glyphicon glyphicon-remove-sign"></i> Cancel</button>
			</div>
        </form>

	</div>
	</div>
</div>
</div>
</div>

<?php 
      include "footer.php"  
?>

