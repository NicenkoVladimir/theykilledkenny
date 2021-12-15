<?php
require_once './config.php';

if (!empty($_POST['user_id'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $user_id = $_POST['user_id'];
    $ban_reason = $_POST['ban_reason'];
    $user_status = $_POST['userStatus'];
    $ban_status =  $_POST['banStatus'];
    // if ($user_status!='admin' OR $user_status!='user') {
    //     $_SESSION['error_message'] =  'Incorrect data. Status field should be either <b>admin</b> or <b>user</b>';
    //     header('Location: /?page=error');
    // }
    // if ($ban_status!=1 OR $ban_status!=0) {
    //     $_SESSION['error_message'] = $fal. ' Incorrect data. Banned field should be either <b>1</b> or <b>0</b>';
    //     header('Location: /?page=error');
    // }
    $query = "UPDATE users SET `ban_reason`='" . $ban_reason . "', `banned`='" . $ban_status . "', `status_id`='" . $user_status . "' WHERE `id`=" . $user_id;
    mysqli_query($link, $query) or die(mysqli_error($link));

    $_SESSION['success_message'] = 'User with id:' . $user_id . ' and full name: ' . $name . ' ' . $surname . ' has been updated successfully<br>
    <a class="btn btn-link" href="/?page=profile">Go back to profile</a>';
    header('Location: /?page=success');
} else {
    $_SESSION['error_message'] = 'You are supposed to fill out all the fields. Try again';
    header('Location: /?page=error');
}
