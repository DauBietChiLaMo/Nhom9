<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Book</title>
  <link rel="shortcut icon" href="img/logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/form.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function(event) {
      var scrollpos = sessionStorage.getItem('scrollpos');
      if (scrollpos) {
        window.scrollTo(0, scrollpos);
        sessionStorage.removeItem('scrollpos');
      }
    });

    window.addEventListener("beforeunload", function(e) {
      sessionStorage.setItem('scrollpos', window.scrollY);
    });
  </script>
</head>

<body class="bg-light">
  <?php
  session_start();
  include("admin/config/conn.php");
  include("client/header.php");
  include("client/menu.php");
  include("client/main.php");
  include("client/footer.php");
  ?>
</body>

</html>