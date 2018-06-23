<?php
require_once '../action/DBConnect.php';
if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM videos WHERE id=?";
    $query = $conn->prepare($sql);
    $query->execute([$id]);
    echo true;
}
?>