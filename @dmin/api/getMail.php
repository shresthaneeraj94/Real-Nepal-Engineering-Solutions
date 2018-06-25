<?php
require_once '../action/DBConnect.php';

$id = $_GET['id'];

$sql = "SELECT * FROM mail WHERE id=?";
$query = $conn->prepare($sql);
$query->execute([$id]);

echo json_encode($query->fetch());

$sql_1 = "UPDATE mail SET status=? WHERE id=?";
$query_1 = $conn->prepare($sql_1);
$query_1->execute([1,$id]);
?>