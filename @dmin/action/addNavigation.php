<?php
require_once '../action/DBConnect.php';
session_start();

if (empty($_POST)) {
    $_SESSION['nav_msg'] = 'Missing required inputs';
    header('Location: //' . $_SERVER['SERVER_NAME'] . '/@dmin/AddNavigation');
    die;
}

$title = $_POST['title'];
$category = $_POST['category'];
$detail = isset($_POST['detail']) ? $_POST['detail'] : '';
$tab_stat = $_POST['tab_stat'];
$image = '';
date_default_timezone_set('Asia/Kathmandu');
$time = date("Y-m-d H:i:s", time());

if (!empty($_FILES)) {
    $image = $_FILES['image']['tmp_name'];
    $photo = time() . '_' . rand(1, 9) . "." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    if (move_uploaded_file($image, "../../img/Navigation/" . $photo)) {
        $image = $photo;
    }
}

$sql = "INSERT INTO navigation( title, detail, image, category, tab_stat, created_at) VALUES( ?, ?, ?, ?, ?, ?)";
$query = $conn->prepare($sql);
if ($query->execute(array($title, $detail, $image, $category, $tab_stat, $time))) {
    $_SESSION['nav_msg'] = 'Navigation item submitted successfullly ! ';

} else {
    $_SESSION['nav_msg'] = 'Failed to submit item ! ';
}
header('Location: //' . $_SERVER['SERVER_NAME'] . '/@dmin/AddNavigation');
die;
?>