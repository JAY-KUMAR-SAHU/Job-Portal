<?php
$showAlert = false;
$showErrorname = false;
$showErrorpassword = false;
$showErrornumber = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $number = $_POST["phone_no"];
    $exists=false;
    
    $query = "SELECT Name FROM users WHERE Name='$username'";
    $present = mysqli_query($conn, $query);
    if (mysqli_num_rows($present) != 0)
    {
        $showErrorname = "Username Already Exists ! Please try another username .";
        $exists=true;
    }
    if($password != $cpassword){
        $showErrorpassword = "Passwords do not match";
    }
    if($number < 1000000000 || $number > 10000000000){
    }

    if($password == $cpassword && $exists == false && ($number > 1000000000 && $number < 10000000000)){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`Name`, `email`, `password`, `phone_no`, `date+time`, `profilephoto`) VALUES ('$username', '$email', '$hash', '$number', CURRENT_TIMESTAMP, '0');";
        $result = mysqli_query($conn, $sql);
        if ($result){
            $showAlert = true;
        }
    }
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

    <title>Register</title>

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

    <?php
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your account is now created and you can login
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div> ';
        }
        if($showErrorname){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> '. $showErrorname.'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div> ';
        }
        if($showErrorpassword){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> '. $showErrorpassword.'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div> ';
        }
        if($showErrornumber){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> '. $showErrornumber.'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div> ';
        }
    ?>

    <div class="container">
        <form action="./register.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="exampleInputName1" name="username" maxlength="40" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" maxlength="40" required>
                <small id="emailHelp" class="form-text">We'll never share your email with anyone else </small>
            </div>
            
            <div class="mb-3">
                <label for="phone_no" class="form-label">Phone Number</label>
                <input type="number" class="form-control" id="phone_no" name="phone_no" maxlength="12" required>
                <small id="number" class="form-text"> ** 10 digits only</small>
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" maxlength="250" minlength="8" required>
            </div>
            
            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword"  name="cpassword" maxlength="250" minlength="8" required>
                <small id="cpassword" class="form-text">Make sure to type the same password </small>
            </div>

            <input type="submit" class="btn btn-primary" value="Submit">
            <br>

            <p style="text-align: center">Already Registered ? <a href="login.php">Login</a></p>
        </form> <br>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>