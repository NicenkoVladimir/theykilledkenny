<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<body style="background-color:rgb(240, 225, 90);">
    <center>



        <?php
        session_start();
        include('config.php');
        $user_id = $_SESSION['id'];
        if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload') {
            if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
                // get details of the uploaded file

                $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
                $fileName = $_FILES['uploadedFile']['name'];
                $fileSize = $_FILES['uploadedFile']['size'];
                $fileType = $_FILES['uploadedFile']['type'];
                $fileNameCmps = explode(".", $fileName);
                $fileExtension = strtolower(end($fileNameCmps));
                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');
                if (in_array($fileExtension, $allowedfileExtensions)) {
                    // directory in which the uploaded file will be moved
                    $uploadFileDir = '../images/users/';
                    $dest_path = $uploadFileDir . $newFileName;

                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        $query = "UPDATE users SET `photo`='" . $dest_path . "' WHERE `id`=" . $user_id;
                        mysqli_query($link, $query) or die(mysqli_error($link));
                        echo '<h3 class="text-success">Photo is successfully updated</h3>
                    <img src=' . $dest_path . ' style="max-height:300px;" class="img-thumbnail rounded-circle">';
                    } else {
                        echo '<h3 class="text-danger">Error occured while uploading photo, please try again</h3>
                    <img src="../images/error.png" style="max-height:300px;" class="img-thumbnail rounded-circle">';
                    }
                }
            }
        }
        ?>
        <div class="text-secondary">
            this page will be automatically closed in 5 sec
        </div>

    </center>
    <script type="text/javascript">
        setTimeout("window.close();", 5000);
    </script>
</body>