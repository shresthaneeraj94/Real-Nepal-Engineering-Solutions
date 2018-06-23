<?php
require_once '../action/DBConnect.php';
$sql = "SELECT * FROM navigation WHERE category!=?";
$query = $conn->prepare($sql);
$query->execute(['Gallery']);
echo json_encode($query->fetchAll());
?>