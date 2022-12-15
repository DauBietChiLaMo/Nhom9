<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Untitled Document</title>
	<link rel="stylesheet" href="css.css">
	<?php
		require_once("./db.php");
        $tukhoa = $_REQUEST["tukhoa"];
        $selectdb = 'SELECT * from truyen where tentruyen LIKE "%'.$tukhoa.'%"';
        $data = mysqli_query($conn,$selectdb);

	?>
</head>

<body>
	<nav class="test">
	<div id="dk">
		</div>
	</nav>
	<header align="center">
		<a href="BTL.php">
			<p align="center"> <img src="img/logo.png" width="300"> </p>

		</a>


  </header>
		<div class="down" align="center">
			<div class="share">
				<input style="" name="" placeholder="Tìm kiếm...">
				<button>
					<img src="img/kinh.jpg">
				</button>

	        </div>
			<div class="down" align="center">

			</div>


		</div>

<div class="container">
	<article> <br>
		<h3><a name="S1">Các sách có từ khóa : <?php echo $tukhoa; ?> </h3>
		<div class="new_list">
			<?php while($row = $data ->fetch_assoc()) { ?>
				<div class="new_item">
					<img src='<?php echo $row["hinhanh"]; ?>' width="275" height="400">
					<h4>
						<?php echo $row["tentruyen"]; ?>
					</h4> <br>
					<div class="content" >
					<?php echo $row["giatien"]   ?>
					</div>
				</div>
			<?php }; ?>
		</div>

	</article>


	<footer>

	</footer>

</div>
</body>
</html>
