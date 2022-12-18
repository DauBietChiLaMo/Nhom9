<?php
    $code = $_GET['code'];
    $sql = "SELECT * FROM orders, product WHERE orders.product_id=product.product_id
    AND orders.code='$code'
    ORDER BY orders.orders_id DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
?>

</table>
<div class="col-lg-12 my-5">
<h5 class="text-uppercase text-center">check order</h5>
<div class="bg-white border rounded mt-3">
<table class="table table-hover mt-2 table-borderless ">
  <thead class="text-center table-hover thead-light">
    <tr>
    <th class="align-middle">#Id</th>
    <th class="align-middle">Mã đơn hàng</th>
    <th class="align-middle">Tên sản phẩm</th>
    <th class="align-middle">Số lượng</th>
    <th class="align-middle">Đơn giá</th>
    <th class="align-middle">Thành tiền</th>
    </tr>
  </thead>
  <tbody class="text-center">
  <?php 
  $i = 0;
  $total = 0;
  while($row = $result->fetch_assoc()) {
      $i++;
      $amount=$row['price']*$row['quantity_purchased'];
      $total+=$amount;
  ?>
  <tr>
    <td class="align-middle"><?php echo $i ?></td>
    <td class="align-middle"><?php echo $row['code'] ?></td>
    <td class="align-middle"><?php echo $row['product'] ?></td>
    <td class="align-middle"><?php echo $row['quantity_purchased'] ?></td>
    <td class="align-middle"><?php echo number_format($row['price'],0,',','.').' VNĐ' ?></td>
    <td class="align-middle"><?php echo number_format($row['price']*$row['quantity_purchased'],0,',','.').' VNĐ' ?></td>
  </tr>
    <?php } ?>
  <tr>
      <th class="align-middle">Tổng</th>
      <td class="align-middle text-danger" colspan="5"><?php echo number_format($total,0,',','.').' VNĐ'?></td>
  </tr>
</table>
</div>
</div>

<?php
} else {
  //echo "0 results";
}?>