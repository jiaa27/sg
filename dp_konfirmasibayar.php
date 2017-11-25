<style type="text/css">
    body > .container {
      /*height: 100%;*/
      /*margin-top: 100px;*/
      /*margin-bottom: 30px;*/}
</style>
<?php
     include 'header.php';
     if(!isset($_SESSION['email'])){
?>
    <script language="javascript">
     alert("Anda Harus Login terlebih dahulu")
       location.href="signin.php";
    </script>

<?php
     }
      $kode = $_GET['id'];
      $total_berat= 0;
      $rekquery = $db->query("SELECT * FROM rekening order by kode_rek");
      $rek ="";
       $sql3 = mysqli_query($db,"SELECT * from jualdt where kode_jual = '$kode'");
          while ($row1 = mysqli_fetch_array($sql3)){
          $qty = $row1['qty'];
          $berat = $row1['berat'];
          $berat1 = $berat * $qty;
          $total_berat += $berat1;
          }

       $sql4 = mysqli_query($db,"SELECT * from jualhd where kode_jual = '$kode'");
          $row2 = mysqli_fetch_array($sql4);
          $g_total = $row2['grand_total'];

       $sql5 = mysqli_query($db,"SELECT * from kirim where kode_jual = '$kode'");
          $row3 = mysqli_fetch_array($sql5);
          $ongkir = $row3['biaya'];
              
          if ($total_berat  < '1000') {
            $berat_final = 1;
          }else{
            $ubah = $total_berat / 1000;
            $berat_final = round($ubah);
          }
          
          // $ubah = $total_berat / 1000;
          // $berat_final = round($ubah);
          $ongkir = $ongkir * $berat_final;
                   
          $total_bayar = $g_total + $ongkir;
?>


