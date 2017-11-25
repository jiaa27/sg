<style type="text/css">
    body > .container {
      /*height: 100%;*/
      /*margin-top: 100px;*/
      /*margin-bottom: 30px;*/
    }
  </style>

<?php
    include 'header.php';
    $kode = $_GET['id'];
    $sql = "SELECT * from rekening ";
    $rek = $db->query($sql);
?>

<div class="container" style="margin-top: 88px; padding-bottom: 70px;">
  <div class="row">
     <div class="col-md-3">
      <div class="list-group">
       <a class="list-group-item active disabled"><span class="glyphicon glyphicon-th-list"></span>&nbsp Detail Pesanan</a>
      </div>

      <div class="list-group">
             <a href="dp_totalbayar.php?id=<?php echo $kode;?>" class="list-group-item"><i class="glyphicon glyphicon-bullhorn" ></i> Total Pembayaran</a>
             <a href="dp_konfirmasibayar.php?id=<?php echo $kode;?>" class="list-group-item"><i class="glyphicon glyphicon-asterisk"></i> Konfirmasi Pembayaran</a>
             <a href="dp_norek.php?id=<?php echo $kode;?>" class="list-group-item active "><i class="glyphicon glyphicon-book"></i> Nomor Rekening Bank</a> 
            </div>    
     </div>
     <div class="col-md-9">

      <div class="panel panel-primary shadow">
         <div class ="panel-heading" style="padding: 5px 10px;" align="center">
              <h5>Pembayaran Succesfull Garden</h5>
          </div>

          <div class="panel-body" style="text-align:center">
              <h5>Pembayaran bisa melalui salah satu nomor rekening Succesfull Garden :</h5>
              <br>
              <?php while($r = mysqli_fetch_assoc($rek)) : ?>
              <div class="col-lg-3">
                  <img src="<?= $r['logo_bank']?>">
                    <br><br>
                    <strong><?= $r['nama_bank']; ?></strong>
                    <br>
                    Nomor Rekening:
                    <br>
                    <strong><?= $r['norek_bank']; ?></strong>
                    <br>
                    a.n <?= $r['nama_pemilik']; ?>
                    <hr>
              </div>
              <?php endwhile; ?> 
              <!-- <div class="col-lg-3">
                  <img src="images/mandiri.png">
                    <br><br>
                    <strong>Bank Mandiri</strong>
                    <br>
                    Nomor Rekening:
                    <br>
                    <strong>888999888</strong>
                    <br>
                    a.n Nicolas
                    <hr>
              </div>
              <div class="col-lg-3">
                        <img src="images/bca.png">
                        <br>
                        <br>
                        <strong>BCA</strong>
                        <br>
                        Nomor Rekening:
                        <br>
                        <strong>888999888</strong>
                        <br>
                        a.n Nicolas
                        <hr>
              </div> 
              <div class="col-lg-3">
                        <img src="images/bni.png">
                        <br>
                        <br>
                        <strong>BNI</strong>
                        <br>
                        Nomor Rekening:
                        <br>
                        <strong>888999888</strong>
                        <br>
                        a.n Nicolas
                        <hr>
              </div>
              <div class="col-lg-3">
                        <img src="images/bri.png">
                        <br>
                        <br>
                        <strong>BRI</strong>
                        <br>
                        Nomor Rekening:
                        <br>
                        <strong>888999888</strong>
                        <br>
                        a.n Nicolas
                        <hr>
              </div> -->
              <h4>Jumlah transfer yang berbeda bisa menghambat proses verifikasi</h4>
              
          </div>
            <div class="panel-heading" style="text-align:center">
              <h5>Terima kasih telah melakukan pemesanan</h5>
           </div>
      </div>

     </div>

     </div>
  </div>
</div>

  <?php
      include 'footer.php'
  ?>
