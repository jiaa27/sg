<style type="text/css">
    body > .container-fluid {
      /*height: 100%;*/
      margin-top: 50px;
      /*margin-bottom: -35px;*/
    }
</style>

<?php 
    include "header.php";
?>

<?php
 @$kode_pemb = $_SESSION['kode_pembeli1'];
    $sql= mysqli_query($db, "SELECT * from pembeli where kode_pembeli= '$kode_pemb'");
    while ($baris=mysqli_fetch_array($sql)) {
        $kode_pemb = $baris['kode_pembeli'];
        $nama = $baris['nama_pembeli'];
        $prov = $baris['provinsi'];
        $kota = $baris['kota'];
        $alamat =$baris['alamat'];
        $kpos =$baris['kodepos'];
        $notlp = $baris['telepon'];
    }
?>

<div class="container-fluid">
<div class="col-lg-8 col-lg-offset-2">

		<form class="form-horizontal" action="script/kd_checkout.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="glyphicon glyphicon-edit" style="word-spacing:-8;">&nbsp;Check Out</i>
            </div>
            <br>
            <div class="panel-body">
              <div class="form-group">
                <label class="control-label col-lg-3" for="uname">Nama Penerima</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control" id="nama" readonly="readonly" name="nama" value="<?= $nama  ?>" placeholder="Nama Penerima" required>
                  </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-3" for="telp">No. Telp:</label>
                  <div class="col-lg-8">
                    <input type="tel" class="form-control" id="notlp" name="notlp" readonly="readonly" placeholder="Nomor Telepon / Handphone" value ="<?= $notlp ?>" required>
                  </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-3" for="uname">Provinsi</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control" id="prop2" name="prop2" readonly="readonly" value="<?= $prov?>" placeholder="Provinsi" required>
                  </div>
              </div>                   
              <div class="form-group">
                <label class="control-label col-lg-3" for="inputEmail">Kota</label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control" id="kota" name="kota" readonly="readonly" value="<?= $kota?>" placeholder="Email" required>
                  </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-3" for="Alamat">Alamat:</label>
                  <div class="col-lg-8">
                    <textarea rows="3" class="form-control" id="Alamat" name="alamat" readonly="readonly"  placeholder="Masukan Alamat Lengkap"><?=$alamat?></textarea>
                  </div>
              </div>                  
              <div class="form-group">
                <label class="control-label col-lg-3" for="kpos">Kode Pos</label>
                  <div class="col-lg-8">
                      <input type="text" class="form-control" id="kpos" name="kpos" value="<?= $kpos ?>" readonly="readonly" placeholder="Kode Pos" required>  
                  </div>
              </div>
              
              <!-- <div class="form-group">
                <label class="control-label col-lg-3" for="Alamat">Catatan:</label>
                  <div class="col-lg-8">
                    <textarea rows="3" class="form-control" id="catatan" name="catatan" placeholder="Catatan"> </textarea>
                  </div>
              </div> -->

          <?php
            $sql=mysqli_query($db, "SELECT * from pembeli where kode_pembeli = '$kode_pemb'" );
            while ($row=mysqli_fetch_array($sql)) {
              $db_kot = $row['kode_kot'];
            }

            require "ongkir/koneksi.php";
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "origin=195&destination=$db_kot&weight=1&courier=jne",
              CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: $APIKeyRaja"
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
            $hasil = json_decode($response, true);
          ?>


            <div class="form-group">
              <label class="control-label col-lg-3">JNE Indonesia</label>
                <div class="col-lg-8">
                  <div class="input-group col-xs-8">
                    <select class="form-control" name="service" id="service" onchange="showResultBiaya(this.value)">
                      <option value="">Pilih Layanan</option>
                        <?php  
                          for($i=0; $i<count($hasil['rajaongkir']['results'][0]['costs']); $i++){
                          
                            for($ix=0; $ix<count($hasil['rajaongkir']['results'][0]['costs'][$i]['cost']); $ix++){
                              $serv =  $hasil['rajaongkir']['results'][0]['costs'][$i]['service']." (".$hasil['rajaongkir']['results'][0]['costs'][$i]['description'].") ";
                              $serv2 = ($hasil['rajaongkir']['results'][0]['costs'][$i]['cost'][$ix]['value']*1); 
                              $serv3 = $hasil['rajaongkir']['results'][0]['costs'][$i]['cost'][$ix]['etd'];
                              echo "<option value=".$i.">$serv </option>";
                            }
                            }
                          }
                        ?>
                    </select>
                  </div>
                </div>
            </div>

            <div class="form-group">
              <div class="col-xs-offset-3 col-xs-5 col-xs-8">
                <div id="service1">

                </div>
              </div>
            </div>

            <div class="form-group">
              <!-- <div class="col-xs-offset-8 col-md-10"> -->
              <div class="col-lg-10 col-lg-offset-2" align="right">
                <a href="akun_ubahprofil.php?id=<?php echo $kode_pemb ?>" class="btn btn-sm btn-danger" align="right" value="edit"><span class="glyphicon glyphicon-pencil"></span> Ubah Alamat</a>
                <button type="submit" class="btn btn-sm btn-primary" align="right" value="Kirim">Checkout <span class="glyphicon glyphicon-chevron-right"></span></button>               
              </div>

            </div>

          </div>
    </form>

    </div>
    
</div>
</div>

<?php 
  include "footer.php";
?>

