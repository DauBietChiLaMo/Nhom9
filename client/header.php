<?php
if (isset($_GET['logout']) && $_GET['logout'] == 1) {
  unset($_SESSION['login']);
  unset($_SESSION['cart']);
  unset($_SESSION['client_id']);
}
?>
<style>
  .dropdown:hover .dropdown-menu {
    display: block;
  }

  .icon:hover {
    color: #ffc107;
  }
</style>
<nav style="background-color: #eae8e8;" class="navbar navbar-expand-lg sticky-top border-bottom fw-semibold">
  <div class="container">
    <a href="index.php" class="icon navbar-nav fs-5 nav-link px-2" aria-current="page"><i class="fa-solid fa-house"></i></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="nav navbar-nav me-auto">
        <li class="nav-item">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <span class="fs-5 nav-link px-2 icon">
                SHOP
              </span>
              <ul class="dropdown-menu dropdown-menu-light">

                <?php
                $sql = "SELECT * FROM category ORDER BY category_id ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while ($row = $result->fetch_array()) {
                ?>
                  <li><a class="fs-6 text-muted dropdown-item text-uppercase fw-semibold" href="index.php?manage=category&id=<?php echo $row['category_id'] ?>"><?php echo $row['category'] ?></a></li>
                
                <?php
                  }
                } else {
                  //echo "0 results";
                }
                ?>

              </ul>
            </li>
          </ul>
        </li>
        <li class="nav-item"><a href="index.php?manage=news" class="icon fs-5 navbar-nav nav-link px-2">NEWS</a></li>
        <li class="nav-item"><a href="index.php?manage=contact" class="icon fs-5 navbar-nav nav-link px-2">CONTACT</a></li>
        <li class="nav-item"><a href="index.php?manage=intro" class="icon fs-5 navbar-nav nav-link  px-2">ABOUT</a></li>
      </ul>
      <ul class="nav">
        <?php if (isset($_SESSION['login'])) { ?>
          <li class="nav-item"><a href="index.php?manage=account" class="icon fs-5 navbar-nav nav-link px-2"><i class="fa-solid fa-user"></i></a></li>
        <?php } else { ?>
          <li class="nav-item"><a href="index.php?manage=login" class="icon fs-5 navbar-nav nav-link px-2"><i class="fa-solid fa-user"></i></a></li>
        <?php } ?>
        <li class="nav-item"><a href="index.php?manage=cart" class="icon fs-5 navbar-nav nav-link px-2"><i class="fa-solid fa-cart-shopping"></i></a></li>
      </ul>
    </div>
  </div>
</nav>