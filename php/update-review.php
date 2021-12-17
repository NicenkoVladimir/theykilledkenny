<?php
require_once './config.php';
session_start();

if (!empty($_POST['user_id'])) {
    $review_status = $_POST['review_status'];
    $admin_comment = trim($_POST['admin_comment']);
    $user_id = $_POST['user_id'];
    $query = "UPDATE customers_reviews SET review_status='" . $review_status . "', admin_comment='" . $admin_comment . "'
     WHERE user_id=" . $user_id;
    mysqli_query($link, $query) or die(mysqli_error($link));

    $_SESSION['success_message'] = 'Review has been succesfully updated<br>
    <a class="btn btn-link" href="/?page=users-reviews">Go back to users reviews</a>';
    header('Location: /?page=success');
} elseif ($_POST['update'] == 'all') {
    $query = "UPDATE customers_reviews SET review_status='" . $review_status . "', admin_comment='" . $admin_comment . "'";
    mysqli_query($link, $query) or die(mysqli_error($link));

    $_SESSION['success_message'] = 'All reviews have been succesfully updated<br>
    <a class="btn btn-link" href="/?page=users-reviews">Go back to users reviews</a>';
    header('Location: /?page=success');
} else {
    $_SESSION['error_message'] = 'Something went wrong, please try again';
    header('Location: /?page=error');
}
