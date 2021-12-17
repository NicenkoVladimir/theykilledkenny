<?php
require_once './config.php';
session_start();
if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    $result = mysqli_query($link, "SELECT status_id as status FROM users WHERE id=$user_id");
    $user_status = mysqli_fetch_assoc($result)['status'];
    if ($user_status != 1) {
        mysqli_query($link, "DELETE FROM users WHERE id='$user_id' AND status_id!=1")
            or die(mysqli_error($link));
        $_SESSION['success_message'] = 'User with id: <b>' . $user_id . ' 
</b>was successfully deleted<br>
 <a class="btn btn-link" href="/?page=home">Go to homepage</a>';
        header('Location:/?page=success');
    } else {
        $_SESSION['error_message'] = 'User with id: <b>' . $user_id . ' 
</b>was not removed. Attention: you may not remove  Admin.<br>
 In order to remove Admin you should change status to user first.';
        header('Location:/?page=error');
    }
} else {
    $_SESSION['error_message'] = 'Something is going wrong. We found you to send us a request, but there 
are no parameters for this request (delete or update user)';
    header('Location:/?page=error');
}
