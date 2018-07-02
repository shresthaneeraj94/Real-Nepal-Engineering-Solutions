<?php
include_once 'DBConnect.php';

if (empty($_POST)) {
    header('Location: //' . $_SERVER['SERVER_NAME'] . '/@dmin/Gallery');
    die;
}
$id = $_POST['id'];

if (!empty($_POST['videos'])) {
    $videos = $_POST['videos'];
    foreach ($videos as $key => $video) {

        $vid_embed = explode('&', explode('=', $video)[1])[0];
        $capVideo = $_POST['capVideo'][$key];
        $sql_1 = "INSERT INTO videos( name, caption, gallery_id) VALUES( ?, ?, ?)";
        $query_1 = $conn->prepare($sql_1);
        $query_1->execute([$vid_embed, $capVideo, $id]);
    }
}

if (!empty($_FILES['images'])) {
    $images = $_FILES['images'];
    foreach ($images['tmp_name'] as $key => $image) {
        $capImage = $_POST['capImg'][$key];
        $photo = substr($_FILES['images']['name'][$key], 0, 5) . time() ."rand(1,999)". "." . pathinfo($_FILES['images']['name'][$key], PATHINFO_EXTENSION);

        if (move_uploaded_file($image, "../../img/Gallery/images/" . $photo)) {

            $sql_2 = "INSERT INTO images( name, caption, gallery_id) VALUES( ?, ?, ?)";
            $query_2 = $conn->prepare($sql_2);
            $query_2->execute([$photo, $capImage, $id]);
        }
    }
}

$_SESSION['gallery_msg'] = 'Gallery item submitted successfullly ! ';
header('Location: //' . $_SERVER['SERVER_NAME'] . '/@dmin/Gallery');
die;
