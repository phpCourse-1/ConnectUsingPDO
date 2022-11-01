<?php
session_start();
include 'connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hasedPassword = sha1($password);
    $q = "SELECT id,name,email from users where email = '$email' and password = '$hasedPassword' and is_admin = 1";
    $sql = $con->prepare($q);
    $sql->execute();
    $count = $sql->rowCount();
    if ($count > 0) {
        do {
            $_SESSION['name'] = $data['name'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['id'] = $data['id'];
            $_SESSION['login'] = true;
            header('Location:dashboard.php');
        } while ($data = $sql->fetch());
    } else {
        echo 'You are not autherized, Please create a new account!';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Login</title>
    <link rel="stylesheet" href="layout/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="layout/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="layout/dist/css/adminlte.min.css">
</head>

<body class="login-img3-body">

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form class="login-form py-5" action="" method="post">
                    <div class="login-wrap">
                        <p class="login-img"><i class="icon_lock_alt"></i></p>
                        <div class="input-group mb-3">
                            <span class="input-group-addon"><i class="icon_profile"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="Email" autofocus>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>

                        <button class="btn btn-primary btn-lg btn-block" name="login" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>