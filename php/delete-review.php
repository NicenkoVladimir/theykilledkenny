<?php
require_once './config.php';
session_start();
if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    $result = mysqli_query($link, "SELECT review_status as status FROM customers_reviews WHERE user_id=$user_id");
    $review_status = mysqli_fetch_assoc($result)['status'];
    if ($review_status != 1) {
        mysqli_query($link, "DELETE FROM customers_reviews WHERE user_id='$user_id' AND review_status!=1")
            or die(mysqli_error($link));
        $_SESSION['success_message'] = 'User review has been succesfully removed<br>
            <a class="btn btn-link" href="/?page=users-reviews">Go back to users reviews</a>';
        header('Location: /?page=success');
    } else {
        $_SESSION['error_message'] = 'Your cannot remove approved review. If you want to remove it, first you have to reject review<br>
        <a class="btn btn-link" href="/?page=users-reviews">Go back to users reviews</a>';
        header('Location:/?page=error');
    }
} else {
    $_SESSION['error_message'] = 'Something is going wrong. Try again';
    header('Location:/?page=error');
}
