<?php
require_once './php/config.php';
if ($_SERVER['REQUEST_METHOD']=='post') {
    if (!empty($_POST['user_id'])) {
        $user_id = $_POST['user_id'];
    }
    if (isset($_POST['update'])) {
        include 'pages/update-profile.php';

    }
    if (isset($_POST['delete'])) {
        include 'pages/delete-profile.php';
    }
}
?>
