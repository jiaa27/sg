<?php  
  $sql = "SELECT * FROM barang WHERE featured = 1 ";
  $featured = $db->query($sql);
?>

<div class="container-fluid">
<div class="row">

<!-- leftbar -->
<!-- <div class="col-md-2">

</div> -->
<!-- end-leftbar -->

<!-- center -->
<div class="col-md-10">
	<div class="row">
		<h3 class="well text-center">Featured Products</h3>
		<?php while($k = mysqli_fetch_assoc($featured)): ?>
			<div class="col-sm-3 col-md-3 col-xs-3">
             <div class="thumbnail" 
              style="-webkit-box-shadow: 0px 5px 16px -3px rgba(0,0,0,0.60);
					-moz-box-shadow: 0px 5px 16px -3px rgba(0,0,0,0.60);
					box-shadow: 0px 5px 16px -3px rgba(0,0,0,0.60);"
			>
               <img src="<?= $k['foto'];?>" alt="<?= $k['nama_brg'];?>" style="width:auto; height:200px;padding-top: 20px;">
                   <div class="caption">
                      <h5> <?= $k['nama_brg']; ?> </h5>
                      <p> Harga : <?= money($k['harga_jual']); ?></p>
                      <p><a href="#" class="btn-sm btn-primary" onclick="detailsmodal('<?= $k['kode_brg'] ?>')">Details</a></p>
                    </div>
            </div>
            </div>
            <?php endwhile; ?> 
	</div>
</div>
<!-- end-center -->

<!-- rightbar -->
<div class="col-md-2">
	<h3 class="well text-center">Popular Items</h3>
	 <?php 
	 	$jual =$db->query("SELECT jualdt.kode_brg as kode_brg, barang.nama_brg as nama, count(jualdt.kode_brg) as jumlahterjual from jualdt join barang on jualdt.kode_brg = barang.kode_brg group by jualdt.kode_brg, barang.nama_brg ORDER by count(jualdt.kode_brg) desc limit 5");
	 	$results = array();
	 	while($row = mysqli_fetch_assoc($jual)){
			$results[] = $row;
		 }
		$row_count = $jual->num_rows;
	  ?>
	 <div class="thumbnail" style="font-size: 13px">
	 	<table class = "table table-condensed">
	 		<?php for($i=0;$i<$row_count;$i++){ ?>
	 		 <tr>
	 		 	<td><?=substr($results[$i]['nama'],0,20); ?></td>
	 		 	<td><a class="text-primary" onclick="detailsmodal('<?= $results[$i]['kode_brg'] ?>')">View</a></td>
	 		 </tr>
	 		<?php }; ?>
	 	</table>
	 </div>
</div>
<!-- end-rightbar -->

</div>
</div>