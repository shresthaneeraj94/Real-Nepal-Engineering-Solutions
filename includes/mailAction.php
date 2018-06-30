<?php
session_start();
include_once '../@dmin/action/DBConnect.php';
if (empty($_POST)) {
    $_SESSION['mail_contact'] = 'Missing required inputs';
    header('Location: //' . $_SERVER['SERVER_NAME'] . '/contact');
    die;
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone = (isset($_POST['phone'])) ? $_POST['phone'] : '';
$subject = $_POST['subject'];
$message = $_POST['message'];
//$to = 'bij.maharjan@gmail.com';

//$headers = 'From: ' . $name . "\r\n" . $email . "\r\n" . $phone . "\r\n" .
//    'Reply-To:' . $email . "\r\n" .
//    'X-Mailer: PHP/' . phpversion();
//
//mail($to, $subject, $message, $headers);

$sql = "INSERT INTO `mail`(`name`, `email`, `phone`, `subject`, `detail`, `created_at`) VALUES (?,?,?,?,?,?)";
$query = $conn->prepare($sql);
$query->execute([$name, $email, $phone, $subject, $message, $time]);

$_SESSION['mail_contact'] = 'Mail sent successfullly ! ';
header('Location: //' . $_SERVER['SERVER_NAME'] . '/contact');
die;
?>