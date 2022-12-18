<?php
session_start();
include('../../admin/config/conn.php');
$client_id = $_SESSION['client_id'];
$code = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10);

$sql = "INSERT INTO cart(client_id,code,status) VALUE('$client_id','$code',1)";

if ($conn->query($sql) === TRUE) {
    foreach ($_SESSION['cart'] as $key => $value) {
        $product_id = $value['id'];
        $quantity_purchased = $value['quantity'];
        $sql = "INSERT INTO orders(code,product_id,quantity_purchased) VALUE('$code','$product_id','$quantity_purchased')";
            echo ".$sql.";
        $conn->query($sql);
    }
}else {
    //echo "0 results";
}
unset($_SESSION['cart']);
?>
<script>
    window.location.replace("../../index.php?manage=thank");
</script>