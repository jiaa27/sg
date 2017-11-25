<?php 
	function display_errors($errors){
		$display = '<ul class="bg-danger" align="center">';
		foreach($errors as $error){
		  $display .= '<li class="text-danger" align="center">'.$error.'</li>';
		}
		$display .= '</ul>';
		return $display;
	}

	function sanitize($dirty){
		return htmlentities($dirty,ENT_QUOTES,"UTF-8");
	}

	function money($number){
		return 'Rp. '.number_format($number,0,",",".");
	}

	function signin($kode_user){
		$_SESSION['SBUser'] = $kode_user;
		global $db;
		$date = date("Y-m-d H:i:s");
		$db->query("UPDATE user SET last_seen = '$date' WHERE kode_user = '$kode_user'");
		$_SESSION['success_flash'] ='Sign In Berhasil';
?>
		<script type="text/javascript">
			document.location=('index.php');
		</script>
<?php
	}
	function is_logged_in(){
		if(isset($_SESSION['SBUser']) && $_SESSION['SBUser'] !=""){
			return true;
		}
		return false;
	}

	function signin_error_redirect($url ='admin_signin.php'){
		$_SESSION['error_flash'] = 'Anda harus sign in terlebih dahulu agar bisa mengakses halaman ini';
?>
		<script type="text/javascript">
			document.location=('admin_signin.php');
		</script>
<?php
	}
 	function permission_error_redirect($url = 'admin_signin.php'){
		$_SESSION['error_flash'] = 'Anda tidak memiliki hak akses untuk mengakses halaman ini';
 ?>
		<script type="text/javascript">
			//confirm('Gagal Sign In');
	 		document.location=('admin_signin.php');
	 	</script>
<?php
	}
 	function has_permission($permission = 'pimpinan'){
		global $user_data;
		$permissions = explode(',',$user_data['hak_akses']);
		if(in_array($permission,$permissions,true)){
 			return true;
		}
		return false;
 	}

 	function pretty_date($date){
 		return date("M d, Y h:i A",strtotime($date));
 	}
?>

