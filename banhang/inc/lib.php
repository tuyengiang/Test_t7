<?php 
	session_start();
	$conn=mysqli_connect("localhost","root","root","webbanhang");
	if($conn){
		mysqli_set_charset($conn,"utf8");
	}else{
		die("Khong the ket noi csdl").mysqli_error($conn);
	}

	function checklogin(){
		global $_SESSION;
		if(empty($_SESSION['user'])){
			echo"da login ma doi vao";
			header('location:../dangnhap.php');
		}
	}
 ?>