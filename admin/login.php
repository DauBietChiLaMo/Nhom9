<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book</title>
    <link rel="shortcut icon" href="../img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .btn {
            border-radius: 6px;
        }
    </style>

</head>

<body>
    <main class="form-signin text-center">
    <h1 class="fs-1 text-warning fw-semibold ">Book</h1>
        <?php
        session_start();
        include('config/conn.php');
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password' LIMIT 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                $_SESSION['admin'] = $username;
                
                ?>
                <script>
                    window.location.replace("index.php");
                </script>       
                <?php
            
            } else {
                echo '<p style="color: red; text-align: center;">Tài khoản mật khẩu không chính xác!</p>';
            }  
        } 
        ?>
        <form action="" autocomplete="off" method="POST">
            <div class="form-floating">
                <input type="text" name="username" class="form-control mb-2" placeholder="Tài khoản">
                <label for="floatingInput">Account</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control mb-2" placeholder="Mật khẩu">
                <label for="floatingPassword">Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Đăng nhập</button>
        </form>
    </main>
</body>

</html>