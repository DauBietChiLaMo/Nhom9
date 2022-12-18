<?php
$sql = "SELECT * FROM category WHERE category_id='$_GET[category_id]' LIMIT 1";
$result = $conn->query($sql);
?>
<div class="container d-flex justify-content-center">
  <div class="col-lg-9 my-5 text-center">
  <h5 class="text-uppercase">repair category</h5>
  <form action="modules/category/processing.php?category_id=<?php echo $_GET['category_id'] ?>" method="POST">
    <table class="table table-borderless justify-content-center">
    <?php
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_array()) {

    ?>
      <tr>
        <td>
          <div class="input-group">
          <label style="width: 18%;" class="text-muted input-group-text" for="inputGroupSelect09">Tên danh mục</i></label>
          <input type="text" id="inputGroupSelect09" value="<?php echo $row['category']?>" name="category" class="form-control">
          </div>
        </td>
      </tr>

      <tr>
        <td>
        <div class="input-group">
          <label style="width: 18%;" class="text-muted input-group-text" for="inputGroupSelect10">Thứ tự</i></label>
          <input type="text" id="inputGroupSelect10" value="<?php echo $row['position']?>" name="position" class="form-control">
          </div>
        </td>
      </tr>

      <tr>
        <td><button type="submit" name="repair" class="btn btn-success">Sửa sản phẩm</button></td>
      </tr>
    <?php
      }
    } else {
      //echo "0 results";
    }
    ?>
    </table>
    </form>
    </div>
</div>