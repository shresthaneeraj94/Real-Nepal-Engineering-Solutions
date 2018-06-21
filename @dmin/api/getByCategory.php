<?php
require_once '../action/DBConnect.php';

$category = $_GET['category'];
$sql = "SELECT * FROM navigation WHERE category=?";
$query = $conn->prepare($sql);
$query->execute([$category]);
echo json_encode($query->fetchAll());
?>