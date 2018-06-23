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
$array = $query->fetchAll();

$output = [];
foreach ($array as $key => $data) {
    $sql_1 = "SELECT title FROM gallery WHERE id=?";
    $query = $conn->prepare($sql_1);
    $query->execute([$data['gallery_id']]);
    $gallery = ($query->fetch())[0];

    $output[$key] = [
        'id' => $data['id'],
        'name' => $data['name'],
        'caption' => $data['caption'],
        'gallery_id' => substr($gallery,0,30),
    ];
}

echo json_encode($output);
?>