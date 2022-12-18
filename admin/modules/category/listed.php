<div class="col-lg-9 my-5">
<h5 class="text-uppercase text-center">category list</h5>
<div class="bg-white border rounded mt-3">
<table class="table table-hover mt-2 table-borderless ">
  <thead class="text-center table-hover thead-light">
    <tr>
      <th class="align-middle col-2">#Id</th>
      <th class="align-middle">Tên danh mục</th>
      <th class="align-middle">Quản lý</th>
    </tr>
  </thead>
  <tbody class="text-center">
  <?php 
  $sql = "SELECT * FROM category ORDER BY position ASC";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    // output data of each row
    $i = 0;
    while($row = $result->fetch_array()) {
    $i++;
  ?>
  <tr>
  <td><?php echo $i ?></td>
    <td><?php echo $row['category'] ?></td>
    <td>
        <a class="fs-5 text-dark mx-2" href="modules/category/processing.php?category_id=<?php echo $row['category_id']?>"><i class="fa-solid fa-trash"></i></a>
        <a class="fs-5 text-dark mx-2" href="?action=category&query=repair&category_id=<?php echo $row['category_id']?>"><i class="fa-solid fa-wrench"></i></a>
    </td>
  </tr>
   
    <?php
    }
    } else {
      //echo "0 results";
    }
    ?>
</table>
</div>
</div>