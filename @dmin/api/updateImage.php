<?php
require_once '../action/DBConnect.php';
if (!empty($_POST)) {
    $id = $_POST['id'];
    $caption = $_POST['caption'];

    $sql = "UPDATE images SET caption=? WHERE id=?";
    $query = $conn->prepare($sql);
    $query->execute([$caption, $id]);
    echo true;
}
?>