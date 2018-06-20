<?php
require_once '../action/DBConnect.php';
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM navigation WHERE id=?";
    $query = $conn->prepare($sql);
    $query->execute([$id]);
    echo json_encode($query->fetch());
}
?>