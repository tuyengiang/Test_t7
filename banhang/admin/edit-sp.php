<?php
	require_once("../inc/lib.php");
	checklogin();
	$id=$_GET["id"];
	$sql="SELECT * FROM sanpham WHERE id='{$id}'";
	$query=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
	if(!isset($row)){
		echo "Bai viet khong ton tai";
	}else{
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				$masp=$_POST["masp"];
				$tensp=$_POST["tensp"];
				$hinhanh=$_POST["images"];
				$giaban=$_POST["giaban"];
				$cat_id=$_POST["cat_id"];

				$sql="UPDATE sanpham SET masp='{$masp}',tensp='{$tensp}',
				images='{$hinhanh}',giaban='{$giaban}',cat_id='{$cat_id}' WHERE id='{$id}'
				";
				$query=mysqli_query($conn,$sql);
				if($query){
					echo "<script type='text/javascript'>";
					echo "alert('Sua thanh cong');";
					echo "</script>";
				}else{
					echo "<script type='text/javascript'>";
					echo "alert('Sua khong thanh cong');";
					echo "</script>";
				}
			}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sua san pham</title>
	<meta charset="utf-8"/>
	<link href="../css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="website">	
		<h1> Sua san pham</h1>
		<form method="post" class="form">
			<label>
				<h4>Ma san pham</h4>
				<input type="text" name="masp" value="<?php echo $row['masp']; ?>">
			</label>
			<label>
				<h4>Ten san pham</h4>
				<input type="text" name="tensp" value="<?php echo $row['tensp']; ?>">
			</label>
			<label>
				<h4>Hinh anh san pham</h4>
				<input type="file" name="images" value="<?php echo $row['images']; ?>">
			</label>
			<label>
				<h4>Gia san pham</h4>
				<input type="text" name="giaban" value="<?php echo $row['giaban']; ?>">
			</label>
			<label>
				<h4>Danh muc</h4>
				<select name="cat_id">
					<option>Chon danh muc</option>
					<?php 
						$sql="SELECT * FROM danhmuc";
						$query=mysqli_query($conn,$sql);
						while($row1=mysqli_fetch_array($query,MYSQLI_ASSOC)):
					 ?>
					 	<option <?php if($row['cat_id']=$row1['id']){ echo 'selected';}  ?> value="<?php echo $row1['id']; ?>"><?php echo $row1["tendm"];?></option>
					<?php endwhile; ?>
				</select>

			</label>
			<center><button type="submit">Sua san pham</button></center>
		</form>
	</div><!--website-->
</body>
</html>