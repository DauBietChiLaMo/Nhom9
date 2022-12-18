<?php
$p = 20;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = '';
}
if ($page == '' || $page == 1) {
    $begin = 0;
} else {
    $begin = ($page * $p) - $p;
}

?>
<div class="col-lg-12 my-5">
<?php
  $sql = "SELECT * FROM category WHERE category.category_id = '$_GET[id]' LIMIT 1";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    // output data of each row
      $row = $result->fetch_assoc();
  ?>
  <h5 class="text-uppercase text-center"><?php echo $row['category'] ?></h5>
  <?php
  } else {
      //echo "0 results";
  }
  ?>

<div class="bg-white border rounded mt-3">
<table class="table table-hover mt-2 table-borderless ">
  <thead class="text-center table-hover thead-light">
    <tr>
      <th class="align-middle col-2">Tên sản phẩm</th>
      <th class="align-middle">Hình ảnh</th>
      <th class="align-middle">Giá</th>
      <th class="align-middle">Số lượng</th>
      <th class="align-middle">Mã</th>
      <th class="align-middle col-4">Tóm tắt</th>
      <th class="align-middle">Trạng thái</th>
      <th class="align-middle">Quản lý</th>
    </tr>
  </thead>
  <tbody class="text-center">
  <?php 
    $sql = "SELECT * FROM product
    WHERE product.category_id = '$_GET[id]' ORDER BY product_id DESC LIMIT $begin,$p";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_array()) {
  ?>
  
  <tr>
    <td class="align-middle col-2"><?php echo $row['product'] ?></td>
    <td class="align-middle"><img width="50px" src="modules/product/uploads/<?php echo $row['image'] ?>" alt=""></td>
    <td class="align-middle"><?php echo $row['price'] ?></td>
    <td class="align-middle"><?php echo $row['quantity'] ?></td>
    <td class="align-middle"><?php echo $row['code'] ?></td>
    <td class="align-middle col-4"><textarea disabled style="resize: none;" class="form-control" rows="3"><?php echo $row['summary'] ?></textarea></td>
    <td class="align-middle"><?php if($row['status']==1){
        echo '<span class="fs-5 text-muted"><i class="fa-solid fa-circle-check"></i></span>';
      }
      else{
        echo '<span class="fs-5 text-muted"><i class="fa-solid fa-circle-xmark"></i></span>';
      } ?>
    </td>
    <td class="align-middle">
        <a class="fs-5 text-dark mx-2" href="modules/product/processing.php?product_id=<?php echo $row['product_id']?>"><i class="fa-solid fa-trash"></i></a>
        <a class="fs-5 text-dark mx-2" href="?action=product&query=repair&product_id=<?php echo $row['product_id']?>"><i class="fa-solid fa-wrench"></i></a>
    </td>
  </tr>
    
    <?php
    }
        } else {
            //echo "0 results";
          }
        ?>
</table>
<nav>
    <ul class="pagination justify-content-center pagination-sm">
        <?php
        $sql = "SELECT * FROM product WHERE product.category_id='$_GET[id]' ORDER BY product_id DESC";
        $result = $conn->query($sql);
        
        $count = ceil(($result->num_rows) / $p);
        for ($i = 1; $i <= $count; $i++) {
        ?>
            <li class="page-item">
                <a <?php if ($i == $page) {
                        echo 'style="background: #eae8e8"';
                    } else {
                        echo '';
                    } ?> class="page-link" href="index.php?page=<?php echo $i ?>">
                    <?php echo $i ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</nav>
</div>
</div>
