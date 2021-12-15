<?php
if (isset($_GET['id']) && !empty($_GET['id'])):
    $result = mysqli_query($link, "SELECT *, statuses.status as status FROM users
      LEFT JOIN statuses ON users.status_id = statuses.id")or die(mysqli_error($link));
    for ($users = []; $row = mysqli_fetch_assoc($result); $users[] = $row) ;
    mysqli_free_result($result);
    $user = array_filter($users, function($val) {
          return $val['id'] == $_GET['id'];
    })[0];
    
     /*function getPrevId ($id) {
        return $id++;
    }*/
?>
    <div class="card m-auto" style="width: 18rem;">
        <img class="card-img-top" src="<?php echo $user['photo'] ?>"
        alt="<?php echo $user['name'] ?>" >
        <div class="card-header text-primary">
            <h4>
                <?php echo $user['name'].' '. $user['surname'] ?>
            </h4>
        </div>
        <div class="card-body">
            <p class="card-text">
                <strong>Email: </strong> <?php echo $user['email'] ?><br>
                <strong>Registration date: </strong> <?php echo $user['registration_date'] ?><br>
                <strong>Status: </strong> <?php echo $user['status'] ?><br>
            </p>
        </div>
    </div>

    <nav class="text-center">
        <a href="<?php echo '/?page=list&id='.getPrevId() ?>" class="btn btn-link">Back</a>
        <a href="<?php echo '/?page=list&id='.getNextId() ?>" class="btn btn-link">Forward</a>
    </nav>


<?php else:
     echo '<h4>No users for reviewing</h4>';
     endif;
?>



