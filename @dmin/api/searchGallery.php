<?php
require_once '../action/DBConnect.php';
if (isset($_GET['search'])) {
    $search = $_GET['search'];

    $sql = "SELECT * FROM gallery WHERE title LIKE ?";
    $query = $conn->prepare($sql);
    $query->execute(['%'.$search.'%']);
    echo json_encode($query->fetchAll());
}
?>