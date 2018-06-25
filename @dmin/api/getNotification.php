<?php
require_once '../action/DBConnect.php';

$sql = "SELECT * FROM mail WHERE status=? ORDER BY created_at DESC";
$query = $conn->prepare($sql);
$query->execute([0]);
echo json_encode($query->fetchAll());
?>