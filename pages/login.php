<style>
    .button {
        border: 1px solid black;
        background-color: white;
    }
</style>



<?php
require_once './php/config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = mysqli_real_escape_string($link, trim($_POST['email']));
        $result = mysqli_query($link, "SELECT * FROM users WHERE email='$email'");
        if (mysqli_num_rows($result) == 0) {
            $_SESSION['error_message'] = 'users with email <b>' . $email . '</b> does not exist';
            header('Location: ?page=error');
        } else {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($_POST['password'], $user['password'])) {
                if ($user['banned'] == 1) {
                    $_SESSION['error_message'] = '<p>Sorry. But you have no access to your account, 
                    you were banned by admin.</p>
                    <p> Reason:' . $user['ban_reason'] . '</p>';
                    header("Location: /?page=error");
                } else {
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['email'] = $email;
                    $_SESSION['active'] = $user['active'];
                    $_SESSION['status'] = $user['status_id'];
                    $_SESSION['logged_in'] = true;
                    header("Location: /?page=profile");
                }
            } else {
                $_SESSION['error_message'] = 'Account does not exist or wrong password. Try again';
                header("Location: /?page=error");
            }
        }
    } else {
        $_SESSION['error_message'] = 'You did not enter your email or password';
        header("Location: /?page=error");
    }
}
?>
<p>
    <small><a href="?page=home">Home </a> --> Log in</small>
</p>
<center>
    <form action="" method="post" class="col-md-4">
        <div class=" form-group">
            <label>Account email</label>
            <input type="email" name="email" class="form-control form-control-lg">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control form-control-lg">
        </div>
        <input type="submit" value="Sign in your account" class="btn  btn-outline-primary mr-3">
        <a class="btn btn-warning" href="?page=register">Do not have account?</a>
        <a class="btn btn-link text-secondary" href="?page=forgot">Forgot password?</a>
    </form>

    <div class="menu col-md-3" style="margin:20px">
        <a href="?page=login" class="container border border-dark" onclick="alert('We are sorry, login via Facebook is not available yet')" style=" display:block; width:300px; font-size:15px">
            <div class="row">
                <div class="col-8 border-right border-dark">CONTINUE WITH FACEBOOK</div>
                <div class="col-2" style="background:white"><img src="images/fb.png" alt="Facebook" title="Continue with Facebook" style="max-width:100%">
                </div>
            </div>
        </a>
    </div>
    <div class="menu col-md-3">
        <a href="?page=login" class="container border border-dark" onclick="alert('We are sorry, login via Gmail is not available yet')" style="display:block; width:300px; font-size:15px">
            <div class="row">
                <div class="col-8 border-right border-dark">CONTINUE WITH GMAIL</div>
                <div class="col-2" style="background:white"><img src="images/gmail.png" alt="Gmail" title="Continue with Gmail" style="max-width:100%">
                </div>
            </div>
        </a>
    </div>

</center>