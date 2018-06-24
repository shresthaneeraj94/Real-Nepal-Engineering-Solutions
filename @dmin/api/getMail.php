<?php
require_once '../action/DBConnect.php';

$id = $_GET['id'];

$sql = "SELECT * FROM mail WHERE id=?";
$query = $conn->prepare($sql);
$query->execute([$id]);
echo json_encode($query->fetch());
?>