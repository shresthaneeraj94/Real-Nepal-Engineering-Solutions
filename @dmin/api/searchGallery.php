<?php
require_once '../action/DBConnect.php';
if (isset($_GET['search'])) {
    $search = $_GET['search'];

    $sql = "SELECT * FROM gallery WHERE title LIKE ?";
    $query = $conn->prepare($sql);
    $query->execute(['%' . $search . '%']);
    $array = $query->fetchAll();

    $output = [];
    foreach ($array as $key => $data) {
        $sql_1 = "SELECT title FROM navigation WHERE id=?";
        $query = $conn->prepare($sql_1);
        $query->execute([$data['navigation_id']]);
        $name = ($query->fetch())[0];
        $output[$key] = [
            'id' => $data['id'],
            'title' => $data['title'],
            'detail' => $data['detail'],
            'image' => $data['image'],
            'navigation_id' => substr($name, 0, 30),
            'created_at' => $data['created_at'],
        ];
    }
    echo json_encode($output);
}
?>