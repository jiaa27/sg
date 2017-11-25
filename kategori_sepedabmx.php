<?php
    include 'header.php';
?>

<?php  
  $jum = 12;
  if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
  $start_from = ($page-1) * $jum;
  $sql = " SELECT * FROM barang WHERE kategori = 'BB'LIMIT $start_from, $jum ";
  $kategori = $db->query($sql);
 ?>

<div class="container-fluid" style="margin-top: 40px">
    <div class="row">

       <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="list-group">
             <a href="#" class="list-group-item active disabled">Kategori</a>
            </div>

            <div class="list-group">
             <a href="#" class="list-group-item active disabled">Sepeda</a>
             <a href="kategori_sepedaanak.php" class="list-group-item">Sepeda Anak / Kids Bike</a>
             <a href="kategori_sepedamtb.php" class="list-group-item">Sepeda Gunung / Mountain bike</a>
             <a href="kategori_sepedabmx.php" class="list-group-item active">Sepeda Bmx</a>
             <a href="kategori_roadbikes.php" class="list-group-item">Road Bike</a>
             <a href="kategori_citybikes.php" class="list-group-item">City Bike</a>
            </div>    
            
            <div class="list-group">
             <a href="#" class="list-group-item active disabled">Lain-Lain</a>
             <a href="kategori_aksesoris.php" class="list-group-item">Aksesoris</a>
             <a href="kategori_sukucadang.php" class="list-group-item">Suku Cadang</a>
            </div>
        </div>


        <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="row marketing">

            <?php while($k = mysqli_fetch_assoc($kategori)) : ?>
              <div class="col-md-3 col-sm-3 col-xs-6">
              <div class="thumbnail"  style="-webkit-box-shadow: 0px 5px 16px -3px rgba(0,0,0,0.60); -moz-box-shadow: 0px 5px 16px -3px rgba(0,0,0,0.60); box-shadow: 0px 5px 16px -3px rgba(0,0,0,0.60);" >
               <img src="<?= $k['foto']; ?>" alt="<?= $k['nama_brg']; ?>" style="width:auto; height:200px;padding-top: 20px;">
                   <div class="caption">
                      <h5> <?= $k['nama_brg']; ?> </h5>
                      <p> Harga : <?= money($k['harga_jual']); ?></p>
                      <p><a  href="#" class="btn-sm btn-primary" onclick="detailsmodal('<?= $k['kode_brg'] ?>')">Details</a></p>
                    </div>
               </div>
              </div>
            <?php endwhile; ?> 

            </div>

            <?php 
              $querypage = mysqli_query($db,"SELECT * FROM barang WHERE kategori = 'BB'");
              $total_records = mysqli_num_rows($querypage);
              $total_pages = ceil($total_records/$jum);
            ?>

          <div class="col-md-12 text-center">
                <ul class="pagination">
                <?php
                echo 
                "<li class='paginate_button previous' aria-controls='dataTables-example' tabindex='0' id='dataTables-example_previous'>
                <a href='kategori_sepedabmx.php?page=1'><span class='fa fa-backward'></span></a></li>";

                for ($i=1; $i<=$total_pages; $i++) { 
                    if($i == $page) {
                    echo 
                    "<li class='paginate_button active' aria-controls='dataTables-example' tabindex='0'>
                    <a href='kategori_sepedabmx.php?page=".$i."'> ".$i." </a></li>";
                    } else {
                    echo 
                    "<li class='paginate_button' aria-controls='dataTables-example' tabindex='0'>
                    <a href='kategori_sepedabmx.php?page=".$i."'> ".$i." </a></li>"; 
                    }
                } 
                echo
                "<li class='paginate_button next' aria-controls='dataTables-example' tabindex='0' id='dataTables-example_next'>
                <a href='kategori_sepedabmx.php?page=$total_pages'><span class='fa fa-forward'></span></a>
                </li>";
                ?>
                </ul>
            </div>

        </div>

    </div>
</div>



<?php
    include 'footer.php'
?>
