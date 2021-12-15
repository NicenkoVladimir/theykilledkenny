<?php
if (isset($_SESSION['error_message']) && !empty($_SESSION['error_message'])) {
    $message = $_SESSION['error_message'];
    header("Refresh:7; url=?page=home");
} else {
    header('Location: ?page=home');
}
?>

<style>
    .card-header {
        background-color: black;
        color: rgb(240, 225, 90);

    }

    .card-body {
        background-color: rgb(240, 225, 90);
        color: black;
        font-size: 1.2em;
    }
</style>
<center>
    <div class="card w-50">
        <h4 class="card-header">Error</h4>
        <div class="card-body">
            <p class="card-text"><?php echo $message ?><br>
                Redirecting to home page ...
            </p>
            <a href="?page=home" class="btn btn-outline-dark">Home page</a>
            <button onclick="window.history.back()" class="btn btn-outline-dark">Go back</a>
        </div>
    </div>
</center>