<?php 
   $db = mysqli_connect('localhost','root','','dbsgbaru');
   if(mysqli_connect_errno()){
   		echo 'terjadi kesalahan yaitu: '.mysqli_connect_error();
   		die();
   }
 @session_start();
 require_once $_SERVER['DOCUMENT_ROOT'].'/program/config.php';  
 require_once BASEURL.'helpers/helpers.php';
 date_default_timezone_set('Asia/Jakarta');

 if(isset($_SESSION['SBUser'])){
 	$kode_user = $_SESSION['SBUser'];
 	$query = $db->query("SELECT * from user where kode_user = '$kode_user'");
 	$user_data = mysqli_fetch_assoc($query);
 	$fn = explode(' ', $user_data['nama']);
 	$user_data['first'] = $fn[0];
 	@$user_data['last'] = $fn[1];
 }

 if(isset($_SESSION['success_flash'])){
 	echo '<div class="bg-success"><p class="text-success text-center">'.$_SESSION['success_flash'].'</p></div>';
 	unset($_SESSION['success_flash']);
 }

 if(isset($_SESSION['error_flash'])){
 	echo '<div class="bg-danger"><p class="text-danger text-center">'.$_SESSION['error_flash'].'</p></div>';
 	unset($_SESSION['error_flash']);
 }
?>