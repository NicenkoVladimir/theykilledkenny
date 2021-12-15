<p>
    <small><a href="?page=home">Home </a> --> <a href="?page=profile">Profile </a> --> Registered users</small>
</p>

<?php
require_once './php/config.php';
if (isset($_SESSION['status']) && $_SESSION['status'] == 1) :
    $result = mysqli_query($link, "SELECT users.id as id, email, name, surname, registration_date, ban_reason,
 active, banned, statuses.status as status FROM users 
 LEFT JOIN statuses ON statuses.id = users.status_id") or die(mysqli_error($link));
    if (mysqli_num_rows($result) == 0) {
        echo 'There are no registered users yet';
    } else {
        for ($users = []; $row = mysqli_fetch_assoc($result); $users[] = $row);
    }
    mysqli_free_result($result);
?>
    <script>
        function showBanReasonField() {
            var inputs = document.querySelectorAll("input[name='ban_reason']");
            var selects = document.querySelectorAll("select[name='banStatus']");
            inputs.forEach(function(input, index) {
                if (selects[index].value == '1') {
                    input.style.display = 'block';
                } else {
                    input.style.display = 'none';
                }
            })
        }

        function checkBanStatus() {
            var inputs = document.querySelectorAll("input[name='ban_reason']");
            var selects = document.querySelectorAll("select[name='banStatus']");

        }
    </script>

    <body onload="showBanReasonField()">


        <h4 class="text-primary text-center">List of registered users<span class="text-danger small">
                (only for admins accessable)
            </span></h4>
        <table class="table table-striped table-hover text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Reg_date</th>
                    <th>Active</th>
                    <th>Banned</th>
                    <th>Status</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['surname']; ?></td>
                        <td><?php echo $user['registration_date']; ?></td>
                        <td><?php echo $user['active']; ?></td>
                        <td><?php echo $user['banned']; ?></td>
                        <td><?php echo $user['status']; ?></td>
                        <td>

                            <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#<?php echo $user['id']; ?>" aria-expanded="false" aria-controls="collapseExample">
                                Update user
                            </button>

                        </td>
                        <td>
                            <form action="../php/delete-profile.php" method="post">
                                <input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
                                <button type="submit" class="btn btn-danger" onclick="confirm('Are you sure you want to remove <?php echo $user['name'] ?> ?')">delete</button>
                            </form>
                        </td>
                    </tr>

                    <tr class="collapse" id="<?php echo $user['id']; ?>">
                        <form action="../php/update-profile.php" method="post">
                            <input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
                            <td></td>
                            <td colspan="5">
                                <input placeholder="Type the reason of ban" value="<?php echo $user['ban_reason']; ?>" type="text" name="ban_reason" class="form-control">

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
                                    <option value="2" <?php if ($user['status'] == 'customer') {
                                                            echo 'selected';
                                                        } ?>>customer</option>
                                    <option value="3" <?php if ($user['status'] == 'illustrator') {
                                                            echo 'selected';
                                                        } ?>>illustrator</option>
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

    <?php endif;

    ?>

    </body>