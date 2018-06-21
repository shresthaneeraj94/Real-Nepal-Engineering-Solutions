<?php
require_once '../action/DBConnect.php';

$sql = "SELECT * FROM images";
$query = $conn->prepare($sql);
$query->execute();
echo json_encode($query->fetchAll());
?>