<?php

if(isset($_POST['submit'])){
    include '_dbconnect.php';
    $username = $_POST["username"];
    $info = $_POST["info"];

    $file = $_FILES['file'];
    // A file is submitted with name, extension, location, ... as an ARRAY, to print
    // print_r($file);

    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 100000000){
                // uniqid() is BASED ON UPLOAD TIME so that any image doesn't get overwritten
                // $fileNameNew = uniqid('', true).".".$fileActualExt;

                $fileNameNew = $username.".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                echo "_______________________________---________-__--___-_SUCCESS !";
            }else{
                echo "The file size is too big !!";
            }
        }else{
            echo "There was an error uploading your file !!";
        }
    }
    else{
        echo "You cannot upload files if this type !!";
    }

    $sql="INSERT INTO `images` (`username`, `filename`, `info`) VALUES ('$username', '$fileName', '$info');";
    $result = mysqli_query($conn, $sql);
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>UPLOAD IMAGE</title>

    <style>
        body{
            background-image: url('./Background\ Image.jpg');
            background-size:cover;
            background-repeat: no-repeat;
        }
        form{
            background: white;
            margin-top: 8%;
            margin-left: 57.5%;
            padding: 20px;
            box-shadow: 10px 10px 8px 10px #888888;
        }
    </style>
</head>
<body> 
    <?php require '_nav.php' ?>

    <div class="container">
        <form action="IMAGE.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" maxlength="40" required>
            </div>
            
            <div class="mb-3">
                <label for="image" class="form-label">UPLOAD</label>
                <input type="file" class="form-control" id="file" name="file" required>
            </div>
            
            <div class="mb-3">
                <label for="info" class="form-label">Info</label>
                <textarea id="info" cols="30" rows="5" name="info"></textarea>
            </div>

            <input type="submit" class="btn btn-primary" name="submit">
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>