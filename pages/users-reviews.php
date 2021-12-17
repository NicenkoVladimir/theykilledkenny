<p>
    <small><a href="?page=home">Home </a> --> <a href="?page=profile">Profile </a> --> Reviews list</small>
</p>

<?php
require_once './php/config.php';

if (isset($_SESSION['status']) && $_SESSION['status'] == 1) :
    $result = mysqli_query($link, "SELECT id as user_id, email, CONCAT(name,' ', surname) as full_name, review, review_date, grade, review_status,
    admin_comment FROM customers_reviews 
 LEFT JOIN users ON users.id = customers_reviews.user_id")
        or die(mysqli_error($link));

    if (mysqli_num_rows($result) == 0) {
        echo '<h3>No users reviews yet</h3>
        <a href="/?page=profile" class="btn btn-link">Go back </a>';
    } else {
        for ($reviews = []; $row = mysqli_fetch_assoc($result); $reviews[] = $row);
        mysqli_free_result($result);
?>

        <body>
            <h4 class="text-primary text-center">List of user's reviews</h4>
            <table class="table table-striped table-hover text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>Email</th>
                        <th>Full name</th>
                        <th>Review</th>
                        <th>Rev_date</th>
                        <th>Grade</th>
                        <th>Status</th>
                        <th>Admin comment</th>
                        <th>Update</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reviews as $review) : ?>
                        <tr>
                            <form action="../php/update-review.php" method="POST">
                                <input type="hidden" name="user_id" value="<?php echo $review['user_id'] ?>">
                                <td><?php echo $review['email']; ?></td>
                                <td><?php echo $review['full_name']; ?></td>
                                <td><?php echo $review['review']; ?></td>
                                <td><?php echo $review['review_date']; ?></td>
                                <td><?php echo $review['grade']; ?></td>
                                <td>
                                    <select name="review_status">
                                        <option value="2" disabled <?php if ($review['review_status'] == '2') {
                                                                        echo 'selected';
                                                                    } ?>>Waiting</option>
                                        <option value="1" <?php if ($review['review_status'] == '1') {
                                                                echo 'selected disabled';
                                                            } ?>>Approve</option>
                                        <option value="0" <?php if ($review['review_status'] == '0') {
                                                                echo 'selected disabled';
                                                            } ?>>Reject</option>
                                    </select>
                                </td>
                                <td>
                                    <textarea name="admin_comment" cols="50" rows="2" placeholder="Type your comment"><?php echo $review['admin_comment']; ?></textarea>
                                </td>
                                <td>
                                    <input value="Update" class="btn btn-warning" type="submit">

                            </form>

                            </td>
                            <td>
                                <form action="../php/delete-review.php" method="POST">
                                    <input type="hidden" name="user_id" value="<?php echo $review['user_id'] ?>">
                                    <input type="submit" class="btn btn-danger" value="Remove">
                                </form>
                            </td>

                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
    <?php }
endif;
    ?>
        </body>