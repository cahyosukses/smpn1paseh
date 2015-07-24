<?php 
  include_once '../koneksi.php';
  koneksi();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" href="ic_launcher.ico">
    <title>Login Admin</title>

    <!-- Bootstrap -->
    <!-- <link href="css/bootstrap.css" rel="stylesheet"> -->
    <!-- <link href="css/edited.css" rel="stylesheet"> -->
    <link href="../assets/css/login_admin.css" rel="stylesheet">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../assets/js/jquery-2.1.4.js"></script>
    <!-- font awesome -->
    <link href="../assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/normalize.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="judul bounceInDown">Login Admin</div>
        <div class="login-container animated flipInY">
            <img src="../assets/img/pasone.png" width="200">
            <div class="form-box">
                <hr>
                <form action="login_proses.php" method="POST">
                    <input type="text" name="username" placeholder="Username" id="user" required>
                    <input type="password" name="password" placeholder="Password" id="pass" required>
                    <button class="btn" type="submit" id="login" name="login">Login</button>
                </form>
            </div>
        </div>
    </div>


    
</body>
</html>