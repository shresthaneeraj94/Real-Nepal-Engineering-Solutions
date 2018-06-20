<?php
session_start();
if (isset($_SESSION['user']) || isset($_COOKIE['user'])) {
    if (isset($_COOKIE['user'])) {
        $_SESSION['user'] = $_COOKIE['user'];
    }
    header('Location: //' . $_SERVER['SERVER_NAME'] . '/@dmin/home');
    die;
}

require_once 'DBConnect.php';

if (empty($_POST)) {
    header('Location: //' . $_SERVER['SERVER_NAME'] . '/@dmin/');
    $_SESSION['login_msg'] = 'Login Failed';
    die;
}

$user = $_POST['username'];
$pass = md5($_POST['password']);
$rem = isset($_POST['remember']) ? 'ok' : 'not';

if (empty($user) || empty($pass)) {
    $_SESSION['login_msg'] = "Username/Password can't be empty";
} else {
    $sql = "SELECT Username, Password FROM admin WHERE Username=? AND Password=? ";
    $query = $conn->prepare($sql);
    $query->execute(array($user, $pass));

    if ($query->rowCount() >= 1) {
        $_SESSION['user'] = $user;
        $_SESSION['login_msg'] = 'Welcome to Admin Panel';
        if ($rem === 'ok') {
            setcookie('remember', $user, time() + 86400,'/');
        }
        header('Location: //' . $_SERVER['SERVER_NAME'] . '/@dmin/home');
    } else {
        $_SESSION['login_msg'] = 'Incorrect Username or Password';
        header('Location: //' . $_SERVER['SERVER_NAME'] . '/@dmin/');
    }
}

?>
