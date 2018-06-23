<?php
require_once '../action/DBConnect.php';

$sql = "SELECT * FROM images";
$query = $conn->prepare($sql);
$query->execute();

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