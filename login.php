<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $username = $_POST["Name"];
    $password = $_POST["password"];
    
    $query = " SELECT * FROM users WHERE Name='$username' ";
    $result = mysqli_query($conn, $query);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        while($row = mysqli_fetch_assoc($result)){
            if(password_verify($password, $row['password'])){
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true ;
                $_SESSION['username'] = $username ;
                header("location: index.php");      // USED TO REDIRECT TO ANOTHER PAGE
            }
            else {
                $showError = "Incorrect Password !";
            }
        }
    }
    else {
        $showError = "Username does not exist ! Please Sign up .";
    }
}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Login</title>

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
        if($login){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> You have been logged in ! Welcome !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div> ';
        }
        if($showError){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> '. $showError.'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div> ';
        }
    ?>
    
    <div class="container">
        <form action="login.php" method="post">
            <h1>Login to our website !</h1>
            <br>
            <div class="mb-3">
                <label for="Name" class="form-label">Username</label>
                <input type="name" class="form-control" id="Name" name="Name" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>  
            <button type="submit" class="btn btn-primary">Submit</button>
            <br>
            <p style="text-align: center">New User ? <br>Create Account <a href="register.php">Sign Up</a></p>
        </form>
    </div>
</body>
</html>