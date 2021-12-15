<style>
.form-group {
    width: 30%;
}
</style>

<p>
    <small><a href="?page=home">Home </a> --> Get Order</small>
</p>


<center>



    <form action="process-order.php">


        <?php
        if (!empty($_SESSION['logged_in']) and !$_SESSION['banned'] ) {
            $email = $_SESSION['email'];
            $result = mysqli_query($link, "SELECT name, surname, email, photo FROM users WHERE email='$email'")
                or die(mysqli_error($link));
            $user = mysqli_fetch_assoc($result) or die(mysqli_error($link));
            mysqli_free_result($result);
            $result = mysqli_query($link, "SELECT MIN(id) as id FROM users")
                or die(mysqli_error($link));
            $first_user = mysqli_fetch_assoc($result) or die(mysqli_error($link));

        ?>
        <table>
            <caption>Contact info</caption>
            <tr>
                <td>
                    <a href="?page=profile" title="Go to my profile">
                        <img style="width:100px" src=" <?php echo $user['photo'] ?>" alt="<?php echo $user['name'] ?>"
                            class="rounded-circle"></a>
                </td>
                <td>
                    <p>Full name: <?php echo $user['name'] . $user['surname'] ?></p>
                    <p>Email: <?php echo $user['email'] ?></p>
                </td>
            </tr>
        </table>



        <?php
        } else {

        ?>

        <fieldset class="form-group">
            <legend>Enter your contact information or <a href="?page=login">sign in your profile</a></legend>
            <label>Full name <span class="small text-danger">(required)</span></label>
            <input class="form-control" type="text" id="name" name="full_name" required placeholder="John Smith"
                minlength="4" maxlength="30" required>

            <label>Phone number<span class="small text-danger"> (optional)</span></label>
            <input class="form-control" type="tel" id="phone" name="phone" aria-describedby="phoneHelp"
                pattern="+{1}[0-9]{10}" placeholder="+380665678098">

            <label>Personal email <span class="small text-danger">(required)</span></label>
            <input class="form-control" type="email" name="email" id="email" placeholder="adress@email.com"
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required">
        </fieldset>

        <?php    }
        ?>


        <div class="form-group">

            <label for="specify_order">Specify your order</label>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1"
                    checked>
                <label class="form-check-label" for="exampleRadios1">
                    Default radio
                </label>
            </div>


            <label for="userPicture">Upload your picture</label>
            <input type="file" class="form-control-file" id="userPicture">

        </div>

    </form>
</center>