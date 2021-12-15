<?php
session_start();
require_once 'php/config.php';
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <meta name="keywords" content="south park, they killed kenny, south park characters">
    <meta name="description" content="South Park characters drawing services">
    <meta name="author" content="Vladimir and Anastasia">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="images/title_logo.png" />
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <title>
        They killed Kenny | South Park characters
    </title>


</head>

<body>
    <div class="grid-container">
        <div class="box1 contactInfo">
            <a href="https://facebook.com">
                <img src="images/fb.png" alt="They Killed Kenny Facebook" title="Go to Facebook community">
            </a>
            <a href="https://instagram.com">
                <img src="images/insta.png" alt="They Killed Kenny Instagram" title="Go to Instagram community">
            </a>
            <a href="https://pinterest.com">
                <img src="images/pinterest.png" alt="They Killed Kenny Pinterest" title="Go to Pinterest community">
            </a>
            <a href="https://linkedin.com">
                <img src="images/linkedin.png" alt="They Killed Kenny Linkedin" title="Go to Linkedin community">
            </a>
            <a href="https://youtube.com">
                <img src="images/youtube.png" alt="They Killed Kenny YouTube" title="Go to YouTube community">
            </a>
            <a href="mailto:theykilledkenny@gmail.com">
                <img src="images/gmail.png" alt="They Killed Kenny Gmail" title="Write us an email">
            </a>
        </div>

        <div class="box3 logo">
            <a href="?page=home">
                <img class="spin" src="images/logo.png" alt="They Killed Kenny" title="They killed Kenny | Home page" onmouseover="this.style.animation = 'spin 0.5s linear 0s 1'">
            </a>
        </div>
        <div class="box4">
            <div class="title">
                <h1 class="showtitle">WELCOME TO SOUTH PARK WORLD</h1>
            </div>
            <div class="menu menu-shadow">
                <a href="?page=products">
                    PRODUCTS
                </a>
                <a href="?page=get-order">
                    GET ORDER
                </a>
                <a href="?page=special-deals">
                    SPECIAL DEALS
                </a>
                <a href="?page=how-it-works">
                    HOW IT WORKS
                </a>
                <a href="?page=about-us">
                    ABOUT US
                </a>

            </div>
        </div>


        <section>
            <div id="search_results"></div>
            <!-- Navigator php -->
            <?php
            include 'php/navigator.php';
            ?>
        </section>

        <div class="box2 navigationPanel">

            <?php
            // website log in
            if (!empty($_SESSION['logged_in'])) {
                $email = $_SESSION['email'];
                $result = mysqli_query($link, "SELECT name, surname, photo FROM users WHERE email='$email'")
                    or die(mysqli_error($link));
                $user = mysqli_fetch_assoc($result) or die(mysqli_error($link));
                mysqli_free_result($result);
                $result = mysqli_query($link, "SELECT MIN(id) as id FROM users")
                    or die(mysqli_error($link));
                $first_user = mysqli_fetch_assoc($result) or die(mysqli_error($link));

                echo ' <a href="?page=profile" title="Go to my profile">
                    <img style="width:40px" src="' . $user['photo'] . '" alt="' . $user['name'] . '" class="rounded-circle"></a>
                    <b>' . $user['surname'] . ' ' . $user['name'] . '
                       <div class="btn-group">
                        <a href="?page=logout" class="btn btn-link">Logout</a></b>
                       </div> ';
            }
            // facebook log in
            elseif (!empty($_SESSION['FBID'])) {
                $email = $_SESSION['EMAIL'];
                $full_name = $_SESSION['FULLNAME'];
                $fbid = $_SESSION['FBID'];
                echo ' <a href="?page=profile" title="Go to my profile">
                <img class="rounded-circle" style="width:40px" src = "https://graph.facebook.com/' . $_SESSION['FBID'] . '/picture">            
                </a>
                <b>' . $full_name . '
                   <div class="btn-group">
                    <a href="?page=logout" class="btn btn-link">Logout</a></b>
                   </div> ';
            } else {
                echo '      
                <div class="btn-group">
                    <a href="?page=login" class="btn btn-link">Sign in</a>
                    <a href="?page=register" class="btn btn-link">Register</a></div>';
            }
            ?>

            <input class="search" type="text" placeholder="Search here" name="siteSearch" onkeydown="getSearch(this, '<?php echo $site_name ?>')">

        </div>
    </div>

    <div class="footer-basic">
        <footer>
            <div class="social contactInfo">
                <a href="https://facebook.com">
                    <img src="images/fb.png" alt="They Killed Kenny Facebook" title="Go to Facebook community">
                </a>
                <a href="https://instagram.com">
                    <img src="images/insta.png" alt="They Killed Kenny Instagram" title="Go to Instagram community">
                </a>
                <a href="https://pinterest.com">
                    <img src="images/pinterest.png" alt="They Killed Kenny Pinterest" title="Go to Pinterest community">
                </a>
                <a href="https://linkedin.com">
                    <img src="images/linkedin.png" alt="They Killed Kenny Linkedin" title="Go to Linkedin community">
                </a>
                <a href="https://youtube.com">
                    <img src="images/youtube.png" alt="They Killed Kenny YouTube" title="Go to YouTube community">
                </a>
                <a href="mailto:theykilledkenny@gmail.com">
                    <img src="images/gmail.png" alt="They Killed Kenny Gmail" title="Write us an email">
                </a>

            </div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="?page=home">Home</a></li>
                <li class="list-inline-item"><a href="?page=products">Products</a></li>
                <li class="list-inline-item"><a href="?page=get-order">Get Order</a></li>
                <li class="list-inline-item"><a href="?page=special-deals">Special Deals</a></li>
                <li class="list-inline-item"><a href="?page=how-it-works">How it Works</a></li>
                <li class="list-inline-item"><a href="?page=about-us">About us</a></li>
                <li class="list-inline-item"><a href="?page=policy-and-rules">Policy and rules</a></li>
                <li class="list-inline-item"><a href="?page=contact-us">Contact us</a></li>
            </ul>
            <p class="copyright">They Killed Kenny | Production © 2021</p>
        </footer>
    </div>

    </div>












    <script src="js/app.js" type='text/javascript'></script>
    <script type='text/javascript' src="js/jquery-1.9.1.min.js"></script>
</body>


</html>