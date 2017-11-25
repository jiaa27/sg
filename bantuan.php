 <style type="text/css">
    body > .container {
      /*height: 50%;*/
      /*margin-top: 100px;*/
      /*margin-bottom: 30px;*/
    }
  </style>

	<?php
       include 'header.php'
    ?>

	<div class="container" style="margin-top: 120px; padding-bottom: 272px;">
  <div class="row">
     <div class="col-md-4">
      <div class="list-group">
       <a class="list-group-item active disabled"><span class ="glyphicon glyphicon-question-sign"></span>&nbsp Bantuan</a>
      </div>

      <div class="list-group">
<!--         <a href="bantuan_signup.php" class="list-group-item">Cara Daftar / Sign up</a>
             <a href="#" class="list-group-item">Cara Masuk / Sign in</a>
             <a href="#" class="list-group-item">Cara Berbelanja</a>
             <a href="#" class="list-group-item">Cara Membayar</a> 
             <a href="#" class="list-group-item">Cara Retur</a> -->

             <a href="bantuan_signup.php" class="list-group-item">Cara Sign up & Sign in</a>
             <a href="bantuan_belanja.php" class="list-group-item">Cara Berbelanja</a>
             <a href="bantuan_bayar.php" class="list-group-item">Cara Pembayaran & Konfirmasi Pembayaran</a> 

             <!-- <a href="#" class="list-group-item">Button 1</a>
             <a href="#" class="list-group-item">Button 2</a>
             <a href="#" class="list-group-item">Button 3</a>  -->
            </div>    
     </div>
     <div class="col-md-8">
        <!-- <center><span class="label label-primary label-large">Pilih bantuan yang dibutuhkan</span></center> -->
        <p><center>Pilih bantuan yang dibutuhkan</center></p>
     </div>
  </div>
</div>

  <?php
      include 'footer.php'
  ?>
