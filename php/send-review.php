 <?php
    session_start();
    require_once 'config.php';
    $user_id = $_SESSION['id'];
    var_dump($user_id);
    $review = $_POST['review'];
    $grade = $_POST['grade'];
    $query = "INSERT INTO customers_reviews (user_id, review, grade, review_date) 
    VALUES ('$user_id', '$review', '$grade', NOW())";
    mysqli_query($link, $query) or die(mysqli_error($link));
    $_SESSION['success_message'] = 'Thank you very much for your feedback! We really appriciate your taking time for this purpose!';
    header("Location: /?page=success");
    ?> 