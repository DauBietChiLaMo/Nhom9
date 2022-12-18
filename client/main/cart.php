<?php
if (isset($_SESSION['cart'])) {
}
?>
<section class="h-100 h-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h4 class="fw-bold text-black">GIỎ HÀNG</h4>
                    <h6 class="mb-0 text-muted">
                      <?php
                        if (isset($_SESSION['login'])) {
                          echo '<span> ' . $_SESSION['login'] . '</span>';
                        }
                        ?>
                  </h6>
                  </div>
                  <hr class="my-4">
                  <?php
                  if (isset($_SESSION['cart'])) {
                    $i = 0;
                    $total = 0;
                    foreach ($_SESSION['cart'] as $cart) {
                      $amount = $cart['quantity'] * $cart['price'];
                      $total += $amount;
                      $i++;
                  ?>
                      <div class="row mb-4 d-flex justify-content-between align-items-center">
                        <div class="col-md-2 col-lg-2 col-xl-2">
                          <img src="admin/modules/product/uploads/<?php echo $cart['image'] ?>" class="img-fluid rounded-3" alt="">
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-3">
                          <h6 class="text-black mb-0"><?php echo $cart['product'] ?></h6>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex gap-1 mb-3 pt-3">
                          <button class="btn btn-sm btn-outline-warning btn-minus">
                            <a href="client/main/addcart.php?subtract=<?php echo $cart['id'] ?>"><i class="fa fa-minus" aria-hidden="true"></i></a>
                          </button>

                          <input value="<?php echo $cart['quantity'] ?>" type="text" style="width: 40px;" class="text-center form-control form-control-sm" />

                          <button class="btn btn-sm btn-outline-warning btn-plus">
                            <a href="client/main/addcart.php?add=<?php echo $cart['id'] ?>"><i class="fa fa-plus" aria-hidden="true"></i></a>
                          </button>
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                          <h6 class="mb-0"><?php echo number_format($amount, 0, ',', '.') . ' VNĐ' ?></h6>
                        </div>
                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                          <a href="client/main/addcart.php?delete=<?php echo $cart['id'] ?>" class="text-muted"><i class="fa-solid fa-trash"></i></a>
                        </div>
                      </div>
                      <hr class="my-4">
                    <?php } ?>


                    <div class="pt-4">
                      <h6 class="mb-0"><a style="text-decoration: none;" href="index.php" class="text-body fw-semibold"><i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                    </div>
                </div>
              </div>
              <div class="col-lg-4" style="background-color: #eae8e8;">
                <div class="p-5">
                  <h4 class="fw-bold mb-5 mt-2 pt-1 text-center">THANH TOÁN</h4>
                  <hr class="my-4">

                  <div class="d-flex justify-content-between">
                    <h5 class="text-dark">Tổng</h5>
                    <h5><?php echo number_format($total, 0, ',', '.') . ' VNĐ' ?></h5>
                  </div>
                  <hr class="my-4">
                  <div class="d-grid gap-2">
                    <?php
                    if (isset($_SESSION['login'])) {
                    ?>
                      <button type="button" class="btn btn-success btn-block btn-lg"><a style="text-decoration: none;" class="d-grid text-light" href="client/main/pay.php">Đặt hàng</a></button>
                    <?php } else { ?>
                      <button type="button" class="btn btn-success btn-block btn-lg"><a style="text-decoration: none;" class="d-grid text-light" href="index.php?manage=login">Đăng nhập đặt hàng</a></button>
                    <?php } ?>

                  </div>
                </div>
              </div>
            <?php
                  } else { ?>
              <div class="row mb-4 d-flex justify-content-between align-items-center">
                <p class="text-center fw-semibold text-muted">Giỏ hàng rỗng</p>
              </div>
            <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>