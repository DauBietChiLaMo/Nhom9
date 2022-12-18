<?php
if (isset($_GET['logout']) && $_GET['logout'] == 1) {
  unset($_SESSION['admin']);
?>
  <script>
    window.location.replace("login.php");
  </script>
<?php
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
        <li class="nav-item"><a href="index.php?action=order&query=listed" class="icon fs-5 navbar-nav nav-link px-2">ORDER</a></li>
        <li class="nav-item"><a href="index.php?action=category&query=add" class="icon fs-5 navbar-nav nav-link px-2">ADD CATEGORY</a></li>
        <li class="nav-item"><a href="index.php?action=product&query=add" class="icon fs-5 navbar-nav nav-link  px-2">ADD PRODUCT</a></li>
        <li class="nav-item">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <span class="fs-5 nav-link px-2 icon">
                PRODUCTS LIST
              </span>
              <ul class="dropdown-menu dropdown-menu-light">
                <?php

                $sql = "SELECT * FROM category ORDER BY category_id ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_array()) {
                ?>
                  <li><a class="fs-6 text-muted dropdown-item text-uppercase fw-semibold" href="index.php?action=category&query=product&id=<?php echo $row['category_id'] ?>"><?php echo $row['category'] ?></a></li>

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
        <li class="nav-item"><a href="index.php?action=news&query=add" class="icon fs-5 navbar-nav nav-link  px-2">ADD NEWS</a></li>
      </ul>
      <a href="index.php?logout=1" class="icon fs-5 navbar-nav nav-link px-2"><i class="fa-solid fa-right-from-bracket"></i></a>
    </div>
  </div>
</nav>

<style>
  .icon:hover {
    color: #ffc107;
  }
</style>