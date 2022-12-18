<h5 class="text-center">ĐĂNG KÝ THÀNH VIÊN MỚI</h5>
<?php
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = md5($_POST['password']);
    $phone = $_POST['phone'];

    $sql = "INSERT INTO client(username,email,address,password,phone) VALUES('$username','$email','$address','$password','$phone')";

    if ($conn->query($sql) === TRUE) {
?>
        <script>
            window.location.replace("index.php?manage=login");
        </script>
<?php
    } else {
        echo '<p style="color: red; text-align: center;">Email đã tồn tại!</p>';
    }
}
?>
<div class="row d-flex justify-content-center align-items-center">
    <div style="padding-right: 15px; padding-left: 15px;" class="col-sm-6">
        <div class="mb-3">
            <form onsubmit="return checkregister()" action="" method="POST">
                <div class="d-grid gap-2">
                    <input id="username" type="text" name="username" class="form-control" placeholder="Tài khoản"><em id="checkusername"></em>
                    <input id="email" type="text" name="email" class="form-control" placeholder="Email" onchange="checkemail(this.value)"><em id="checkemail" style="color:red; font-size:9pt"></em>
                    <input id="phone" type="text" name="phone" class="form-control" placeholder="Điện thoại"><em id="checkphone"></em>
                    <input id="address" type="text" name="address" class="form-control" placeholder="Địa chỉ"><em id="checkaddress"></em>
                    <input id="password" type="password" name="password" class="form-control" placeholder="Mật khẩu"><em id="checkpassword"></em>
                    <input id="repassword" type="password" name="repassword" class="form-control" placeholder="Nhập lại mật khẩu"><em id="checkrepassword"></em>
                    <button type="submit" name="register" class="btn btn-primary">Đăng ký</button>
                </div>
            </form>
        </div>
    </div>
</div>