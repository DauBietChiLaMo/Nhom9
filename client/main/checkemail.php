<?php
    include('../../admin/config/conn.php');
    $email=$_GET['email'];

    $sql = "SELECT email FROM client WHERE email='$email';";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    
        echo "Email đã tồn tại!";

    } else {
        echo "";
    }
?>
