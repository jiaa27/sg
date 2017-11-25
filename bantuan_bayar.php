 <style type="text/css">
    body > .container {
      /*height: 100%;*/
      margin-top: 100px;
      padding-bottom: 150px;
    }
  </style>

	<?php
       include 'header.php'
    ?>

	<div class="container" style="background-color: white;">
  <div class="row">
     <div class="col-md-4">

      <div class="list-group">
       <a href="bantuan.php" class="list-group-item active"><span class ="glyphicon glyphicon-question-sign"></span>&nbsp Bantuan</a>
      </div>

      <div class="list-group">
             <a href="bantuan_signup.php" class="list-group-item">Cara Sign up & Sign in</a>
             <a href="bantuan_belanja.php" class="list-group-item">Cara Berbelanja</a>
              <a href="bantuan_bayar.php" class="list-group-item active">Cara Pembayaran & Konfirmasi Pembayaran</a> 
            </div>    
     </div>

     <div class="col-md-8">

      <div class="panel panel-primary shadow">
        <div class="panel-heading" style="padding: 5px 15px ;">
          <h5><i class="glyphicon glyphicon-bullhorn" > </i>&nbsp Cara Pembayaran & Konfirmasi Pembayaran</h5>
        </div>
        <div class="panel-body">
            <ul class="nav nav-tabs">
              <li><a href="#1" data-toggle="tab">Cara Pembayaran</a></li>
              <li class="active"><a href="#2" data-toggle="tab">Cara Konfirmasi Pembayaran</a></li>
            </ul>
            <div class="panel panel-default panel-body" style="border-top-left-radius: 0px; border-top-right-radius: 0px; ">
              <div class="tab-content">

                <div class="tab-pane" id="1">
                  <div class="table-responsive">
                      <h5>Lakukan Transfer antar bank dengan nomor rekening yang tersedia <a href="norek.php"> ini.</a></h5>
                  </div>
                </div>

                <div class="tab-pane active" id="2">
                  <div class="table-responsive">
                      <h5>1. Pilih icon bell atau lonceng yang terdapat pada beranda. </h5>
                      <h5>2. pilih nomor transaksi yang akan dilakukan konfirmasi pembayaran. </h5>
                      <h5>3. selanjutnya anda akan dialihkan ke halaman konfirmasi pembayaran.</h5>
                      <h5>4. isi form konfirmasi pembayaran dengan benar agar memudahkan dalam proses verifikasi pembayaran.</h5>
                      <h5>5. selesai mengisi, tekan tombol konfirmasi pembayaran.</h5>
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
