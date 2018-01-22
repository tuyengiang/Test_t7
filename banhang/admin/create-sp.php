<?php
	require_once("../inc/lib.php");
	checklogin();
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$masp=$_POST["masp"];
		$tensp=$_POST["tensp"];
		$hinhanh=$_POST["images"];
		$giaban=$_POST["giaban"];
		$cat_id=$_POST["cat_id"];

		$sql="INSERT INTO sanpham (masp,tensp,images,giaban,cat_id)
			VALUES('{$masp}','{$tensp}','{$hinhanh}','{$giaban}','{$cat_id}')
		";
		$query=mysqli_query($conn,$sql);
		if($query){
			echo "<script type='text/javascript'>";
			echo "alert('Them thanh cong');";
			echo "</script>";
		}else{
			echo "<script type='text/javascript'>";
			echo "alert('Them khong thanh cong');";
			echo "</script>";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Dang san pham moi</title>
	<meta charset="utf-8"/>
	<link href="../css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="website">	
		<h1> Dang san pham moi</h1>
		<form method="post" class="form">
			<label>
				<h4>Ma san pham</h4>
				<input type="text" name="masp">
			</label>
			<label>
				<h4>Ten san pham</h4>
				<input type="text" name="tensp">
			</label>
			<label>
				<h4>Hinh anh san pham</h4>
				<input type="file" name="images">
			</label>
			<label>
				<h4>Gia san pham</h4>
				<input type="text" name="giaban">
			</label>
			<label>
				<h4>Danh muc</h4>
				<select name="cat_id">
					<option>Chon danh muc</option>
					<?php 
						$sql="SELECT * FROM danhmuc";
						$query=mysqli_query($conn,$sql);
						while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)):
					 ?>
					 	<option value="<?php echo $row['id']; ?>"><?php echo $row["tendm"];?></option>
					<?php endwhile; ?>
				</select>

			</label>
			<center><button type="submit">Dang san pham</button></center>
		</form>
	</div><!--website-->
</body>
</html>