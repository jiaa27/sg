<?php 
  include "core/init.php";
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/logo.png">

<title>Toko Sepeda Succesfull Garden</title>

	  <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="core/main.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="core/bootstrapValidator.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
   
    <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/bootstrapValidator.min.js" type="text/javascript"></script>
</head>

<body>
  <div class="header">

	  <nav class="navbar navbar-default" style="border-radius:0px; margin-bottom:0px;">
       <div class="container-fluid">
       <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
            		data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
             </button>
            <a class="navbar-brand" href="index.php">Succesfull Garden</a>
           </div>

           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav nav-pills">
             
               <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
                  <i class="fa fa-bicycle" aria-hidden="true"></i>&nbspSepeda<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="kategori_sepedaanak.php">Sepeda Anak / Kids Bike</a></li>
                    <li><a href="kategori_sepedamtb.php">Sepeda Gunung / Mountain Bike</a></li>
                    <li><a href="kategori_sepedabmx.php">Sepeda Bmx</a></li>
                    <li><a href="kategori_roadbikes.php">Road Bike</a></li> 
                    <li><a href="kategori_citybikes.php">City Bike</a></li>
                  </ul> 
               </li>

                <li><a href="kategori_aksesoris.php"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbspAksesoris </a></li>
                <li><a href="./kategori_sukucadang.php"><span class ="glyphicon glyphicon-wrench"></span>&nbspSuku Cadang</a></li>
                <li><a href="./bantuan.php"><span class ="glyphicon glyphicon-question-sign"></span>&nbspBantuan </a></li>
                <!-- <li><a href="#"><span class ="glyphicon glyphicon-info/-sign"></span>&nbspTentang </a></li>  -->
              </ul>

<!-- search -->
           <form class="navbar-form navbar-left" action="search.php" method="post" role="search">
              <div class="form-group">
                 <input type="text" class="form-control" placeholder="Search" name="txtcari" id="txtcari">
              </div>
                <button type="submit" class="btn btn-default" name="cari"><i class="glyphicon glyphicon-search" aria-hidden="true"></i>&nbsp </button> 
            </form>
<!-- end-search -->
           
            <ul class="nav navbar-nav navbar-right">
<!-- keranjang -->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-shopping-cart"></i> Keranjang<!-- <span class="badge" style="color:white"> --><span class="caret"></span></a>

              <ul class="dropdown-menu">
                <?php
                    @$kode_pemb =  $_SESSION['kode_pembeli1']; 
                    $tampil = mysqli_query($db, "SELECT * FROM jualtemp WHERE kode_pembeli = '$kode_pemb'");   
                    $no = mysqli_num_rows( $tampil);
                ?>

              <form action="cart_add.php" method="post" class="container" style="width:350px;padding:10px" >
                <?php
                  if($no == 0){
                      echo"<li class='header'>Keranjang Anda Kosong</li>";
                  } else{
                    echo"<li class='header'>Keranjang Anda :</li>";
                  }
                ?>

                <li>
                  <?php 
                    $tampil = mysqli_query($db,"select * from jualtemp where kode_pembeli = '$kode_pemb'");
                    while($baris = mysqli_fetch_array($tampil)){
                    echo"
                        <li class=\" scroll\" > 
                          <table width=\"100%\" border=\"0\" class=\"table table-hover shadow\">
                              <tr>
                                <td width=\"20%\"><img src='".$baris['gambar']."' width=\"100%\"/></td>
                                <td width=\"30%\" style=\"padding:10px\">".$baris['nama_brg'].' <br> @Rp.'.number_format($baris['harga'],2,",",".")." </td>
                                <td width=\"20%\">x ".$baris['qty']." buah</td>
                              </tr>
                          </table>
                        </li>";
                    }
                  ?>
                </li>

                <li class="footer" style="text-align:center";>
                  <a  href="cart_add.php">Tampilkan</a>
                </li>
              </form>
              </ul>
              </li>
<!-- end keranjang -->

<!-- notif -->
      <?php
        $konfirmasi = mysqli_query($db,"SELECT * FROM jualhd WHERE kode_pembeli = '$kode_pemb' AND status = '1'");
        $no2 = mysqli_num_rows($konfirmasi);
        $row = mysqli_fetch_array($konfirmasi);
        $kode_pembeli = $row['kode_pembeli'];
        $kode_transaksi = $row['kode_jual'];
        $tgl = $row['tgl_jual'];
        $gtotal = $row['grand_total'];
      ?>

      <li class="dropdown messages-menu">
        <a href="#" class = "dropdown-toggle" data-toggle="dropdown">
          <i class ="glyphicon glyphicon-bell"></i>
          <span class="badge"><?= $no2 ?></span>
        </a>

      <ul class="dropdown-menu">
        <form action="#" method="post" class="container" style="width:310px;padding: 10px;">
          <li class="header"><?=$no2?> pesan</li>
          <li>
              <ul class="menu" style="padding-left:0">
                <?php 
                    $konfirmasi = mysqli_query($db,"SELECT * FROM jualhd WHERE kode_pembeli = '$kode_pemb' AND status = '1' ORDER BY kode_jual DESC LIMIT 5");
                    while($row = mysqli_fetch_array($konfirmasi)){
                 echo'
                  <ul> 
                      <a href="dp_konfirmasibayar.php?id='.$row['kode_jual'].'">
                          <h4>Silakan Lakukan Konfirmasi Pembayaran '.$row['kode_jual'].'<br></h4>
                      </a>
                        <small><i class="glyphicon glyphicon-time">&nbsp;</i>'.$row['tgl_jual'].'</small>
                  </ul>
                  <hr>
                  ';
                  }
                  ?>
              </ul>
          </li>
        <!-- <li class="footer"><a href="#"></a></li> -->
        </form>
      </ul>

      </li>  
<!-- endnotif -->

<!-- akun -->
<?php
    if(isset($_SESSION['email'])){
      $email=$_SESSION['email'];
      $sql = "SELECT * FROM pembeli WHERE email = '{$email}'";
      $perintah = $db->query($sql);
      $baris = mysqli_fetch_assoc($perintah);
      $nama2 = $baris['nama_pembeli'];
    echo
      "<li class='dropdown'> <a class='dropdown-toggle' data-toggle='dropdown' href='#'><i class='fa fa-user'></i> $nama2<span class='caret'></span></a>
          <ul class='dropdown-menu'>
            <li><a href='akun_akunsaya.php'><span class=\"glyphicon glyphicon-heart\"></span> Akun Saya</a></li>
            <li><a href='akun_belanjaansaya.php'><span class=\"glyphicon glyphicon-briefcase\"></span> Belanjaan Saya </a></li>
            <li role='separator' class = 'divider'></li>
            <li><a href='script/keluar.php'  onclick=\"return confirm('Apakah anda yakin ingin keluar?')\">Sign Out <span class=\"glyphicon glyphicon-log-out\"></span></a></li>
          </ul>
       </li>";

    }else{
    echo
      '<li>
          <a href="signin.php"><span class="glyphicon glyphicon-user"></span>&nbspSign In</a>
       </li>';
    }
?>
<!-- end akun -->

            </ul>
          </div>
        </div>
      </nav>
    	
 </div>