<?php
require_once '../action/DBConnect.php';


if ($_GET['type'] == 'image') {
    $sql = "SELECT * FROM images WHERE gallery_id=?";
} else {
    $sql = "SELECT * FROM videos WHERE gallery_id=?";
}
$gallery = $_GET['gallery'];
$query = $conn->prepare($sql);
$query->execute([$gallery]);
echo json_encode($query->fetchAll());
?>