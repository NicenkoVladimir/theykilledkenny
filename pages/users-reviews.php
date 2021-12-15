<script>
    function getReviewStatus() {
        var status = document.getElementsByTagName('select');

    }
</script>



<p>
    <small><a href="?page=home">Home </a> --> <a href="?page=profile">Profile </a> --> Reviews list</small>
</p>

<?php
require_once './php/config.php';
if (isset($_SESSION['status']) && $_SESSION['status'] == 1) :
    $result = mysqli_query($link, "SELECT email, CONCAT(name,' ', surname) as full_name, review, review_date, grade, review_status,
    admin_comment FROM customers_reviews 
 LEFT JOIN users ON users.id = customers_reviews.user_id")
        or die(mysqli_error($link));
    if (mysqli_num_rows($result) == 0) {
        echo 'There are no registered users yet';
    } else {
        for ($reviews = []; $row = mysqli_fetch_assoc($result); $reviews[] = $row);
    }
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
                        <td><?php echo $review['email']; ?></td>
                        <td><?php echo $review['full_name']; ?></td>
                        <td><?php echo $review['review']; ?></td>
                        <td><?php echo $review['review_date']; ?></td>
                        <td><?php echo $review['grade']; ?></td>
                        <td>
                            <select name="rev_status">
                                <option value="1">Reject</option>
                                <option value="2">Approve</option>
                                <option value="0" disabled>Waiting</option>
                            </select>
                            <?php echo $review['review_status']; ?>
                        </td>
                        <td>
                            <textarea name="" cols="50" rows="2" placeholder="Type your comment"><?php echo $review['admin_comment']; ?></textarea>
                        </td>
                        <td>

                            <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#<?php echo $user['id']; ?>" aria-expanded="false" aria-controls="collapseExample">
                                Update
                            </button>

                        </td>
                        <td>
                            <form action="../php/delete-profile.php" method="post">
                                <input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
                                <button type="submit" class="btn btn-danger" onclick="confirm('Are you sure you want to remove <?php echo $user['name'] ?> ?')">delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php if (isset($update_user) && $update_user == true) ?>
                    <tr class="collapse" id="<?php echo $user['id']; ?>">
                        <form action="../php/update-profile.php" method="post">
                            <input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
                            <td></td>
                            <td colspan="5">
                                <input placeholder="<?php echo $user['ban_reason']; ?>" type="text" name="ban_reason" class="form-control">

                            </td>
                            <td>
                                <select class="form-control" name="banStatus" onchange="showBanReasonField()">
                                    <option value="0" <?php if ($user['banned'] == '0') {
                                                            echo 'selected';
                                                        } ?>>0</option>
                                    <option value="1" <?php if ($user['banned'] == '1') {
                                                            echo 'selected';
                                                        } ?>>1</option>
                                </select>

                            </td>
                            <td colspan="2">
                                <select class="form-control" name="userStatus">
                                    <option value="1" <?php if ($user['status'] == 'admin') {
                                                            echo 'selected';
                                                        } ?>>admin</option>
                                    <option value="2" <?php if ($user['status'] == 'user') {
                                                            echo 'selected';
                                                        } ?>>user</option>
                                </select>
                            </td>
                            <td>
                                <input type="submit" class="btn btn-success" value="Update">
                            </td>
                        </form>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- <?php endif;
            header('Location:/');
                ?> -->

    </body>