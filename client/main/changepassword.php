<h6 class="text-center">ĐỔI MẬT KHẨU</h6>
<?php
if (isset($_POST['changepassword'])) {
    $email = $_POST['email'];
    $oldpassword = md5($_POST['oldpassword']);
    $newpassword = md5($_POST['newpassword']);

    $sql = "SELECT * FROM client WHERE email='$email' AND password='$oldpassword' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
        $sql = "UPDATE client SET password='$newpassword' WHERE email='$email'";

        if ($conn->query($sql) === TRUE) {
            echo '<p style="color: green; text-align: center;">Đổi mật khẩu thành công!</p>';
        } else {
            //echo "Error updating record: " . $conn->error;
        }

    } else {
        echo '<p style="color: red; text-align: center;">Đổi mật khẩu không thành công!</p>';
    }
}
?>
<div class="row d-flex justify-content-center align-items-center">
    <div style="padding-right: 15px; padding-left: 15px;" class="col-sm-6">
        <div class="mb-3">
            <form action="" autocomplete="off" method="POST">
                <div class="d-grid gap-2">
                    <input type="text" name="email" class="form-control" placeholder="Tài khoản">
                    <input type="password" name="oldpassword" class="form-control" placeholder="Mật khẩu">
                    <input type="password" name="newpassword" class="form-control" placeholder="Mật khẩu">
                    <button type="submit" name="changepassword" class="btn btn-dark">Đổi mật khẩu</button>
                </div>
            </form>
        </div>
    </div>
</div>