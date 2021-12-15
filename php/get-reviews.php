 <?php

    require_once 'config.php';
    $result = mysqli_query($link, "SELECT user_id, name, surname, photo, review, grade
     FROM customers_reviews
    LEFT JOIN users ON users.id = customers_reviews.user_id
    WHERE customers_reviews.review_status = 1")
        or die(mysqli_error($link));
    $reviews = [];
    while ($row = $result->fetch_assoc()) {
        $reviews[] = $row;
    };
    echo json_encode($reviews);


    ?> 