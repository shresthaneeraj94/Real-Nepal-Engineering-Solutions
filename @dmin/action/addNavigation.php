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
$time = time();

if (!empty($_FILES['image'])) {
    $target_dir = "img/Navigation/";
    $file_name = $_FILES["image"]['name'];
//    $imageFileType = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
//    $target_file_name = rand(1, 9) . '_' . time() . '.' . $imageFileType;
//    $target_file = $target_dir . $target_file_name;

    if (move_uploaded_file($_FILES["image"]['tmp_name'], $target_dir . $_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
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