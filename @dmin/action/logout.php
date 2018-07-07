<?php
session_start();
session_destroy();

setcookie('remember', false, 100, '/');
header('Location: ../index');
die;
?>