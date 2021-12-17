<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload image</title>
    <style>
        #image-area {
            border: 2px solid black;
            width: 250px;
            height: 250px;
            position: absolute;
            top: 80px;
            left: 80px;
        }

        .photo_box {
            position: relative;
            text-align: center;
            height: 350px;
            background-color: rgb(240, 225, 90);
            margin-bottom: 5px;
            padding: 10px;

        }

        .photo_box:hover {
            opacity: 50%;
        }

        /* .box__dragndrop,
    .box__uploading,
    .box__success,
    .box__error {
        display: none;
    } */
    </style>
</head>

<body>
    <form action="uploader.php" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="image_type" value="user_logo">
        <div class="photo_box" name="">
            <!-- <img src="" alt="img"> -->
            Choose a photo or drag and drop it
            <span class="text-danger">(acceptable formats: .JPG, .JPEG, .PNG, .GIF)</span>
            <div id="image-area">

            </div>
        </div>
        <!-- <div clas="input-group">
            <input type="file" value="Choose photo">
            <input type="submit" value="Upload" class="btn btn-warning" name="uploadBtn">
        </div> -->
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="user_photo_upload" name="uploadedFile" accept=".jpg,.png, .jpeg, .gif">
                <label class="custom-file-label" for="user_photo_upload">Choose file</label>
            </div>
            <div class="input-group-append">
                <button class="btn btn-warning" type="submit" value="Upload" name="uploadBtn">Upload</button>
            </div>
        </div>

    </form>

    <!-- <form class="box" method="post" action="uploader.php" enctype="multipart/form-data">
        <div class="box__input">
            <input class="box__file" type="file" name="files[]" id="file" data-multiple-caption="{count} files selected" multiple />
            <label for="file"><strong>Choose a file</strong><span class="box__dragndrop"> or drag it here</span>.</label>
            <button class="box__button" type="submit">Upload</button>
        </div>
        <div class="box__uploading">Uploading…</div>
        <div class="box__success">Done!</div>
        <div class="box__error">Error! <span></span>.</div>
    </form> -->

</body>

</html>