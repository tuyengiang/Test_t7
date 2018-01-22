<!DOCTYPE html>
<html>
<head>
	<title>Trang chu</title>
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
		#website{
			width:30%;
			margin:auto;
			margin-top:130px;
			height:120px;
		}
		h1{
			width:100%;
			height:100px;
			color:white;
			background:green;
			text-align:center;
			line-height:100px;
		}
		ul{
			list-style-type:none;
			margin-top:20px;
		}
		a{text-decoration:none;}
		li{
			width:45%;
			float:left;
			margin:auto;
			margin-left:12px;
			height:120px;
			background:green;
			border-radius:1.5em;
		}
		li a{
			display:block;
			line-height:120px;
			text-align:center;
			font-weight:bold;
			font-size:20px;
			color:white;
			transition:0.5s ease all;
			cursor:pointer;
		}
		li a:hover{
			transition:0.5s ease all;
			background:lightgray;
			border-radius:1.2em;
		}
	</style>
</head>
<body>
	<div id="website">
		<h1>Trang ban hang</h1>
		<ul>
			<li><a href="dangnhap.php">Dang nhap</a></li>
			<li style="background:#ff3333;"><a href="dangky.php">Dang ky</a></li>
		</ul>
	</div><!--website-->
</body>
</html>