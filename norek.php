	<?php
       include 'header.php';
       $sql = "SELECT * from rekening ";
       $rek = $db->query($sql);
  ?>

	<div class="container" style="margin-top: 70px;margin-bottom: 40px;">
    <div class="panel-body">
      <div class = "panel panel-primary shadow">
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
              
          </div>
            <div class="panel-heading" style="text-align:center">
              <h5>Terima kasih telah melakukan pemesanan</h5>
           </div>
      </div>
 </div>
 </div>

  <?php
      include 'footer.php'
  ?>
