 <style type="text/css">
    body > .container {
      /*height: 69%;*/
      margin-top: 100px;
      padding-bottom: 124px;
    }
  </style>

	<?php
       include 'header.php'
    ?>

	<div class="container well" style="background-color: white;">
  <div class="row">
     <div class="col-md-4 col-sm-3">

      <div class="list-group">
       <a href="bantuan.php" class="list-group-item active"><span class ="glyphicon glyphicon-question-sign"></span>&nbsp Bantuan</a>
      </div>

      <div class="list-group">
             <a href="bantuan_signup.php" class="list-group-item active">Cara Sign up & Sign in</a>
             <a href="bantuan_belanja.php" class="list-group-item">Cara Berbelanja</a>
              <a href="bantuan_bayar.php" class="list-group-item">Cara Pembayaran & Konfirmasi Pembayaran</a> 
            </div>    
     </div>

     <div class="col-md-8 col-sm-9">

      <div class="panel panel-primary shadow">
        <div class="panel-heading" style="padding: 5px 15px ;">
          <h5><i class="glyphicon glyphicon-bullhorn" > </i>&nbsp Cara Sign up & Sign in</h5>
        </div>
        <div class="panel-body">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#1" data-toggle="tab">Cara Sign up</a></li>
              <li><a href="#2" data-toggle="tab">Cara Sign in</a></li>
            </ul>
            <div class="panel panel-default panel-body" style="border-top-left-radius: 0px; border-top-right-radius: 0px; ">
              <div class="tab-content">
                <div class="tab-pane active" id="1">
                  <div class="table-responsive">
                      <h5>1. tekan tombol "sign in" pada pojok atas kanan. </h5>
                      <h5>2. pilih "belum punya akun ? sign up". </h5>
                      <h5>3. Isi form sign up / pendaftaran yang disediakan dengan benar.</h5>
                      <h5>4. Sign in ke email anda untuk melakukan verifikasi.</h5>
                      <h5>5. Akun siap digunakan.</h5>
                  </div>
                </div>

                <div class="tab-pane" id="2">
                  <div class="table-responsive">
                      <h5>1. tekan tombal "sign in" pada pojok atas kanan. </h5>
                      <h5>2. isi email dan password yang sudah didaftar. </h5>
                      <h5>3. jika anda lupa dengan password anda, tekan lupa password.</h5>
                      <h5>4. Sign in ke email anda untuk melakukan verifikasi.</h5>
                  </div>
                </div>
 
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  </div>


  <?php
      include 'footer.php'
  ?>
