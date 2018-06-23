<?php
require_once '../action/DBConnect.php';
if (!empty($_POST)) {
    $id = $_POST['id'];
    $caption = $_POST['caption'];

    $sql = "UPDATE videos SET caption=? WHERE id=?";
    $query = $conn->prepare($sql);
    $query->execute([$caption, $id]);
    echo true;
}
?>