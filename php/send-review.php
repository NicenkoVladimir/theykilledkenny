 <?php
   session_start();
   require_once 'config.php';
   $user_id = $_SESSION['id'];
   $review =  trim($_POST['review']);
   $grade = $_POST['grade'];
   var_dump($user_id);
   var_dump($review);
   if (!empty($review) and !empty($grade) and !empty($user_id)) {
      $query = "INSERT INTO customers_reviews (`user_id`, `review`, `grade`, `review_date`) 
      VALUES ('$user_id', '$review', '$grade', NOW())";
      mysqli_query($link, $query) or die(mysqli_error($link));
      $_SESSION['success_message'] = 'Thank you very much for your feedback! We really appriciate your taking time for this purpose!';
      header("Location: /?page=success");
   } else {
      $_SESSION['error_message'] = 'Something is going wrong, probably you did not write your reviews before clicking submit button';
      header("Location: /?page=error");
   }

   ?> 