<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link rel="stylesheet" href="./css.css">
</head>

<body>
<nav class="test">
  <div id="dk">
		<ul class="dk1">
			<li><a><b>XIN CHÀO QUẢN TRỊ VIÊN</b></a></li>
			<li><a href="BTL.php"><b>ĐĂNG XUẤT</b></a></li>
			<li><a href="Admin_GioHang.php"><b>GIỎ HÀNG</b></a></li>
			<li><a href="Admin_Controller.php"><b>SẢN PHẨM</b></a></li>

		</ul>
		</div>
		<form class="add-form" action="add-product.php" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<p>ID truyện</p>
				<input type="text" name="idtruyen" placeholder="nhập id truyện"/>
			</div>
			<div class="form-group">
				<p>Tên truyện</p>
				<input type="text" name="tentruyen" placeholder="nhập tên truyện"/>
			</div>
			<div class="form-group">
				<p>Giá</p>
				<input type="text" name="gia" placeholder="nhập giá truyện"/>
			</div>
			<div class="form-group">
				<p>Hình ảnh</p>
				<input type="file" name="file" placeholder="nhập hình ảnh truyện"/>
			</div>
			<div class="form-group">
				<p>Mô tả</p>
				<input type="text" name="mota" placeholder="nhập mô tả truyện"/>
			</div>
			<div class="form-group">
				<p>Loại</p>
				<select name="loai">
					<option value="1">Mới ra</option>
					<option value="2">Hot</option>
					<option value="3" >Manga</option>
				</select>
			</div>
			<button type="submit">Thêm</button>
		</form>
</nav>
</body>
</html>
