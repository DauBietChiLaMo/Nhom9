<?php
  $sql = "SELECT * FROM cart, client WHERE cart.client_id=client.client_id
  ORDER BY cart.cart_id DESC";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    // output data of each row
?>

<div class="col-lg-12 my-5">
<h5 class="text-uppercase text-center">list order</h5>
<div class="bg-white border rounded mt-3">
<table class="table table-hover mt-2 table-borderless ">
  <thead class="text-center table-hover thead-light">
    <tr>
      <th class="align-middle">#Id</th>
      <th class="align-middle">Mã đơn hàng</th>
      <th class="align-middle">Tên khách hàng</th>
      <th class="align-middle">Địa chỉ</th>
      <th class="align-middle">Email</th>
      <th class="align-middle">Điện thoại</th>
      <th class="align-middle">Trạng thái</th>
      <th class="align-middle">Quản lý</th>
    </tr>
  </thead>
  <tbody class="text-center">
  <?php 
   $i = 0;
   while($row = $result->fetch_array()) {
       $i++;
  ?>
  <tr>
  <td><?php echo $i ?></td>
    <td class="align-middle"><?php echo $row['code'] ?></td>
    <td class="align-middle"><?php echo $row['username'] ?></td>
    <td class="align-middle"><?php echo $row['address'] ?></td>
    <td class="align-middle"><?php echo $row['email'] ?></td>
    <td class="align-middle"><?php echo $row['phone'] ?></td>
    <td class="align-middle">
        <?php
            if($row['status']==1){
                echo '<a class="text-danger text-decoration-none" href="modules/order/processing.php?code='.$row['code'].' ">Đơn hàng mới</a>';
            }else{
                echo 'Đã xử lý';
            }
        ?>
    </td>
    <td class="align-middle">
        <a class="text-danger text-decoration-none" href="index.php?action=order&query=check&code=<?php echo $row['code']?>">Xem đơn hàng</a>
    </td>
  </tr>
    <?php }
} else {
  //echo "0 results";
} ?>
</table>
</div>
</div>