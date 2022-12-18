<?php
include('../../config/conn.php');
$product = addslashes($_POST['product']);
$code = addslashes( $_POST['code']);
$price = addslashes($_POST['price']);
$quantity = addslashes($_POST['quantity']);
$summary = addslashes($_POST['summary']);
$detail = addslashes($_POST['detail']);
$status = addslashes($_POST['status']);
$category_id = addslashes($_POST['category_id']);

$image = $_FILES['image']['name'];
$image_tmp = $_FILES['image']['tmp_name'];
$image = time().'_'.$image;

if(isset($_POST['add'])){
    // add
    $sql = "INSERT INTO product(product,code,price,quantity,image,summary,detail,status,category_id) 
    VALUE('$product','$code','$price','$quantity','$image','$summary','$detail','$status','$category_id')";

    if ($conn->query($sql) === TRUE) {
    // echo "New record created successfully";
    move_uploaded_file($image_tmp,'uploads/'.$image);
    ?>
    <script>
        window.location.replace("../../index.php?action=product&query=add");
    </script>       
    <?php
    } else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
    }

}elseif(isset($_POST['repair'])){
    // repair
    if($image_tmp!=''){
        move_uploaded_file($image_tmp,'uploads/'.$image);

        $update = "UPDATE product SET product='$product', code='$code', price='$price', quantity='$quantity', image='$image', summary='$summary', detail='$detail', status='$status', category_id='$category_id' 
        WHERE product_id='$_GET[product_id]'";
       
        $sql = "SELECT * FROM product WHERE product_id='$_GET[product_id]' LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_array()) {
            unlink('uploads/'.$row['image']);
        }
        } else {
        //echo "0 results";
        }

    }else{

        $update = "UPDATE product SET product='$product', code='$code', price='$price', quantity='$quantity', summary='$summary', detail='$detail', status='$status',category_id='$category_id'
        WHERE product_id='$_GET[product_id]'";
    } 
    
    if ($conn->query($update) === TRUE) {
        //echo "Record updated successfully";
    } else {
        //echo "Error updating record: " . $conn->error;
    }

    ?>
    <script>
        window.location.replace("../../index.php?action=product&query=add");
    </script>       
    <?php
   
}else{
    $id=$_GET['product_id'];

    $sql = "SELECT * FROM product WHERE product_id='$id' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_array()) {
        unlink('uploads/'.$row['image']);
    }
    } else {
    //echo "0 results";
    }

    $sql = "DELETE FROM product WHERE product_id='$id'";

    if ($conn->query($sql) === TRUE) {
        //echo "Record deleted successfully";
      ?>
    <script>
            window.location.replace("../../index.php?action=product&query=add");
        </script>       
    <?php
    } else {
      //echo "Error deleting record: " . $conn->error;
    }
}
?>