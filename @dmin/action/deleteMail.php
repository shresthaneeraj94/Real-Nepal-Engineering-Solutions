<?php
require_once '../action/DBConnect.php';

if (!empty($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM mail WHERE id=?";
    $query = $conn->prepare($sql);
    $query->execute([$id]);
}
header('Location: ../Mail');
die;