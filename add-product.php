<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link rel="stylesheet" href="./css.css">
    <?php
        require_once("./db.php");
        $mes = '';
        $folder_path = "uploads/";
        $idtruyen = $_REQUEST["idtruyen"];
        $tentruyen = $_REQUEST["tentruyen"];
        $gia = $_REQUEST["gia"];
        $hinhanh = '';
        $loai = (int) $_REQUEST["loai"];
        $file_path = $folder_path.$_FILES["file"]["name"];
        $mota = $_REQUEST["mota"];
        if(move_uploaded_file($_FILES["file"]["tmp_name"],$file_path)) {
            $hinhanh = $file_path;
            $statusUploadImage = true;
        }
        $kiemtratrung = mysqli_query($conn,'SELECT * from truyen where idtruyen="'.$idtruyen.'"');
        if(mysqli_num_rows($kiemtratrung) > 0) {
            $mes = "Sản phẩm bị trùng ID";
        } else {
            $sqladd = "INSERT INTO truyen VALUES('".$idtruyen."','".$tentruyen."','".$gia."','".$hinhanh."','".$loai."','".$mota."')";
            if(mysqli_query($conn,$sqladd)) {
                $mes = "Thêm thành công";
            } else {
                $mes = "Thêm thất bại";
            }
        }
    ?>
</head>

<body>
<nav class="test">
  <div id="dk">
		<ul class="dk1">
			<li><a><b>XIN CHÀO QUẢN TRỊ VIÊN</b></a></li>
			<li><a href="BTL.php"><b>ĐĂNG XUẤT</b></a></li>
			<li><a href="Admin_GioHang.php"><b>GIỎ HÀNG</b></a></li>
		</ul>
		</div>
		<p class="add-success"><?php echo $mes;  ?></p>
</nav>
</body>
</html>
