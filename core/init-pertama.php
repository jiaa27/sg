<?php 
   $db = mysqli_connect('localhost','root','','dbsg');
   if(mysqli_connect_errno()){
   		echo 'terjadi kesalahan yaitu: '.mysqli_connect_error();
   		die();
   }

 define('BASEURL','/program/'); 
 //require_once'../config.php'; 
 //require_once BASEURL.'helpers/helpers.php';

// mysql_connect('localhost','root','');
	// mysql_select_db('dbsg');
	

//date_default_timezone_set('Asia/Jakarta');

?>