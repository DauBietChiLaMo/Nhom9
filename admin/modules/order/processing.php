<?php
    include('../../config/conn.php');
    if(isset($_GET['code'])){
        $status = 0;
        $code = $_GET['code'];

        $sql = "UPDATE cart SET status='$status' WHERE code='$code'";

        if ($conn->query($sql) === TRUE) {
        //echo "Record updated successfully";
        ?>
        <script>
            window.location.replace("../../index.php?action=order&query=listed");
        </script>       
        <?php
        } else {
        //echo "Error updating record: " . $conn->error;
        }
       
    }
?>
