<head>
    <link rel="stylesheet" href="../styles/style.css">
    <style>
        .h1_title {
            margin: 0 10% !important;
            border-bottom: 1px solid black !important;
        }
    </style>
</head>
<?php
session_start();
require_once 'php/config.php';
?>

<body>


    <p>
        <small><a href="?page=home">Home </a> --> Contact us</small>
    </p>

    <h1 class="h1_title mb-5">Contact form</h1>
    <form action="../php/contact-us.php" method="POST" class="col-md-4" style="margin:0 10%">
        <?php
        if (empty($_SESSION['id'])) {

        ?>
            <div>
                <a href="/?page=login" class="btn btn-link">Have an account? Click to sign in</a>
            </div>
            <div class=" form-group">
                <label for="user_email">Your email <span class="text-danger">(required)</span> </label>
                <input type="email" id="user_email" name="email" class="form-control form-control-lg" placehorder="john.smith@gmail.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
            </div>
            <div class="form-group">
                <label for="user_name">Your name <span class="text-danger">(required)</span> </label>
                <input type="text" id="user_name" name="name" class="form-control form-control-lg" placehorder="John Smith" required>
            </div>
        <?php } else {
        ?>
            <h4>
                Hi,<a href="/?page=profile"><span class="text-primary"> <?php echo $_SESSION['full_name'] ?>!</span></a>
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
            </h4>
        <?php
        }
        ?>
        <div class="form-group">
            <label for="user_message">What do you want to tell us?<span class="text-danger">(10-200 symbols)</span></label>
            <textarea maxlength="200" minlength="10" class="form-control form-control-lg" id="user_message" name="message" rows="5" style="resize: none;" required></textarea>
        </div>
        <input type="submit" value="Submit" class="btn  btn-outline-primary mr-3">
        <input type="reset" value="Reset" class="btn  btn-outline-secondary mr-3">

    </form>


</body>