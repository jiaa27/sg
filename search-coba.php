<?php 
	$price_sort =((isset($_REQUEST['price_sort']))?sanitize($_REQUEST['price_sort']):'');
	$min_price =((isset($_REQUEST['min_price']))?sanitize($_REQUEST['min_price']):'');
	$max_price =((isset($_REQUEST['max_price']))?sanitize($_REQUEST['max_price']):'');
	$m = ((isset($_REQUEST['merk']))?sanitize($_REQUEST['merk']):'');
	$merk0 = $db->query("SELECT * from merk ORDER BY merk");
 ?>
	<h3 class="text-center well">Search By</h3>
	<h4 class="text-center">Harga</h4>
	<form action="search.php" method="post">
		<input type="radio" name="price_sort" value="low"<?=(($price_sort=='low')?' checked':'')?>>Rendah ke Tinggi<br>
		<input type="radio" name="price_sort" value="high"<?=(($price_sort=='high')?' checked':'')?>>Tinggi ke Rendah<br><br>
		<input type="text" name="min_price" class="price_range" style="width:90px;" placeholder="Min Rp" value="<?=$min_price?>"> s/d 
		<input type="text" name="max_price" class="price_range" style="width:90px;" placeholder="Max Rp" value="<?=$max_price?>"><br><br>

		<h4 class="text-center">Merk</h4>
		<input type="radio" name="merk" value=""<?=(($m=='')?' checked':'');?>>Semua<br>
		<?php while($merk = mysqli_fetch_assoc($merk0)): ?>
			<input type="radio" name="merk" value="<?=$merk['kode_merk'];?>"<?=(($m == $merk['kode_merk'])?' checked':'');?>><?=$merk['merk']?><br>
		<?php endwhile; ?>
		<input type="submit" value="Search" class="btn btn-xs btn-primary">
	</form>