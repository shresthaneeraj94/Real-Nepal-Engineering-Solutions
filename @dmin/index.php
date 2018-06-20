<?php
session_start();
if (isset($_COOKIE['remember'])) {
    $_SESSION['user'] = $_COOKIE['remember'];
}
if (isset($_SESSION['user'])) {
    header('Location: //' . $_SERVER['SERVER_NAME'] . '/@dmin/home');
    die;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RNES - Admin Panel</title>
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <style>
        body {
            background: whitesmoke;
        }

        form {
            padding: 50px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="text-center">
                <h1>Real Nepal Engineering Solutions</h1>
                <img src="docs/logo.png" alt="">
                <h3>Admin Panel Login</h3>
            </div>
            <form action="action/loginAction.php" method="post">
                <label><i class="fa fa-user"></i> Username : </label>
                <input name="username" type="text" placeholder="username" class="form-control" required>
                <label><i class="fa fa-key"></i> Password : </label>
                <input name="password" type="password" placeholder="password" class="form-control" required>
                <br>
                <input type="checkbox" name="remember" value="true"> <label><i class="fa fa-thumb-tack"></i> Stay Signed
                    In</label>
                <hr>
                <?php
                if (isset($_SESSION['login_msg'])) {
                    echo "<div class='alert alert-danger'>" . $_SESSION['login_msg'] . "</div>";
                    session_destroy();
                }
                ?>
                <button class="btn btn-info btn-block" type="submit">Login</button>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

</body>
</html>