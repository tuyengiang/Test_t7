<?php
	require_once('inc/lib.php');
	if($_SERVER["REQUEST_METHOD"]=="POST"){

		$user=$_POST["username"];
		$pass=md5($_POST["password"]);
		$message="";
		if(empty($user)){
			echo "<script type='text/javascript'>";
			echo "alert(Ban chua nhap ten tai khoan');";
			echo "</script>";
		}
		else if(empty($pass)){
			echo "<script type='text/javascript'>";
			echo "alert(Ban chua nhap mat khau');";
			echo "</script>";
		}else{
			$sql="SELECT * FROM user WHERE user='{$user}' AND pass='{$pass}'";
			$query=mysqli_query($conn,$sql);
			$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
			if($row==0){
				$message="Tai khoan hoac mat khau khong dung";
			}
			else{
				$_SESSION["user"]=$user;
				header('location:admin/wp-admin.php');
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Trang dang nhap</title>
	<meta charset="utf-8"/>
	<style>
		*{
			margin:0; padding:0;
			font-family:roboto,arial;
		}
		body{
			width:100%;
			background:white;
		}
		#login{
			width:50%;
			margin:auto;
			margin-top:50px;
			box-shadow:2px 2px 2px 2px rgba(0,0,0,0.1);
		}
		h1{
			width:100%;
			height:100px;
			color:white;
			background:green;
			text-align:center;
			line-height:100px;
		}
		h4{
			color:green;
			margin-top:10px;
		}
		form{
			width:100%;
			margin-top:20px;
			padding:1em;
		}
		input{
			width:93%;
			height:40px;
			border:1px dashed green;
			margin-top:10px;
			border-radius:1em;
			padding-left:5px;
		}
		ul{
			list-style-type:none;
		}
		a{
			text-decoration:none;
		}

		button{
			width:30%;
			height:40px;
			margin-top:20px;
			color:white;
			background:green;
			border:none;
			border-radius:1em;
			font-weight:bold;
			font-size:15px;
			cursor:pointer;
		}
		button:hover{
			border:1px dashed green;
			border-radius:1em;
			background:white;
			color:green;
		}
		ul{
			margin-top:10px;
		}
		li{
			width:30%;
			margin:auto;
			height:40px
			margin-top:10px;
		}
		li a{
			display:block;
			line-height:40px;
			text-align:center;
			color:green;
			transition:0.5s ease all;
		}
		li a:hover{
			transition:0.5s ease all;
			border:1px dashed green;
			border-radius:1em;
		}


	</style>
</head>
<body>
	<div id="login">
		<h1>Dang nhap vao he thong</h1>
		<form method="post">
			<label>
				<h4>Ten dang nhap</h4>
				<input type="text" name="username">
			</label>
				
			<label>
				<h4>Mat khau</h4>
				<input type="password" name="password">
			</label>
			<center><button type="submit">Dang nhap</button></center>
			<ul>
				<li><a href="dangky.php">Dang ky</a></li>
				<li><a href="#">Lien he</a></li>
			</ul>

		</form>

	</div><!--login-->
</body>
</html>