<?php
require_once '../action/DBConnect.php';
session_start();

if (empty($_POST)) {
    $_SESSION['gallery_msg'] = 'Missing required inputs';
    header('Location: ../AddGallery');
    die;
}

$title = $_POST['title'];
$navigation = $_POST['navigation'];
$detail = isset($_POST['detail']) ? $_POST['detail'] : '';
$image = '';
date_default_timezone_set('Asia/Kathmandu');
$time = date("Y-m-d H:i:s", time());

if (!empty($_FILES)) {
    $image = $_FILES['image']['tmp_name'];
    $photo = time() . '_' . rand(1, 999) . "." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    if (move_uploaded_file($image, "../../img/Gallery/featured/" . $photo)) {
        $image = $photo;
    }
}

$sql = "INSERT INTO gallery( title, detail, image, navigation_id, created_at) VALUES( ?, ?, ?, ?, ?)";
$query = $conn->prepare($sql);
if ($query->execute(array($title, $detail, $image, $navigation, $time))) {
    $last_id = $conn->lastInsertId();
    $_SESSION['gallery_msg'] = 'Gallery item submitted successfullly ! ';
    header('Location: ../AddDetailGallery?id=' . $last_id);
} else {
    $_SESSION['gallery_msg'] = 'Failed to submit item ! ';
    header('Location: ../AddGallery');
}
die;
?>