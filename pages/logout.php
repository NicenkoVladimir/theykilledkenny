<?php
if (!empty($_SESSION['logged_in']) && isset($_SESSION['email'])) {
    $_SESSION['success_message'] = 'You succesfully logged out from: '
        . $_SESSION['email'];
    $_SESSION['email'] = null;
    $_SESSION['logged_in'] = null;
    $_SESSION['id'] = null;
    header('Location:?page=success');
} else {
    $_SESSION['error_message'] = 'We have some issues with your logout. Please, try it again';
    header('Location:?page=error');
}
