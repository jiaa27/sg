<?php 
	include "header.php";
	require_once 'core/init.php';
  @$kode_pemb = $_SESSION['kode_pembeli1'];

  $gtotal_berat = 0;
  $i = 0;
  $grandtotal = 0;
  $gqty = 0;
  $berat_final = 0;
?>

<div class="container table-responsive">
<div class ="">
<h3 class="well text-center"><span class="glyphicon glyphicon-shopping-cart"></span><b> Keranjang Belanja</b></h3>
<form class="col-sm-12" style="margin-top : 10px; margin-bottom:10px;" action="checkout.php"  method="post" role="search">

<div class="row ">
<!-- <a href="cart_hapussemua.php" class="btn btn-danger btn-sm navbar-right" style="margin-bottom:10px;" ><i class="glyphicon glyphicon-trash"></i>&nbsp Hapus Semua</a> -->
  <table id="tabel" class="table table-bordered table-hover shadow table-striped">
	 <thead>
	  <tr>
      <th width="3%" height="30" style="text-align:center;">No.</th>
      <th width="20%" style="text-align:center">Nama Barang</th>
      <th width="10%" style="text-align:center">Merk</th>
      <th width="15%" style="text-align:center">Harga </th>
      <th width="14%" style="text-align:center">Qty </th>

      <th width="7%" style="text-align:center">Berat</th>
      <th width="15%" style="text-align:center">Total Harga </th>
      <th width="16%" style="text-align:center">
        <a href="cart_hapussemua.php"   

        class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"></span>&nbsp Hapus Semua</a>
      </th>
      </tr>
	 </thead>
   <tbody>

<?php
  $hasil = mysqli_query($db,"SELECT* from jualtemp where kode_pembeli = '$kode_pemb' order by kode_brg desc");
  $hasil2 = mysqli_query($db,"SELECT count(*) as jum from jualtemp where kode_pembeli='$kode_pemb'");
  $data = mysqli_fetch_array($hasil2);
    if($data['jum']==0){
    	echo'
      	<tr>
      	    <td colspan="8" height="357" style="text-align:center";><h1>Keranjang Anda Kosong -_-</h1></td>
      	</tr>';
    }else

    while($baris = mysqli_fetch_array($hasil)){
       $namabrg = $baris['nama_brg'];
       $gmb = $baris['gambar'];
       $hasil_kali =  $baris['harga'] * $baris['qty']; 
       $merk = $baris['merk'];
       $hrg  = $baris['harga'];
       $berat = $baris['berat'];
       $qty = $baris['qty'];
       $kode_brg = $baris['kode_brg'];
       $total_berat = $baris['berat']*$baris['qty'];
       
       $gtotal_berat += $total_berat;
       $grandtotal += $hasil_kali;
       $gqty += $qty;
       $tes = "gram";
       $i = $i+1; 

      if ($gtotal_berat  < 1000 ) {
         $berat_final = 1;
       }else{
        $ubah = $gtotal_berat / 1000;
        $berat_final = round($ubah);
       }
       
?>
    </tbody>
    <tr>
      <td height="150" style="text-align:center";><?php echo $i?></td>
      <td><p><?php echo $namabrg ?></p><br><img src=<?php echo $gmb ?> width="120px" height="auto"></td>
      <td><?php echo $merk ?></td>
      <td style="text-align:right";><?php echo money($hrg)?></td>
      <td>
        <div class="center">
	    	<div class="input-group"> 
		        <span class="input-group-btn">
		          <a href="cart_kurang.php?id=<?php echo $kode_brg ?>">
                <button type="button" class="btn btn-warning btn-sm btn-number" name="min" id="min" >
  		          <span class="glyphicon glyphicon-minus"></span>
  		          </button>
              </a>
		        </span>
		        <input type="text" class="form-control input-number" disabled="disabled" value=<?php echo number_format($qty)?> min="1" >
		        <span class="input-group-btn">
		          <a href="cart_tambah.php?id=<?php echo $kode_brg?>">
                <button type="button" class="btn btn-warning btn-sm btn-number" name="plus" id="plus">
  		          <span class="glyphicon glyphicon-plus"></span>
  		          </button>
              </a>
		        </span>
		    </div>   
	      </div>
      </td>  
      <td style="text-align:right";><?php echo $total_berat.'&nbsp'.$tes ?></td>  

<?php

	echo'                
      <td style="text-align:right";>'.money($hasil_kali).'</td>
      <td style="text-align:center";>
        <a href="cart_hapus.php?kd='.$kode_brg.'" type="submit" value="hapus" class="btn btn-danger btn-sm" >
        <i class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Hapus" data-placement="bottom"></i>
        </a>
      </td>
      </tr>
    </tbody>
    ';
    
    }
?>

  <thead>
    <tr style="background-color: white">
      <td colspan="2" ;><a href="index.php" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-chevron-left"></span> &nbspLanjut Belanja</a></td>
      <td colspan="2" style="text-align:right"; name="gqty">Grand Total :</td>
      <td style="text-align:right"; name="gqty"><?php echo $gqty;?>&nbsp buah</td>
      <td style="text-align:right"; name="gberat"><?php echo $berat_final;?>&nbsp Kg</td>
      <td style="text-align:right"; name="gtotal"><?php echo money($grandtotal);?></td>
      <td style="text-align:center";>
        <button type="submit" name="beli" 
        <?php if(isset($_SESSION['email'])) { 
          if($grandtotal==0) {
              echo "disabled='disabled'";} 
              }else {
              echo "disabled='disabled'";} ?>   
            value="beli" class="btn btn-primary btn-sm">Check Out &nbsp<span class="glyphicon glyphicon-chevron-right"></span>
        </button>
      </td>
    </tr>
  </thead>

  </table>
  </div>
  </form>
</div>
</div>

<?php 
  include "footer.php";
 ?> 
