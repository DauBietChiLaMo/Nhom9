<?php
$sql = "SELECT * FROM product, category 
    WHERE product.category_id=category.category_id AND product.product_id='$_GET[id]' LIMIT 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_array()) {

?>
<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="text-center mb-5">
                <h4 class="section-title px-5"><span class="px-2">DETAILS</span></h4>
            </div>
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4"> <img src="admin/modules/product/uploads/<?php echo $row['image']; ?>" width="250px" /> </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form action="client/main/addcart.php?product_id=<?php echo $row['product_id'] ?> " method="POST">
                            <div class="product p-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center"><a style="text-decoration: none;" class="text-body fw-semibold" href="index.php"><i class="fa fa-long-arrow-left me-2"></i> <span class="ml-1">Back</span></a></div>
                                </div>
                                <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand"><?php echo $row['category']; ?></span>
                                    <h6 class="text-uppercase"><?php echo $row['product']; ?></h6>
                                    <div class="price d-flex flex-row align-items-center">
                                        <span class="act-price text-danger"><?php echo number_format($row['price'], 0, ',', '.') . " " . 'VNĐ'; ?></span>
                                    </div>
                                </div>
                                <p class="about"><?php echo $row['detail']; ?></p>
                                <div class="cart mt-4 align-items-center"> <button type="submit" class="btn btn-danger text-uppercase mr-2 px-4" name="addcart">Thêm vào giỏ hàng</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    }
} else {
    //echo "0 results";
}
?>