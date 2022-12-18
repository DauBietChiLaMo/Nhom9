<?php
session_start();
include('../../admin/config/conn.php');

//add
if (isset($_GET['add'])) {
    $id = $_GET['add'];
    foreach ($_SESSION['cart'] as $item) {
        if ($item['id'] != $id) {
            $product[] = array(
                'product' => $item['product'], 'id' => $item['id'],
                'quantity' => $item['quantity'], 'price' => $item['price'], 'image' => $item['image'], 'code' => $item['code']
            );
            $_SESSION['cart'] = $product;
        } else {
            $add = $item['quantity'] + 1;
            if ($item['quantity'] < 100) {
                $product[] = array(
                    'product' => $item['product'], 'id' => $item['id'],
                    'quantity' => $add, 'price' => $item['price'], 'image' => $item['image'], 'code' => $item['code']
                );
            } else {
                $product[] = array(
                    'product' => $item['product'], 'id' => $item['id'],
                    'quantity' => $item['quantity'], 'price' => $item['price'], 'image' => $item['image'], 'code' => $item['code']
                );
            }
            $_SESSION['cart'] = $product;
        }
    }
?>
    <script>
        window.location.replace("../../index.php?manage=cart");
    </script>
<?php
}

//subtract
if (isset($_GET['subtract'])) {
    $id = $_GET['subtract'];
    foreach ($_SESSION['cart'] as $item) {
        if ($item['id'] != $id) {
            $product[] = array(
                'product' => $item['product'], 'id' => $item['id'],
                'quantity' => $item['quantity'], 'price' => $item['price'], 'image' => $item['image'], 'code' => $item['code']
            );
            $_SESSION['cart'] = $product;
        } else {
            $add = $item['quantity'] - 1;
            if ($item['quantity'] > 1) {
                $product[] = array(
                    'product' => $item['product'], 'id' => $item['id'],
                    'quantity' => $add, 'price' => $item['price'], 'image' => $item['image'], 'code' => $item['code']
                );
            } else {
                $product[] = array(
                    'product' => $item['product'], 'id' => $item['id'],
                    'quantity' => $item['quantity'], 'price' => $item['price'], 'image' => $item['image'], 'code' => $item['code']
                );
            }
            $_SESSION['cart'] = $product;
        }
    }
?>
    <script>
        window.location.replace("../../index.php?manage=cart");
    </script>
    <?php
}

//delete
if (isset($_SESSION['cart']) && isset($_GET['delete'])) {
    $id = $_GET['delete'];
    foreach ($_SESSION['cart'] as $item) {
        if ($item['id'] != $id) {
            $product[] = array(
                'product' => $item['product'], 'id' => $item['id'],
                'quantity' => $item['quantity'], 'price' => $item['price'], 'image' => $item['image'], 'code' => $item['code']
            );
        }
        $_SESSION['cart'] = $product;
    ?>
        <script>
            window.location.replace("../../index.php?manage=cart");
        </script>
    <?php
    }
}

//delete all
if (isset($_GET['deleteall']) && $_GET['deleteall'] == 1) {
    unset($_SESSION['cart']);
    ?>
    <script>
        window.location.replace("../../index.php?manage=cart");
    </script>
<?php
}

//add product
if (isset($_POST['addcart'])) {
    $id = $_GET['product_id'];
    // echo ".$id.";
    $quantity = 1;

    $sql = "SELECT * FROM product WHERE product_id='$id' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_array();
        if ($row) {
            $productnew = array(array(
                'product' => $row['product'], 'id' => $id,
                'quantity' => $quantity, 'price' => $row['price'], 'image' => $row['image'], 'code' => $row['code']
            ));
            //check exist session
            if (isset($_SESSION['cart'])) {
                $found = false;
                foreach ($_SESSION['cart'] as $item) {
                    //if duplicate data
                    if ($item['id'] == $id) {
                        $product[] = array(
                            'product' => $item['product'], 'id' => $item['id'],
                            'quantity' => $quantity + 1, 'price' => $item['price'], 'image' => $item['image'], 'code' => $item['code']
                        );
                        $found = true;
                        //if unduplicate data
                    } else {
                        $product[] = array(
                            'product' => $item['product'], 'id' => $item['id'],
                            'quantity' => $item['quantity'], 'price' => $item['price'], 'image' => $item['image'], 'code' => $item['code']
                        );
                    }
                }
                //link old product with new product
                if ($found == false) {
                    $_SESSION['cart'] = array_merge($product, $productnew);
                } else {
                    $_SESSION['cart'] = $product;
                }
            } else {
                $_SESSION['cart'] = $productnew;
            }
        }
    } else {
        //echo "0 results";
    }
    ?>
    <script>
        window.location.replace("../../index.php?manage=cart");
    </script>
<?php
}
?>