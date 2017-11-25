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
<script type="text/javascript" src="ajax/ajax_kota.js"></script>

<div class="container-fluid">
<div class="col-lg-6 col-lg-offset-3">

		<form class="form-horizontal" action="script/kd_signup.php" method="post" enctype="multipart/form-data" id="form1">
			<div class="panel panel-primary">
			<div class="panel-heading"><span class="glyphicon glyphicon-user"></span>&nbsp; Sign Up</div>
			<div class="panel-body">
			<div class="form-group">
        	<label for="nama" class="control-label col-lg-3">Nama :</label>
        		<div class="col-lg-9">
       	    	<input type="text" id="nama" class="form-control" name="nama" style="text-transform: capitalize" placeholder="Nama Anda" required="" autofocus="">
       	    </div>
			</div>

			<div class="form-group">
        		<label for="email" class="control-label col-lg-3">Email :</label>
        		<div class="col-lg-9">
       			<input type="text" id="email" class="form-control" name="email" placeholder="Email" required="">
       			</div>
       		</div>

			<div class="form-group">
	            <label for="notlp" class="control-label col-lg-3">No.HP/TLP :</label>
	            <div class="col-lg-9">
	            <input type="text" id="notlp" class="form-control" name="notlp" placeholder="Nomor Handphone/Telephone" required="">
	            </div>
			</div>

			<div class="form-group">
       			<label for="password" class="control-label col-lg-3">Password :</label>
       			<div class="col-lg-9">
       			<input type="password" class="form-control" id="pass1" name="pass1" placeholder="Masukan Kata Sandi"  required>
       			</div>	
			</div>

			<div class="form-group">
       			<label for="ulangpassword" class="control-label col-lg-3">Ulangi Password :</label>
       			<div class="col-lg-9">
       			<input type="password" id="ulangpassword" class="form-control" name="pass2" placeholder="Ulangi Password" required="">
       			</div>
       		</div>

      <div class="form-group">
		        <label for="prop" class="control-label col-lg-3">Provinsi :</label>
		        <div class="col-lg-9">
		        <select name="prop" id="prop" class="form-control" onchange="showResultKota(this.value)">
		            <option value="" selected="selected" >Pilih Provinsi</option>
                <!-- <option value="" selected="selected" >XX-30-XX</option> -->
		                <?php 
		                    include "ongkir/Propinsi.php";
		                    echo $list_propinsi;
		                ?>          
		        </select>
				    </div>
		  </div>

		  <div class="form-group">
          	<label for="kota" class="control-label col-lg-3">Kota/Kab :</label>
          		<div class="col-lg-9">
           	    <select name="kota" id="kota" class="form-control" required>
                    <option selected="selected" value="">Pilih Kota/Kabupaten</option>                      
                </select>
              </div>
      </div>

			<div class="form-group">
       			<label for="alamat" class="control-label col-lg-3">Alamat :</label>
       			  <div class="col-lg-9">
       			   <!-- <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat" required=""> -->
               <textarea rows="2" class="form-control" style="text-transform: capitalize" id="alamat" name="alamat"  placeholder="Masukan Alamat Lengkap"></textarea>
       			  </div>	
			</div>

			<div class="form-group">
       			<label for="kodepos" class="control-label col-lg-3">Kode Pos :</label>
       			<div class="col-lg-9">
       			<input type="text" id="kodepos" name="kodepos" class="form-control" placeholder="Kode pos" required="">
       			</div>
       		</div>

       		<div class="form-group">
       		<!-- <div class="col-xs-offset-3 col-lg-10" style="margin-top: -10px; margin-bottom: 10px;"> -->
          <div class="col-lg-12" style="margin-top: -10px; margin-bottom: 10px;" align ="center">
          		<label class="checkbox-inline">
            	<input type="checkbox" name="agree" value="agree"> Saya setuju dengan <a href="#syarat" data-toggle="modal">syarat dan ketentuan</a> yang berlaku.
         		</label>
         	</div>
         	</div>

			<div class="form-group">
			   <!-- <div class="col-xs-offset-9 col-lg-10"> -->
         <div class="col-lg-12" align="right">
            <button type="submit" class="btn btn-sm btn-primary" value="Kirim">Sign Up</button>
       			<input class="btn btn-sm btn-default" type="reset" value="reset">
       	 </div>
      </div>


    </div>  	
		</div>
   </form>
    
	 <button class="btn btn-primary btn-block" style="margin-top: -10px">Sudah ada akun ? <a href="signin.php">Sign In</a></button> 
  <br>
</div>

</div>

    <div class="modal fade" id="syarat" role="dialog">
        <div class ="modal-dialog" >
            <div class ="modal-content">
                <div class ="modal-header">
                    <h4>Kebijakan dan Ketentuan</h4>
                </div>
                    <div class="modal-body">
                        <p>1. Barang yang dibeli tidak bisa dikembalikan alias retur.</p>
                        <p>2. Sebelum mengirimkan barang, penjual sudah mengecek terlebih dulu kondisi barang.</p>
                        <p>3. Penjual tidak mungkin mengirim barang rusak (trusted seller).</p>
                    </div>
                <div class="modal-footer" style="margin-top:20px;">
                    
                    <button class="btn btn-primary" data-dismiss="modal"> Close</button>

                </div>
            </div>
        </div>
    </div>

<?php 
  include "footer.php";
?>

