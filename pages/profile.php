<script>
    $(function() {
                $('.current_image').click(function() {
                    $('.new_image_box').toggle();
                });
            }
</script>



<?php
require_once './php/config.php';
if (isset($_SESSION['active'])) {
    $active_status = $_SESSION['active'];
    if ($active_status == 0) {
        $_SESSION['error_message'] = '<h5>Your account has not been activated</h5>
        In order to review or change your profile you are 
        supposed to activate your account. Go to your email and click activation link.<br>
        If you did not receive activation link yet click the link below to send it again
         to your email adress<br>
         <a href="/?page=activate">Send me activation link</a>';
        header('Location:/?page=error');
    }
}
$email = $_SESSION['email'];
$user_id = $_SESSION['id'];
$result = mysqli_query($link, "SELECT *, statuses.status as status FROM users 
 LEFT JOIN statuses ON statuses.id = users.status_id WHERE email='$email'")
    or die(mysqli_error($link));
$user = mysqli_fetch_assoc($result);


?>
<?php
if (isset($_SESSION['logged_in'])) {
?>

    <p>
        <small><a href="?page=home">Home </a> --> Profile</small>
    </p>


    <center>
        <div class="btn-group" style="margin-bottom:20px">
            <?php if ($_SESSION['status'] == 1) {
            ?>
                <a href="?page=users-list" class="btn btn-link">Registered users</a>
                <a href="?page=users-reviews" class="btn btn-link">Users reviews</a>
                <a href="?page=profile-info" class="btn btn-link">My profile</a>
                <a href="php/tb_create/delete_db.php" class="btn btn-link">Remove website DB (temporary)</a>

            <?php } elseif ($_SESSION['status'] == 2) {
            ?>
                <form action="/?page=profile-data" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
                    <button type="submit" name="shopping-cart" class="btn btn-link">Shopping cart</button>
                    <button type="submit" name="shopping-history" class="btn btn-link">Shopping history</button>
                    <button type="submit" name="payment-info" class="btn btn-link">Payment info</button>
                </form>
                <form action="/?page=profile-info" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
                    <button type="submit" class="btn btn-link">Profile info / update</button>
                </form>
                <form action="/?page=delete-profile" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
                    <button type="submit" class="btn btn-link">Remove profile</button>
                </form>
            <?php } else {
            ?>
                <button type="submit" name="payment-info" class="btn btn-link">Available orders</button>

            <?php }

            ?>
        </div>


        <div class="container-fluid" style="width:50%">
            <div class="row">
                <div class="col-4">
                    <a href='' onclick="window.open('url', name, params)">
                        <img src="<?php echo $user['photo'] ?>" alt="<?php echo $user['name'] ?>" class="img-thumbnail rounded-circle">
                    </a>
                </div>
                <div class="col-8 text-justify">
                    <h3 class="text-primary h1_page"><?php echo $user['name'] . ' ' . $user['surname'] ?></h3>
                    <p>
                        <strong>Email: </strong> <?php echo $user['email'] ?>
                    </p>
                    <p>
                    <p>
                        <strong>Phone: </strong> <?php echo $user['phone_number'] ?>
                    </p>
                    <strong>Registration date: </strong> <?php echo $user['registration_date']  ?>
                    </p>
                    <p>
                        <strong>Status: </strong> <?php echo $user['status'] ?>
                    </p>
                </div>
            </div>
        </div>
        <?php
        $check_review = mysqli_query($link, "SELECT * FROM customers_reviews WHERE user_id='$user_id'");
        if (mysqli_num_rows($check_review) == 0) {
        ?>
            <div class="container-fluid" style="width:100%">
                <div class="row mt-3">
                    <div class="col-10">
                        <form action="../php/send-review.php" method="POST">
                            <div class="form-group">
                                <label for="feedback_section">Leave your feedback about our work
                                    <span class="small text-danger"> (max 100 symbols)</span></label>
                                <textarea maxlength="100" name="review" style="resize:none" class="form-control w-50" id="feedback_section" rows="3" placeholder="What do you think of us?">
                            </textarea>
                            </div>
                            <div>
                                <span>Grade</span>
                                <select name="grade" id="">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="star_wrap" onmouseover="showText(this)" onmouseout="hideText(this)">
                                <img src="images/star_icon.png" alt="star" style="height:50px;">
                                <img src="images/star_icon.png" alt="star" style="height:50px;">
                                <img src="images/star_icon.png" alt="star" style="height:50px;">
                                <img src="images/star_icon.png" alt="star" style="height:50px;">
                                <img src="images/star_icon.png" alt="star" style="height:50px;">
                            </div>
                            <input class="btn btn-primary mr-2" type="submit" value="Submit" style="width:100px">
                            <input class="btn btn-secondary" type="reset" value="Clear" style="width:100px">
                        </form>
                    </div>
                </div>
            </div>



        <?php } else {
            $user_review = mysqli_fetch_assoc($check_review);
        ?>
            <h3>My website feedback</h3>
            <span class="small text-danger"> (if you wish to change or remove your feedback, please connect to admin)</span>
            <div class="border border-primary w-50"><?php echo $user_review['review'] ?>

                <div class="star_wrap" onmouseover="showText(this)" onmouseout="hideText(this)">
            <?php
            for ($i = 1; $i <= $user_review['grade']; $i++) {
                echo '<img src="images/star_icon.png" alt="star" style="height:50px">';
            }
            echo '</div></div>';
        }
    } else {
        header('Location:?page=page-not-found');
    }

            ?>
            <div class="blockquote text-success">
                Admin comment:
                <?php echo $user_review['admin_comment'] ?>

            </div>
    </center>