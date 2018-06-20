<?php
require_once '../action/DBConnect.php';
if (!empty($_POST)) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $detail = $_POST['detail'];
    $category = $_POST['category'];
    $tab_stat = $_POST['tab_stat'];
    $created_at = time();

    if ($_FILES['image']) {
        $sql_1 = "SELECT image from navigation WHERE id=?";
        $query_1 = $conn->prepare($sql_1);
        $query_1->execute([$id]);
        $old_image = ($query_1->fetch())['image'];

        $updateImg = $_FILES['image']['tmp_name'];
        $photo = time() . '_' . rand(1, 9) . "." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        if (move_uploaded_file($updateImg, "../../img/Navigation/" . $photo)) {
            unlink('../../img/Navigation/' . $old_image);
            $image = $photo;
        }

        $sql = "UPDATE navigation SET title=?,detail=?,category=?,image=?,tab_stat=?,created_at=? WHERE id=?";
        $query = $conn->prepare($sql);
        if ($query->execute([$title, $detail, $category, $image, $tab_stat, $created_at, $id])) {
            echo true;
        } else {
            echo false;
        }
    } else {
        $sql = "UPDATE navigation SET title=?,detail=?,category=?,tab_stat=?,created_at=? WHERE id=?";
        $query = $conn->prepare($sql);
        if ($query->execute([$title, $detail, $category, $tab_stat, $created_at, $id])) {
            echo true;
        } else {
            echo false;
        }
    }

}
?>