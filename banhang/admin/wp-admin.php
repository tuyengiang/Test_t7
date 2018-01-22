<?php 
	require_once('../inc/lib.php');
	checklogin();
	if(isset($_POST["delete"])){
				$id=$_POST["delete"];
				$sql="DELETE FROM sanpham WHERE id='{$id}'";
				$query=mysqli_query($conn,$sql);
				if($query){
					echo "<script type='text/javascript'>";
					echo "alert('Xoa thanh cong');";
					echo "</script>";
				}else{
					echo "<script type='text/javascript'>";
					echo "alert('Xoa khong thanh cong');";
					echo "</script>";
				}
			}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Trang quan tri admin</title>
	<meta charset="utf-8"/>
	<link href="../css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="web">
		<h1 class="title">Quan tri vien</h1>
		<div id="menu">
			<ul>
				<li><a href="wp-admin.php">Trang chu</a></li>
				<li><a href="create-sp.php">Dang San pham</a>
				</li>
				<li><a href="#">Danh muc</a></li>
				<li style="float:right;background:white;width:5%;"><a href="logout.php" style='color:green;'>Out</a></li>
				<li style='float:right;line-height:40px;color:white;width:15%'>
					<?php 
						if(isset($_SESSION['user']) && $_SESSION['user']){
							echo "Welcome <b>".$_SESSION['user'] ."</b>";
						}
					 ?>
					 
				</li>

			</ul>
		</div><!--mienu-->

		<div id="main">
			<?php 
				$sql="SELECT * FROM sanpham";
				$query=mysqli_query($conn,$sql);
				while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)):
			 ?>
			<div class="content">
				<div class="img">
					<img src="../img/<?php echo $row['images']; ?>">
				</div><!--img-->
				<div class="excerpt">
					<p><a href="#"><?php echo $row['tensp']; ?></a></p>
					<button class='button' type="submit">Mua san pham</button>
				</div><!--excerpt-->
				<div class="lua-chon">
					<a href="edit-sp.php?id=<?php echo $row['id']; ?>"><button type="submit" class="btn">Edit</button></a>
					<form method="post" class="fr">
						<input type="hidden" name="delete" value="<?php echo $row['id']; ?>">

						<button class="btn" type="submit" onclick="return confirm('Ban co muon xoa khong ?');">Delete</button>
					</form>
				</div>
			</div><!--content-->

			<?php endwhile; ?>

		</div><!--main-->
	</div><!--website-->
</body>
</html>