	<?php
       include 'header.php';
       if(!ISSET($_SESSION['email'])){
  ?>    
      <script language ="javascript">
          location.href ="signin.php";
      </script>
  <?php 
      }
      $kode = $_GET['id'];
  ?>

	<div class="container" style="margin-top: 70px; padding-bottom: 50px;">
  <div class="row">
     <div class="col-md-3">
      <div class="list-group">
       <a class="list-group-item active disabled"><span class ="glyphicon glyphicon-th-list"></span>&nbsp Detail Pesanan</a>
      </div>

      <div class="list-group">
          <a href="dp_totalbayar.php?id=<?php echo $kode;?>" class="list-group-item active"><i class="glyphicon glyphicon-bullhorn" ></i> Total Pembayaran</a>
          <a href="dp_konfirmasibayar.php?id=<?php echo $kode;?>" class="list-group-item"><i class="glyphicon glyphicon-asterisk"></i> Konfirmasi Pembayaran</a>
          <a href="dp_norek.php?id=<?php echo $kode;?>" class="list-group-item"><i class="glyphicon glyphicon-book"></i> Nomor Rekening Bank</a> 
      </div>    
     </div>
     <div class="col-md-9">

      <div class="panel panel-primary shadow">
        <div class="panel-heading"  style="padding: 5px 15px ;">
          <h5><i class="glyphicon glyphicon-bullhorn"> </i>&nbsp Total Pembayaran</h5>
        </div>

         <div class="panel-body" style="border-top-left-radius: 0px; border-top-right-radius: 0px; ">
            <?php 
              $sql= mysqli_query($db,"SELECT * from jualhd where kode_jual = '$kode' and status='1'");
              $baris = mysqli_fetch_array($sql);
              $kd_trans  = $baris['kode_jual'];
              $tgl = $baris['tgl_jual'];
            ?>
            
            <h5> Nomor Transaksi : <?php echo $kd_trans ?><br><br>
                Tanggal Pemesanan :  <?php echo date('d M Y H:i', strtotime($tgl))?><br><br>
                Detail Pesanan anda berupa berikut :
            </h5><hr>

            <div class ="table-responsive">
              <form class="col-sm-12" style="margin-bottom:10px;" action="#"  method="post" role="search">
              <div class="row">
              <table id="tabel" class="table table-bordered table-striped table-hover shadow">
                <thead>
                  <tr style="background-color:; color:;">
                    <th width="2%" height="30" style="text-align:center;">No.</th>
                    <th width="30%" style="text-align:left">Nama Barang</th>
                    <!-- <th width="5%" style="text-align:center">Merk</th> -->
                    <th width="3%" style="text-align:right">qty </th>
                    <th width="10%" style="text-align:right">Berat </th>
                    <th width="15%" style="text-align:right">Harga </th>
                    
                    <th width="15%" style="text-align:right">Total Berat </th>
                    <th width="20%" style="text-align:right">Total Harga</th>
                  </tr>
                </thead>

                    <?php
                      $body="";
                      $footer = "";
                      $no ="0";
                      $gtotal_berat = "0";
                      $total_berat ="0";
                      $total_qty ="0"; 
                      $kode=$_GET['id'];

                      $sql1 = mysqli_query($db,"SELECT jualdt.kode_brg as kode, jualdt.qty as  qty, jualdt.berat as berat, jualdt.harga as harga, barang.nama_brg as nama_brg from jualdt INNER JOIN barang on jualdt.kode_brg  = barang.kode_brg where kode_jual = '$kode'");

                  while ( $baris1 = mysqli_fetch_array($sql1)){
                   //   while{
                      @$no++;
      
                      $kode_brg =$baris1['kode'];
                      $qty = $baris1['qty'];
                      $harga = $baris1['harga'];
                      $berat1 = $baris1['berat'];
                      
                      $nama_brg = $baris1['nama_brg'];

                      $berat = $berat1 * $qty;
                      $total_berat += $berat;
                      $total_qty += $baris1['qty'];
                      $total = $harga * $qty;
                      
                      $body .= '
                      <tr>
                          <td  height="30" style="text-align:center;color:black;">'.$no.'</td>
                          <td  style="text-align:left">'.$nama_brg.'</td>
                          
                          <td  style="text-align:right">'.$qty.'</td>
                          <td  style="text-align:right">'.$berat1.'</td>
                          <td  style="text-align:right">'.money($harga).'</td>
                          <td style="text-align:right">'.$berat.' gram</td>
                          <td  style="text-align:right">'.money($total).'</td>
                     </tr>';
                    }
                      $kode=$_GET['id'];
                      $sql2 = mysqli_query($db,"SELECT * from jualhd where kode_jual = '$kode'");
                      $baris2 = mysqli_fetch_array($sql2);
                      $g_total = $baris2['grand_total'];

                      $sql3 = mysqli_query($db,"SELECT * from kirim where kode_jual = '$kode'");
                      $baris3 = mysqli_fetch_array($sql3);
                      $nama_kurir = $baris3['layanan_kirim'];
                      $ongkir = $baris3['biaya'];
                      $ongkir2 = $baris3['biaya'];
                      //$tes = "Gram";

                      if ($total_berat  < 1000) {
                          $berat_final = 1;
                        }else{
                          $ubah = $total_berat / 1000;
                          $berat_final = round($ubah);
                        }
                                           
                      // $ubah = $total_berat / 1000;
                      // $berat_final = round($ubah);

                      $ongkir = $ongkir * $berat_final;

                      $total_bayar = $g_total + $ongkir;
                      
                      $footer.='
                            <tr>
                              <th colspan="2" style="text-align:right"> Grand Total</th>
                              <th style="text-align:right">'.$total_qty.'</th>
                              
                              
                              <th colspan="4" style="text-align:right">'.money($g_total).'</th>
                            </tr>
                            <tr>
                              <th colspan="4" style="text-align:right">'.$nama_kurir.'</th>
                              <th colspan="" style="text-align:right">'.money($ongkir2).'</th>
                              <th colspan="" style="text-align:right">'.$berat_final.' Kg</th>
                              <th style="text-align:right">'.money($ongkir).'</th>
                            </tr>
                            <tr>
                              <th colspan="6" style="text-align:right">Total yang harus dibayar</th>
                              <th style="text-align:right">'.money($total_bayar).'</th>
                            </tr>';

                ?>
                <tbody>
                  <?= $body ?>
                </tbody>

                <thead>
                  <?= $footer ?>
                </thead>
              </table>
              </div>
              </form>
            </div>

            <h5>
              <th>Penerima :</th>
            </h5>
            <?php
                $db_email= $_SESSION['email'];
                $sql4 = mysqli_query($db,"SELECT * from pembeli where email = '$db_email'");
                $baris4 = mysqli_fetch_array($sql4);
                $nama = $baris4['nama_pembeli'];
                $alamat = $baris4['alamat'];
                $prop = $baris4['provinsi'];
                $kot = $baris4['kota'];
                $kdpos = $baris4['kodepos'];
                $notlp = $baris4['telepon'];

                ?>
                <?php echo $nama?><br>
                <?php echo $alamat ?><br>
                <?php echo $prop ?>,
                <?php echo $kot ?>,
                <?php echo $kdpos?><br>
                Telp.<?php echo $notlp?>
         </div>
          <hr>
          <strong><h5 align="center">Lakukan Pembayaran Sebelum :</h5></strong>
          <?php
            $kode=$_GET['id'];
            $sql5= mysqli_query($db,"SELECT * from jualhd where kode_jual = '$kode' and status='1'");
            $baris5 = mysqli_fetch_array($sql5);
            $g_total = $baris5['grand_total'];
            $tanggal = $baris5['tgl_jual'];
            $tglbaru = strtotime('+3 day',strtotime($tanggal));
            $tglbaru2 = date('d M Y', $tglbaru);
            $tglbaru3 = date('H:i', $tglbaru);
            $hari = date('D', strtotime($tglbaru2));
            $dayList = array(
                'Sun' => 'Minggu',
                'Mon' => 'Senin',
                'Tue' => 'Selasa',
                'Wed' => 'Rabu',
                'Thu' => 'Kamis',
                'Fri' => 'Jumat',
                'Sat' => 'Sabtu');
            $g_total = $baris5['grand_total'];
          ?>
          <h3 align="center">Hari&nbsp<?php echo $dayList[$hari]?>,&nbsp<?php echo $tglbaru2?> &nbsp Pukul&nbsp<?php echo $tglbaru3?>&nbsp WIB</h3>

          <!-- <h3 align="center">Hari dd MM YYYY   Pukul HH mm WIB</h3> -->
      <div style="text-align: center;">
            <!-- <form action="laporan/tes-notatotalbayar.php" target="_blank" method="post"> -->
            <form action="laporan/nota_totalbayar.php" target="_blank" method="post">
              <input type="hidden" name="nota" value="<?php echo $kode ?>"></input>
              <button type="submit" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-download-alt"></i> Download PDF</button>
            </form><br>
          </div>
      </div>
        

     </div>
     </div>
</div>

  <?php
      include 'footer.php'
  ?>
