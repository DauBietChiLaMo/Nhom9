<?php
if (isset($_SESSION['login'])) {
    $account = $_SESSION['login'];

    $sql = "SELECT * FROM client WHERE username ='$account' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_array(); 

?>

<style>
    .testclass:hover {
        background-color: #eae8e8;
    }
</style>

<div class="row d-flex justify-content-center align-items-center">
    <div style="padding-right: 15px; padding-left: 15px;" class="col-sm-6 bg-light border rounded">
        <div class="mb-3">
            <div class="d-flex justify-content-center align-items-center pt-3">
                <h4 class="fw-bold mb-0 text-blacks">Tài Khoản</h4>
            </div>
            <hr class="my-3">

            <div class="p-2 mb-2">

                <p class="fs-6 mb-0 text-muted"><i style="padding-right: 10px;" class="fs-6 fa-solid fa-user"></i><?php echo $row['username']; ?></p>

            </div>
            <div class="p-2 mb-2">

                <p class="fs-6 mb-0 text-muted"><i style="padding-right: 10px;" class="fs-6 fa-solid fa-phone"></i></i>Số điện thoại: <?php echo $row['phone']; ?></p>
            </div>
            <div class="p-2 mb-2">

                <p class="fs-6 mb-0 text-muted"><i style="padding-right: 10px;" class="fs-6 fa-solid fa-envelope"></i>Email: <?php echo $row['email']; ?></p>
            </div>
            <a style="text-decoration: none;" href="index.php?manage=changepassword" class="fs-6 mb-0 text-muted">
                <div class="p-2 mb-2 testclass rounded">
                    <i style="padding-right: 10px;" class="fs-6 fa-solid fa-lock"></i>Thay đổi mật khẩu
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-dark"><a style="text-decoration: none;" class="d-grid text-light" href="index.php?logout=1">Đăng xuất</a></button>
                </div>

            </a>
        </div>
    </div>
</div>
</div>

<?php
} else {
    //echo "0 results";
    }
}
?>