<?php
	// include'core/init.php';

	$pesan = ""; 
	$total_berat=0;
	$sql4 = mysqli_query($db,"SELECT * FROM jualdt INNER JOIN barang ON jualdt.kode_brg = barang.kode_brg WHERE kode_jual = '$kode_jual'");
		while($hasil4 = mysqli_fetch_assoc($sql4)){
		$foto = $hasil4['foto'];
		$nama_brg = $hasil4['nama_brg'];
		$qty = $hasil4['qty'];
		$harga = $hasil4['harga'];
		$total = $harga * $qty;
		$berat = $hasil4['berat'] * $hasil4['qty'];
		$total_berat = $total_berat + $berat ;

		$pesan .= "<div class=\"row\">
						<div class=\"col-lg-12 panel\" style=\"margin-top:0;\">
							<div class=\"col-lg-2\">
								<img src='$foto' alt=\" foto $nama_brg \" width=\"50px\" height=\"50px\" class=\"thumbnail\">
							</div>

							<div class=\"col-lg-4\">$nama_brg</div>

							<div class=\"col-lg-6\">
								&nbsp $qty x Rp.".number_format($harga,0,",",".")." = Rp.".number_format($total,0,",",".")." 
							</div>
							<hr>
						</div>
	        		</div>
					";
					}

	$sql5 = mysqli_query($db,"SELECT * FROM jualhd WHERE kode_jual = '$kode_jual'");
		$row2 = mysqli_fetch_array($sql5);
			$g_total = $row2['grand_total'];

	$sql6 = mysqli_query($db,"SELECT * FROM kirim where kode_jual = '$kode_jual'");
		$row3 = mysqli_fetch_assoc($sql6);
			// $nama_kurir = $row3['layanan_kirim'];
			$ongkir = $row3['biaya'];
			$ongkir2 = $row3['biaya'];
			//$tes = "Gram";

			$ubah = $total_berat / 1000;
    		$berat_final = round($ubah);
    		$ongkir = $ongkir * $berat_final;

			$total_bayar = $g_total+$ongkir;
					
?>

<div class="modal fade" id="<?php echo "detail".$kode_jual;?>" role ="dialog" style="width:100%;">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class = "modal-header">
			<h4>Details Transaksi dengan kode <?php echo $kode_jual?></h4>
			</div>
			<form id="form1" name="form1" method="post" action="#">
				<div class="modal-body">
					<div class="row" style="margin-left:0; margin-right:0;">
						<?php echo $pesan ?>
						<div class="col-lg-9" align="right">
							Ongkir <?php echo $total_berat?> x <?php echo number_format($ongkir2,0,",",".")?> = 
						</div>
						<div class="col-lg-3" align="left">
							Rp. <?php echo number_format($ongkir,0,",",".") ?>
						</div>
						<div class="col-lg-9" align="right">
							Total Pembayaran =
						</div>
						<div class="col-lg-3" align="leftt">
								Rp. <?php echo number_format($total_bayar,0,",",".")?>
						</div>
	            	</div>
				</div>
			
				<div class="modal-footer" style="margin-top:20px;">
					
					<button class="btn btn-primary" data-dismiss="modal"> Close</button>

				</div>
			</form>
		</div>
	</div>
</div>