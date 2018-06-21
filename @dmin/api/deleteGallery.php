<?php
require_once '../action/DBConnect.php';
if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql_1 = "SELECT image from gallery WHERE id=?";
    $query_1 = $conn->prepare($sql_1);
    $query_1->execute([$id]);
    $old_image = ($query_1->fetch())['image'];
    if (isset($old_image)) {
        unlink('../../img/Gallery/featured/' . $old_image);
    }


    $sql = "DELETE FROM gallery WHERE id=?";
    $query = $conn->prepare($sql);
    $query->execute([$id]);
    echo true;
}
?>