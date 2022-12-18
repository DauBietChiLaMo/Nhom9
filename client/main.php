 <div style="padding-top: 50px; padding-bottom: 50px;" class="container">
    <?php
    if (isset($_GET['manage'])) {
        $temp = $_GET['manage'];
    } else {
        $temp = '';
    }
    if ($temp == 'category') {
        include("main/category.php");
    } elseif ($temp == 'cart') {
        include("main/cart.php");
    } elseif ($temp == 'news') {
        include("main/news.php");
    } elseif ($temp == 'contact') {
        include("main/contact.php");
    } elseif ($temp == 'product') {
        include("main/product.php");
    } elseif ($temp == 'login') {
        include("main/login.php");
    } elseif ($temp == 'register') {
        include("main/register.php");
    } elseif ($temp == 'account') {
        include("main/account.php");
    } elseif ($temp == 'search') {
        include("main/search.php");
    } elseif ($temp == 'thank') {
        include("main/thank.php");
    } elseif ($temp == 'changepassword') {
        include("main/changepassword.php");
    } elseif ($temp == 'intro') {
        include("main/intro.php");
    } else {
        include("main/home.php");
    }
    ?>
 </div>