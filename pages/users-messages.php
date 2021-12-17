<p>
    <small><a href="?page=home">Home </a> --> <a href="?page=profile">Profile </a> --> Contact requests</small>
</p>

<?php
require_once './php/config.php';

if (isset($_SESSION['status']) && $_SESSION['status'] == 1) :
    $result = mysqli_query($link, "SELECT id as user_id, if(users.email is null, users_messages.email, users.email) as email,
    if(users.name is null, users_messages.name, CONCAT(users.name,' ', users.surname)) as full_name, message_text,
     sending_date, admin_response, message_status
    FROM users_messages
 LEFT JOIN users ON users.id = users_messages.message_id")
        or die(mysqli_error($link));

    if (mysqli_num_rows($result) == 0) {
        echo '<h3>Nobody has contacted you yet</h3>
        <a href="/?page=profile" class="btn btn-link">Go back </a>';
    } else {
        for ($reviews = []; $row = mysqli_fetch_assoc($result); $reviews[] = $row);
        mysqli_free_result($result);
?>

        <body>
            <h4 class="text-primary text-center">Contact requests</h4>
            <table class="table table-striped table-hover text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>Email</th>
                        <th>Full name</th>
                        <th>Message</th>
                        <th>Send_date</th>
                        <th>Admin response</th>
                        <th>Checked</th>
                        <th>Update</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reviews as $review) : ?>
                        <tr>
                            <form action="../php/update-message.php" method="POST">
                                <input type="hidden" name="user_id" value="<?php echo $review['user_id'] ?>">
                                <td><?php echo $review['email']; ?></td>
                                <td><?php echo $review['full_name']; ?></td>
                                <td><?php echo $review['message_text']; ?></td>
                                <td><?php echo $review['sending_date']; ?></td>
                                <td>
                                    <textarea name="admin_response" cols="50" rows="2" placeholder="Type your response"><?php echo $review['admin_response']; ?></textarea>
                                </td>
                                <td>
                                    <input name="message_status" type="checkbox" <?php if ($review['message_status'] == '1') {
                                                                                        echo 'checked disabled';
                                                                                    } ?>>
                                </td>

                                <td>
                                    <input value="Update" class="btn btn-warning" type="submit" data-toggle="collapse" data-target="#<?php echo $user['id']; ?>" aria-expanded="false" aria-controls="collapseExample">

                            </form>

                            </td>
                            <td>
                                <form action="../php/delete-message.php" method="POST">
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