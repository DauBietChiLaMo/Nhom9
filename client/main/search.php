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
if (isset($_POST['search'])) {
    $keyword = $_POST['keyword'];
}
?>
<!-- Products Start -->
<div class="container-fluid">
    <div class="text-center mb-5">
        <h4 class="section-title px-5 text-uppercase"><span class="px-2">Kết quả tìm kiếm</span></h4>
    </div>

    <div class="row px-xl-5 pb-3">
        <?php
            $sql = "SELECT * FROM product, category 
            WHERE product.category_id=category.category_id AND product.status='1' AND product.product LIKE '%$keyword%' ORDER BY product.product_id DESC LIMIT $begin,$p";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_array()) {

        ?>
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <a style="text-decoration: none;" href="index.php?quanly=sanpham&id=<?php echo $row['product_id'] ?>" class="card-link">
                        <div class="product-item border-0 mb-4">
                            <div class="card border-0 text-center">
                                <div class="position-relative overflow-hidden bg-transparent">
                                    <img style="height: 250px; width: auto;" class="rounded img-fluid" src="admin/modules/product/uploads/<?php echo $row['image']; ?>" alt="">
                                </div>

                                <div style="height: 100px;" class="card-body">
                                    <h6 class="card-title"><?php echo $row['product']; ?></h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item text-danger pb-4"><?php echo number_format($row['price'], 0, ',', '.') . " " . 'VNĐ'; ?></li>
                                </ul>
                            </div>
                        </div>
                    </a>
                </div>
            
        <?php
            }
        } else {
            echo '<p class="text-muted text-center">Không kết quả phù hợp</p>';
        }
        ?>
    </div>
</div>
<!-- Products End -->

<nav>
    <ul class="pagination justify-content-center pagination-sm">
        <?php
        $sql = "SELECT * FROM product, category
        WHERE product.category_id=category.category_id AND product.status='1' AND product.product LIKE '%$keyword%'";
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