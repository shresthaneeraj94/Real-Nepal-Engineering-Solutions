<?php
session_start();

if (!isset($_SESSION['user'])) {
    if (isset($_COOKIE['remember'])) {
        $_SESSION['user'] = $_COOKIE['remember'];
    } else {
        header('Location: //' . $_SERVER['SERVER_NAME'] . '/@dmin/');
        die;
    }
}

?>