<?php
include('../../config/conn.php');
$category = $_POST['category'];
$position = $_POST['position'];
if(isset($_POST['add'])){
    //add

    $sql = "INSERT INTO category (category,position) VALUE('$category','$position')";

    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
        ?>
        <script>
            window.location.replace("../../index.php?action=category&query=add");
        </script>       
        <?php
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
}elseif(isset($_POST['repair'])){
    //repair

    $sql = "UPDATE category SET category='$category', position='$position' WHERE category_id='$_GET[category_id]'";

    if ($conn->query($sql) === TRUE) {
        //echo "Record updated successfully";
        ?>
        <script>
            window.location.replace("../../index.php?action=category&query=add");
        </script>       
        <?php
    } else {
        //echo "Error updating record: " . $conn->error;
    }

}else{
    $id=$_GET['category_id'];

    $sql = "DELETE FROM category WHERE category_id='$id'";

    if ($conn->query($sql) === TRUE) {
        //echo "Record deleted successfully";
        ?>
        <script>
            window.location.replace("../../index.php?action=category&query=add");
        </script>       
        <?php
    } else {
        //echo "Error deleting record: " . $conn->error;
    } 
}
?>