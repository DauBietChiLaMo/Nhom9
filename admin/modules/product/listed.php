<div class="col-lg-6 my-5">
  <h5 class="text-uppercase text-center">product recently</h5>
  <div class="bg-white border rounded mt-3">
    <table class="table table-hover mt-2 table-borderless ">
      <?php
      $sql = "SELECT * FROM product, category WHERE product.category_id=category.category_id ORDER BY product.product_id DESC LIMIT 1";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_array()) {

      ?>
          <tr>
            <th class="align-middle col-2">Tên sản phẩm</th>
            <td class="align-middle col-10"><?php echo $row['product'] ?></td>
          </tr>
          <tr>
            <th class="align-middle">Hình ảnh</th>
            <td class="align-middle"><img height="100px" class="rounded" src="modules/product/uploads/<?php echo $row['image'] ?>" alt=""></td>
          </tr>
          <tr>
            <th class="align-middle">Giá</th>
            <td class="align-middle"><?php echo $row['price'] ?></td>
          </tr>
          <tr>
            <th class="align-middle">Số lượng</th>
            <td class="align-middle"><?php echo $row['quantity'] ?></td>
          </tr>
          <tr>
            <th class="align-middle">Danh mục</th>
            <td class="align-middle"><?php echo $row['category'] ?></td>
          </tr>
          <tr>
            <th class="align-middle">Mã</th>
            <td class="align-middle"><?php echo $row['code'] ?></td>
          </tr>
          <tr>
            <th class="align-middle col-3">Tóm tắt</th>
            <td class="align-middle col-3"><textarea disabled style="resize: none;" class="form-control" rows="3"><?php echo $row['summary'] ?></textarea></td>
          </tr>
          <tr>
            <th class="align-middle col-3">Chi tiết</th>
            <td class="align-middle col-3"><textarea disabled style="resize: none;" class="form-control" rows="3"><?php echo $row['detail'] ?></textarea></td>
          </tr>
          <tr>
            <th class="align-middle">Trạng thái</th>
            <td class="align-middle"><?php if ($row['status'] == 1) {
                                        echo '<span class="fs-5 text-muted"><i class="fa-solid fa-circle-check"></i></span>';
                                      } else {
                                        echo '<span class="fs-5 text-muted"><i class="fa-solid fa-circle-xmark"></i></span>';
                                      } ?>
            </td>
          </tr>
          <tr>
            <th class="align-middle">Quản lý</th>
            <td class="align-middle">
              <a class="fs-5 text-dark mx-2" href="modules/product/processing.php?product_id=<?php echo $row['product_id'] ?>"><i class="fa-solid fa-trash"></i></a>
              <a class="fs-5 text-dark mx-2" href="?action=product&query=repair&product_id=<?php echo $row['product_id'] ?>"><i class="fa-solid fa-wrench"></i></a>
            </td>
          </tr>
      <?php
        }
      } else {
        //echo "0 results";
      } ?>
    </table>
  </div>
</div>