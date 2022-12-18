<nav class="py-3 mb-4 border-bottom fw-semibold nav nav-underline" aria-label="Secondary navigation">
  <div class="container d-flex flex-wrap justify-content-center">
    <a href="index.php" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
      <span class="fs-1 text-warning fw-semibold">Book</span>
    </a>
    <form style="box-shadow: 0 0 5px 0 rgb(102 102 102 / 40%); padding:5px; border-radius: 10px;" class="col-12 col-lg-auto mb-3 mb-lg-0 d-flex" action="index.php?manage=search" method="POST">
      <input style="box-shadow: none;" class="bg-light form-control me-2 border border-0" type="text" placeholder="Tìm kiếm..." name="keyword">
      <button class="btn btn-outline border border-0" type="submit" name="search"><i class="fa fa-search"></i></button>
    </form>
  </div>
</nav>