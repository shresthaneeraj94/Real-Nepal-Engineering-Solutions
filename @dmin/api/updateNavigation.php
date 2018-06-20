<?php
require_once '../action/DBConnect.php';
if (!empty($_POST)) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $detail = $_POST['detail'];
    $category = $_POST['category'];
    $tab_stat = $_POST['tab_stat'];
    $created_at = time();

    $sql = "UPDATE navigation SET title=?,detail=?,category=?,tab_stat=?,created_at=? WHERE id=?";
    $query = $conn->prepare($sql);
    if ($query->execute([$title, $detail, $category, $tab_stat, $created_at, $id])) {
        echo true;
    } else {
        echo false;
    }
}
?>