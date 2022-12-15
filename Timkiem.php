<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="./css.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<?php
    require_once("./db.php");
    $tukhoa = $_REQUEST["tukhoa"];
    $selectdb = 'SELECT * from truyen where tentruyen LIKE "%'.$tukhoa.'%"';
    $data = mysqli_query($conn,$selectdb);
    ?>
<body>

<nav class="test">
  <div id="dk">
		<ul class="dk1">
			<li><a><b>XIN CHÀO QUẢN TRỊ VIÊN</b></a></li>
			<li><a href="BTL.php"><b>ĐĂNG XUẤT</b></a></li>
			<li><a href="Admin_GioHang.php"><b>GIỎ HÀNG</b></a></li>
		</ul>
		</div>
</nav>
<div class="listproduct">

<table border="1" align="center">
  <tr>
    <td colspan="5" align="center">DANH MỤC TÌM KIẾM</td>
  </tr>
  <form name="search_hangsx" method="post" action="hangsx_search.php">
  <tr>
    <p>Các sản phẩm tìm kiếm được với từ khóa <b><?php echo $tukhoa; ?></b></p>
  </tr>


  </form>
  <tr>
    <td width="43">ID truyện</td>
    <td width="237">Tên truyện</td>
    <td width="193">Giá tiền</td>
    <td width="75">Hình ảnh</td>
  </tr>
  <tbody>
  <?php if(mysqli_num_rows($data) > 0) while($row = $data ->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row["idtruyen"]; ?></td>
        <td><?php echo $row["tentruyen"]; ?></td>
        <td><?php echo $row["giatien"]; ?></td>
        <td><img class="img-product" src='<?php echo $row["hinhanh"]; ?>'/></td>
    </tr>
<?php }; ?>
</div>
  </tbody>
</table>
</body>
</html>