<div class="container" style="margin-top: 70px; padding-bottom: 50px;">
  <div class="row">

    <div class="col-md-3">
        <div class="list-group">
            <a class="list-group-item active disabled"><span class ="glyphicon glyphicon-th-list"></span>&nbsp Detail Pesanan</a>
        </div>
        <div class="list-group">
            <a href="dp_totalbayar.php?id=<?php echo $kode;?>" class="list-group-item"><i class="glyphicon glyphicon-bullhorn" ></i> Total Pembayaran</a>
            <a href="dp_konfirmasibayar.php?id=<?php echo $kode;?>" class="list-group-item active"><i class="glyphicon glyphicon-asterisk"></i> Konfirmasi Pembayaran</a>
            <a href="dp_norek.php?id=<?php echo $kode;?>" class="list-group-item"><i class="glyphicon glyphicon-book"></i> Nomor Rekening Bank</a> 
        </div>    
    </div>

    <div class="col-md-9">
    <!-- <div class="panel panel-primary"> -->
        <form action="script/kd_konfirmasibayar.php" id="form1" method="post" name="form1" enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
            <div class="panel panel-primary shadow">
                <div class="panel-heading"  style="padding: 5px 15px;"><h5><i class="glyphicon glyphicon-asterisk"></i> Konfirmasi Pembayaran</h5></div>
                    <div class="panel-body" style="border-top-left-radius: 0px; border-top-right-radius: 0px; ">
                      <div class="form-group">
                        <label for="nama" class="control-label col-lg-4">No. Transaksi :</label>
                        <div class="col-lg-8">
                            <label type="text" id="invoice"  class="control-label" value="" ><?php echo $kode;?></label>
                            <input type="hidden" id="kd_jual" class="form-control" name="kd_jual" required="" autofocus=""  value="<?php echo $kode;?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="nama" class="control-label col-lg-4">Jumlah Pembayaran :</label>
                        <div class="col-lg-8">
                            <label type="text" id="totalb"  class="control-label"><?= money($total_bayar)?></label>
                            <input type="hidden" id="totalb" class="form-control" name="totalb" required="" autofocus=""  value="<?= $total_bayar;?>">
                        </div> 
                      </div>

                      <div class="form-group">
                         <label class="col-lg-4 control-label">Bank Tujuan :</label>
                            <div class="col-lg-8">
                              <select name="bank" id="bank" class="form-control">
                                <!-- <option value="" disabled="disabled" selected="selected" >Pilih Bank Tujuan</option>
                                    <option value="BRI">Bank BRI</option>
                                    <option value="BCA">Bank BCA</option>
                                    <option value="BNI">Bank BNI</option>
                                    <option value="Mandiri">Bank Mandiri</option> -->
                                    <option value=""<?=(($rek == '')?' selected':'');?>></option>
                                    <?php while($b = mysqli_fetch_assoc($rekquery)):?>
                                    <option value="<?=$b['kode_rek'];?>"<?=(($rek == $b['kode_rek'])?' selected':'');?>><?=$b['nama_bank'];?> - <?=$b['norek_bank'];?> - a/n <?=$b['nama_pemilik'];?> </option>
                                    <?php endwhile; ?>
                              </select>
                            </div>
                      </div>

                      <div class="form-group">
                         <label class="col-lg-4 control-label">Bank Saya :</label>
                            <div class="col-lg-8">
                              <input class="form-control" id="banksaya" name="banksaya" type="text" placeholder="Dari Bank" autocomplete="off" />
                            </div>
                      </div>

                      <div class="form-group">
                          <label class="col-lg-4 control-label">Nama Pemilik :</label>
                            <div class="col-lg-8">
                                <input class="form-control" id="nama" name="nama" type="text" placeholder="Nama yang tertera pada buku tabungan"  autocomplete="off"/>
                            </div>
                      </div>

                      <div class="form-group">
                          <label class="col-lg-4 control-label">No. Rekening :</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="norek" id="norek" type="text" placeholder="Nomor Rekening Anda" size="16" maxlength="16" autocomplete="off"/>
                            </div>
                      </div>

                      <div class="form-group">
                          <label class="col-lg-4 control-label">Jumlah Transfer :</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="jumlah" id="jumlah" type="text" placeholder="Jumlah uang yang anda transfer" size="9" maxlength="9" autocomplete="off"/>
                                   <p class="help-block">Inputlah jumlah uang sesuai dengan jumlah uang yang ditransfer.<br>
                                         Masukkan jumlah pembayaran tanpa tanda titik atau koma.<br>
                                         Contoh: 999999</p>
                            </div>
                      </div>

                      <div class="form-group">
                          <label class="col-lg-4 control-label">Upload Bukti Pembayaran :</label>
                            <div class="col-lg-8">
                                <input type="file" id="txtfoto" name="txtfoto" >
                                   <p class="help-block">Verifikasi pembayaran dilakukan max 1x24jam. Kami sarankan untuk mengupload bukti pembayaran. Foto yang diupload tidak boleh melebihi 10 mb</p>
                            </div>
                      </div>

                      <div class="form-group">
                          <label class="col-lg-4 control-label">Keterangan :</label>
                            <div class="col-lg-8">
                               <textarea rows="3" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan"></textarea>
                            </div>
                      </div>

                      <div class="form-group">
                          <div class="col-xs-offset-4 col-lg-9">
                            <label class="checkbox-inline">
                            <input type="checkbox" name="setuju" value="Setuju" required>Barang yang sudah dipesan dan dikonfirmasi pembayaran tidak dapat dibatalkan
                            </label>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-lg-12" align="right">
                            <button type="submit" class="btn btn-sm btn-primary" value="Kirim" style="margin-top:-10px;margin-bottom:-10px;"><i class="glyphicon glyphicon-ok-sign"></i> Konfirmasi pembayaran</button>
                            <input class="btn btn-sm btn-default" type="reset" value"reset">
                          </div>
                      </div>

                    </div>
              </div>
        
        </form> 
       
    </div>
  </div>
</div>

<?php
      include 'footer.php'
?>
