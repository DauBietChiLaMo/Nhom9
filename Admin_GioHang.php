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
    $selectdb = 'SELECT * from truyen';
    $data = mysqli_query($conn,$selectdb);
    ?>
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
</nav>
<div style="text-align:center; margin-bottom : 10px;">
  <p>Tìm kiếm</p>
    <form action="Timkiem.php" method="GET">
    <input placeholder="Tìm kiếm..." name="tukhoa" type="text"/>
    <input placeholder="Tìm kiếm..." type="submit"/>
    </form>
</div>
<div class="listproduct">
<table border="1" align="center">
  <tr>
    <td colspan="5" align="center">DANH MỤC SẢN PHẨM</td>
  </tr>
  <tr>
    <td width="43">ID truyện</td>
    <td width="237">Tên truyện</td>
    <td width="193">Giá tiền</td>
    <td width="75">Hình ảnh</td>
    <td width="75">Thao tác</td>
  </tr>
  <tbody>
  <?php while($row = $data ->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row["idtruyen"]; ?></td>
        <td><?php echo $row["tentruyen"]; ?></td>
        <td><?php echo $row["giatien"]; ?></td>
        <td><img class="img-product" src='<?php echo $row["hinhanh"]; ?>'/></td>
        <td>
          <span><a href="edit-product.php?idtruyen=<?php echo $row["idtruyen"] ?>"><i class="fas fa-edit"></i></a></span>
          <span><a href="delete-product.php?idtruyen=<?php echo $row["idtruyen"] ?>&tentruyen=<?php echo $row["tentruyen"] ?>"><i class="fas fa-trash-alt"></i></a></span>
        </td>
    </tr>
<?php }; ?>

  </tbody>
</table>
</body>
</html>
