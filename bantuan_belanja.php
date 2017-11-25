 <style type="text/css">
    body > .container {
      /*height: 80%;*/
      margin-top: 120px;
      padding-bottom: 120px;
    }
  </style>

	<?php
       include 'header.php'
    ?>

	<div class="container well" style="background-color: white;">
  <div class="row">
     <div class="col-md-4">

      <div class="list-group">
       <a href="bantuan.php" class="list-group-item active"><span class ="glyphicon glyphicon-question-sign"></span>&nbsp Bantuan</a>
      </div>

      <div class="list-group">
             <a href="bantuan_signup.php" class="list-group-item">Cara Sign up & Sign in</a>
             <a href="bantuan_belanja.php" class="list-group-item active">Cara Berbelanja</a>
              <a href="bantuan_bayar.php" class="list-group-item">Cara Pembayaran & Konfirmasi Pembayaran</a> 
            </div>    
     </div>

     <div class="col-md-8">

      <div class="panel panel-primary shadow">
        <div class="panel-heading"  style="padding: 5px 15px ;">
          <h5><i class="glyphicon glyphicon-bullhorn" > </i>&nbsp Cara Berbelanja</h5>
        </div>

        <div class="panel-body" style="border-top-left-radius: 0px; border-top-right-radius: 0px; ">
            <h5>1. Agar bisa melakukan pembelian, harus sign in terlebih dulu.</h5>
            <h5>2. Pilih barang yang diinginkan (masukkan ke keranjang berlanja).</h5>
            <h5>3. Tentukan jumlah barang yang ingin dibeli.</h5>
            <h5>4. Barang yang telah dipilih bisa dilihat di keranjang belanja</h5>
            <h5>5. Checkout barang yang diinginkan jika sudah selesai memilih.</h5>
            <h5>6. Anda bisa mengisikan alamat, jika alamat penerima berbeda dengan alamat kita.</h5>
            <h5>7. Jika sudah selesai, anda bisa melakukan pembayaran dengan cara transfer.</h5>
            <h5>8. Setelah selesai transfer, lakukan konfirmasi pembayaran.</h5>
        </div>

      </div>
    </div>
  </div>
  </div>

  <?php
      include 'footer.php'
  ?>
