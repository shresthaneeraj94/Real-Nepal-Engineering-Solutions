<?php
require_once '../action/DBConnect.php';

$page_number = (isset($_GET['pages'])) ? $_GET['pages'] : '1';

$sql = "SELECT * FROM images";
$query = $conn->prepare($sql);
$query->execute();
$array = $query->fetchAll();

$total = count($array);
$limit = 25;
$pages = intval($total / $limit);
if ($total % $limit) {
    $pages++;
}
$output = [];


foreach ($array as $key => $data) {

    if ($key < ($page_number - 1) * $limit) {
    } elseif ($key >= $page_number * $limit) {
    } else {
        $sql_1 = "SELECT title FROM gallery WHERE id=?";
        $query = $conn->prepare($sql_1);
        $query->execute([$data['gallery_id']]);
        $gallery = ($query->fetch())[0];

        $output[$key] = [
            'id' => $data['id'],
            'name' => $data['name'],
            'caption' => $data['caption'],
            'gallery_id' => substr($gallery, 0, 30),
        ];
    }
}

$group = [$output, $pages];
echo json_encode($group);
?>