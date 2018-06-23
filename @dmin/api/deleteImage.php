<?php
require_once '../action/DBConnect.php';
if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql_1 = "SELECT name from images WHERE id=?";
    $query_1 = $conn->prepare($sql_1);
    $query_1->execute([$id]);
    $old_image = ($query_1->fetch())['name'];
    if (isset($old_image)) {
        unlink('../../img/Gallery/images/' . $old_image);
    }

    $sql = "DELETE FROM images WHERE id=?";
    $query = $conn->prepare($sql);
    $query->execute([$id]);
    echo true;
}
?>