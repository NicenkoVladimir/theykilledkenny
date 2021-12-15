<?php
if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) {
    $message = $_SESSION['success_message'];
    header("Refresh:7; url=?page=home");
} else {
    header('Location: ?page=home');
}

?>

<style>
    .card-body {
        background-color: black;
        color: rgb(240, 225, 90);
        font-size: 1.2em;
    }

    .card-header {
        background-color: rgb(240, 225, 90);
        color: black;
    }
</style>
<center>
    <div class="card w-50">
        <h4 class="card-header car-title">Succesfull</h4>
        <div class="card-body">
            <p class="card-text "><?php echo $message ?><br>
                Redirecting to home page ...

            </p>
            <a href="?page=home" class="btn btn-outline-warning">Home page</a>
        </div>
    </div>
</center>