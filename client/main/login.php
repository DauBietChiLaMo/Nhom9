<h5 class="text-center">ĐĂNG NHẬP</h5>
<?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM client WHERE email='$email' AND password='$password' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_array();
    $_SESSION['login'] = $row['username'];
    $_SESSION['client_id'] = $row['client_id'];
?>
        <script>
            window.location.replace("index.php?manage=cart");
        </script>
        
<?php
    } else {
        echo '<p style="color: red; text-align: center;">Tài khoản mật khẩu không chính xác!</p>';
    }
}
?>
<div class="row d-flex justify-content-center align-items-center">
    <div style="padding-right: 15px; padding-left: 15px;" class="col-sm-6">
        <div class="mb-3">
            <form action="" autocomplete="off" method="POST">
                <div class="d-grid gap-2">
                    <input type="text" name="email" class="form-control" placeholder="Email">
                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                    <button type="submit" name="login" class="btn btn-primary">Đăng nhập</button>
                </div>
            </form>
            <hr class="my-3">
            <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-success"><a style="text-decoration: none;" class="d-grid text-light" href="index.php?manage=register">Tạo tài khoản mới</a></button>

            </div>
        </div>
    </div>
</div>