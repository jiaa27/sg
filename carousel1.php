<!-- <div class="container-fixed" style="margin-top: 0px;">-->
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
		<ol class="carousel-indicators">';
		<?php
			$hasil = mysqli_query($db,'select * from carousel');
			$jumlah = mysqli_num_rows($hasil);
			for ($i=0;$i<$jumlah;$i++){
				if($i==0){
					echo '<li data-target="#carousel-example-generic" data-slide-to='.$i.' class="active"></li>';
				}else{
					echo '<li data-target="#carousel-example-generic" data-slide-to='.$i.'></li>';
				}
			}

		echo '</ol>
			  <div class="carousel-inner" role="listbox">';

		$x = 0;
		while ($baris = mysqli_fetch_array($hasil)){
			if($x==0){
				echo'<div class="item active">
					<img class ="slide-image" id="gambarslide" src="'.$baris['gambar'].'" style="width:100%; height:400px; ">
					</div>';
			}else{
				echo'<div class="item">
					<img class ="slide-image" id="gambarslide" src="'.$baris['gambar'].'" style="width:100%; height:400px; ">
					</div>';
			}
			$x++;
		}

		echo '</div>';
		?>

        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> 
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> 
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> 
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span>
        </a> 
      </div>
    <!-- </div> -->



