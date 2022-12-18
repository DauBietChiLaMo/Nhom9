<div class="col-lg-3 my-5 text-center">
<h5 class="text-uppercase">add category</h5>
<form action="modules/category/processing.php" method="POST">
<table class="table table-borderless justify-content-center">
  <tr>
      <td><input type="text" class="form-control" placeholder="Tên danh mục" name="category"></td>
  </tr>
  <tr>
      <td><input type="text" class="form-control" placeholder="Thứ tự" name="position"></td>
  </tr>
  <tr>
    <td><input type="submit" class="btn btn-success" name="add" value="Thêm danh mục sản phẩm"></td>
  </tr>
</table>
</form>
</div>