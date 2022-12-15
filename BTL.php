<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Untitled Document</title>
	<link rel="stylesheet" href="css.css">
	<?php
		require_once("./db.php");
		session_start();
		unset($_SESSION["user"]);
		$selectNews = 'SELECT * FROM truyen WHERE loai = 1';
		$dataNews = mysqli_query($conn,$selectNews);
		$selectChild = 'SELECT * FROM truyen WHERE loai = 2';
		$dataChild = mysqli_query($conn,$selectChild);
		$selectManga = 'SELECT * FROM truyen WHERE loai = 3';
		$dataManga = mysqli_query($conn,$selectManga);

	?>
</head>

<body>
	<nav class="test">
	<div id="dk">
		<ul class="dk1">
		<li><a href="FrmDangNhap.php"><b>ĐĂNG NHẬP</b></a></li>
			<li><a href="FrmDangKy.php"><b>ĐĂNG KÝ</b></a></li>
			<li><a href="#"><b>GIỎ HÀNG</b></a></li>
		</ul>
		</div>
	</nav>
	<header align="center">
		<a href="BTL.php">
			<p align="center"> <img src="img/logo.png" width="300"> </p>

		</a>


  </header>
		<div class="down" align="center">
		<form action="timkiem_kh.php" method="GET">
			<div class="share">

				<input style="" name="tukhoa" placeholder="Tìm kiếm...">
				<button type="submit">
					<img src="img/kinh.jpg">
				</button>
	        </div>
			<form>
			<div class="down" align="center">

			</div>


		
<nav>
		<div id="menu">
		<ul class="menu1">
			<li><a href="BTL.php"><b>TRANG CHỦ</b></a></li>
			<li><a href="#"><b>DANH MỤC SẢN PHẨM</b></a>
		    <ul class = "menucon">
		      <li><a href="#S1">SÁCH MỚI PHÁT HÀNH</a></li>
		      <li><a href="#S2">SÁCH THIẾU NHI</a></li>
		      <li><a href="#S3">MANGA - COMIC</a></li>
	        </ul>
	      </li>
			<li><a href="FrmGioiThieu.php"><b>GIỚI THIỆU</b></a></li>
			<li><a href="FrmLienHe.php"><b>LIÊN HỆ</b></a></li>
		</ul>
		</div>



</nav>

	<div id="style">
		<a href="">
		<p align="center"><img src="img/anh1.png"  alt="" width="1900"></a>
	</div>
<div class="container">
	<article> <br>
		<h3><a name="S1">SÁCH MỚI PHÁT HÀNH</h3>
		<div class="new_list">
			<?php while($row = $dataNews ->fetch_assoc()) { ?>
				<a href="detail-product.php?idtruyen=<?php echo $row["idtruyen"]; ?>" class="new_item">
					<img src='<?php echo $row["hinhanh"]; ?>' width="275" height="400">
					<h4>
						<?php echo $row["tentruyen"]; ?>
					</h4> <br>
					<div class="content" >
					<?php echo $row["giatien"]   ?>
						VNĐ
					</div>
			</a>
			<?php }; ?>
		</div>

	</article>

	</div>
		<div align="center"  >
		<img src="img/anh2.png" style="margin-top: 50px;">
	</div>

	<div class="container">
	<article>
		<h3><a name="S2">SÁCH THIẾU NHI</h3>
	  	<div class="new_list">
		  <?php while($row = $dataChild ->fetch_assoc()) { ?>
				<a href="detail-product.php?idtruyen=<?php echo $row["idtruyen"]; ?>"  class="new_item">
					<img src='<?php echo $row["hinhanh"]; ?>' width="275" height="400">
					<h4>
						<?php echo $row["tentruyen"]; ?>
					</h4> <br>
					<div class="content" >
					<?php echo $row["giatien"]   ?>
						VNĐ
					</div>
				</a>
			<?php }; ?>
	</div>
	</article>
	</div>
      <div align="center"  >
		<img src="img/manga.png" width="1900" style="margin-top: 50px;">
	</div>
	<div class="container">
		<article>
		<h3><a name="S3">MANGA - COMIC</h3>
	  	<div class="new_list">
		  <?php while($row = $dataManga ->fetch_assoc()) { ?>
				<a href="detail-product.php?idtruyen=<?php echo $row["idtruyen"]; ?>"  class="new_item">
					<img src='<?php echo $row["hinhanh"]; ?>' width="275" height="400">
					<h4>
						<?php echo $row["tentruyen"]; ?>
					</h4> <br>
					<div class="content" >
					<?php echo $row["giatien"]   ?>
						VNĐ
					</div>
				</a>
			<?php }; ?>
		</div>
	</article>
	<footer>

	</footer>

</div>
</body>
</html>
