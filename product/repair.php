<?php

$sql = "SELECT * FROM product WHERE product_id='$_GET[product_id]' LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_array()) {

?>

<div class="container d-flex justify-content-center">
  <div class="col-lg-9 my-5 text-center">
  <h5 class="text-uppercase">repair product</h5>
  <form action="modules/product/processing.php?product_id=<?php echo $row['product_id']?>" method="POST" enctype="multipart/form-data">
    <table class="table table-borderless justify-content-center">
      <tr>
        <td>
          <div class="input-group">
          <label style="width: 18%;" class="text-muted input-group-text" for="inputGroupSelect08">Tên sản phẩm</i></label>
          <input type="text" name="product" id="inputGroupSelect08" value="<?php echo $row['product']?>" class="form-control">
          </div>
        </td>
      </tr>

      <tr>
        <td>
        <div class="input-group">
          <label style="width: 18%;" class="text-muted input-group-text" for="inputGroupSelect07">Mã sản phẩm</i></label>
          <input type="text" name="code" id="inputGroupSelect07" value="<?php echo $row['code']?>" class="form-control">
          </div>
        </td>
      </tr>

      <tr>
        <td>
        <div class="input-group">
          <label style="width: 18%;" style="width: 18%;" class="text-muted input-group-text" for="inputGroupSelect06">Giá sản phẩm</i></label>
          <input type="text" name="price" id="inputGroupSelect06" value="<?php echo $row['price']?>" class="form-control">
          </div>
          </td>
      </tr>

      <tr>
        <td>
          <div class="input-group">
          <label style="width: 18%;" class="text-muted input-group-text" for="inputGroupSelect05">Số lượng</i></label>
          <input type="text" id="inputGroupSelect05" name="quantity" value="<?php echo $row['quantity']?>" class="form-control">
        
          </div>
          </td>
      </tr>

      <tr><td>
      <div class="input-group">
            <label style="width: 18%;" class="text-muted input-group-text" for="inputGroupSelect04">Tóm tắt</i></label>
            <textarea style="resize: none;" id="inputGroupSelect04" class="form-control" name="summary" rows="4"><?php echo $row['summary']?></textarea>
          </div>
          </td>
      </tr>

      <tr>
        <td>
        <div class="input-group">
            <label style="width: 18%;" class="text-muted input-group-text" for="inputGroupSelect03">Chi tiết</i></label>
            <textarea style="resize: none;" id="inputGroupSelect03" class="form-control" name="detail" rows="4"><?php echo $row['detail']?></textarea>
          </div>
          </td>
      </tr>

      <tr>
        <td>
        <div>
                  
  <!-- use opacity and height style to hide file input form -->
  
                  
  <input class="form-control  d-none" type="file" name="image" id="file_input_id" style="opacity:0;height:0;">
  <!-- use another text input group to replace file input form -->
  <div class="input-group">
    <span style="width: 18%;" class="input-group-text text-muted" id="text_input_span_id">Hình ảnh</span>

    <!-- use 'caret-color: transparent' to hide input cursor, set autocomplete to off to remove possible input hint -->
    <input style="border-top: 1px solid #ced4da!important; border-left: 1px solid #ced4da!important; border-bottom: 1px solid #ced4da!important;" type="text" id='text_input_id' class="form-control border-0" placeholder="File name" style="caret-color: transparent" autocomplete="off">
    <div style="margin-left: -1px;
    border-top-left-radius: 0;
    border-bottom-left-radius: 0; border: 1px solid #ced4da;" class="rounded-end bg-white">
    <img class="my-2 mx-2 rounded" src="modules/product/uploads/<?php echo $row['image'] ?>" height="100px" alt="">
    </div>
    
  </div>
</div>
<script>
  // bind file-input-form click action to text-input-span
  $('#text_input_span_id').click(function () {
    $("#file_input_id").trigger('click');
  })
  // bind file-input-form click action to text-input-form
  $('#text_input_id').click(function () {
    $("#file_input_id").trigger('click');
  })
  // display file name in text-input-form    
  $("#file_input_id").change(function () {            
    $('#text_input_id').val(this.value.replace(/C:\\fakepath\\/i, ''))
  })
</script>
        </td>
      </tr>
      <tr>
        <td>
          <div class="input-group">
            <label style="width: 18%;" class="text-muted input-group-text" for="inputGroupSelect01">Danh mục</i></label>
            <select class="form-select" id="inputGroupSelect01" name="category_id">
            <?php

            $sql = "SELECT * FROM category ORDER BY category_id DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_array()) {
    
          ?>
          <option class="text-capitalize" selected value="<?php echo $row['category_id']?>"><?php echo $row['category']?></option>
         
          <?php
        }
    } else {
      //echo "0 results";
    }
          ?>
            </select>

          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="input-group">
            <label style="width: 18%;" class="text-muted input-group-text" for="inputGroupSelect02">Trạng thái</i></label>
            <select class="form-select" name="status" id="inputGroupSelect02">
            <?php
            if($row['status']==1){
          ?>
            <option value="1" selected>Kích hoạt</option>
            <option value="0">Ẩn</option>
          <?php
            }else{
          ?>
            <option value="1">Kích hoạt</option>
            <option value="0" selected>Ẩn</option>
          <?php
            }
          ?>
            </select>

          </div>
        </td>
      </tr>
      <tr>
        <td><button type="submit" name="repair" class="btn btn-success">Sửa sản phẩm</button></td>
      </tr>
    </table>
  </form>
</div>
<?php }
} else {
  //echo "0 results";
} ?>
