<?php
require_once './config.php';
session_start();
$email = trim($_POST['email']);
$user_id = $_POST['user_id'];
$message = trim($_POST['message']);
$name = $_POST['name'];


if (isset($user_id)) {
    $query =  "INSERT INTO users_messages (`user_id`, `message_text`, `sending_date`)
    VALUES ('$user_id',' $message', NOW())";
} else {
    $query =  "INSERT INTO users_messages (`email`, `name`, `message_text`, `sending_date`)
    VALUES ('$email', '$name',' $message', NOW())";
}
mysqli_query($link, $query) or die(mysqli_error($link));
$_SESSION['success_message'] = "Thank you for contacting us! We'll reach you out with response as soon as possible";
header('Location:/?page=success');
