<div>
<div class="container d-none d-xl-block d-print-block">
    
    <?php
    if (isset($_GET['action']) && $_GET['query']) {
        $tmp = $_GET['action'];
        $query = $_GET['query'];
    } else {
        $tmp = '';
        $query = '';
    }
    if ($tmp == 'category' && $query == 'add') {
        ?>
        
        <div class="container">
        <div class="row">
            
        <?php
        include("modules/category/add.php");
        include("modules/category/listed.php");
        ?>
        </div>
        </div>
        <?php
    } elseif ($tmp == 'category' && $query == 'repair') {
        include("modules/category/repair.php");
    } elseif ($tmp == 'category' && $query == 'product') {
        include("modules/category.php");
    } elseif ($tmp == 'product' && $query == 'add') {
        ?>
        
        <div class="container">
        <div class="row">
            
        <?php
        include("modules/product/add.php");
        include("modules/product/listed.php");
        ?>
        </div>
        </div>
        <?php
    } elseif ($tmp == 'product' && $query == 'repair') {
        include("modules/product/repair.php");
    } elseif ($tmp == 'order' && $query == 'listed') {
        include("modules/order/listed.php");
    } elseif ($tmp == 'order' && $query == 'check') {
        include("modules/order/check.php");
    } elseif ($tmp == 'news' && $query == 'add') {
        include("modules/news/add.php");
    } else {
        include("modules/home.php");
    }
?>
</div>


<div style="padding-top: 35vh; padding-bottom: 35vh;" class="container d-xl-none">
    <h1 class="text-center text-warning">Vui lòng sử dụng thiết bị có màn hình (desktops, 1200px and up)</h1>
</div>
</div>
