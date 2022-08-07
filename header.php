<?php 
  session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true ){
    header("location: login.php");
    exit;
  }

  $varname = $_SESSION['username'];
  
  //////////////////////// REMOVE PROFILE /////////////////////////////
  if(isset($_POST['removeprofile'])){
    include '_dbconnect.php';

    $query = "UPDATE `users` SET `profilephoto` = '0' WHERE `users`.`Name` = '$varname';";
    $remove = mysqli_query($conn, $query);

    if($remove){
      echo '
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> Your profile photo has been removed !
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div> ';
    }
    else{
      echo '  
        <div class="alert alert-danger alert-dismissible fade show MYALERT" role="alert">
            <strong>Error !</strong>'; echo mysqli_error($conn); echo'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
        </div> ';
    }
  }

  //////////////////////// UPLOAD PROFILE /////////////////////////////
  if(isset($_POST['submitprofile'])){
    include '_dbconnect.php';

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

    $allowed = array('gif', 'jpg', 'jpeg', 'png');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 100000000){
                // uniqid() is BASED ON UPLOAD TIME so that any image doesn't get overwritten
                $fileNameNew = $varname.".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                $moved = move_uploaded_file($fileNameNew, $fileDestination);
                echo 'line 63 ;';
                if($moved){
                  echo'Uploaded !!'; echo $moved; echo '.';
                }
                else{
                  echo 'Not Uploaded !!' ;
                }
                if (!is_writeable('uploads/' . $fileNameNew)) {
                  echo "Cannot write to destination file";
               }

                // $query = "UPDATE `users` SET `profilephoto` ='1' WHERE Name = '$varname' ";
                $query = "UPDATE `users` SET `profilephoto` = '100' WHERE `users`.`Name` = '$varname' ";
                $profile = mysqli_query($conn, $query);
                if($profile){
                    echo '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> Your profile photo has been updated !
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"> × </span>
                            </button>
                        </div> ';
                }
                else{
                    echo '  
                      <div class="alert alert-danger alert-dismissible fade show MYALERT" role="alert">
                          <strong>Error !</strong>'; echo mysqli_error($conn); echo'
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                      </div> ';
                }
            }
            else{
              echo '  
              <div class="alert alert-danger alert-dismissible fade show MYALERT" role="alert">
              <strong>Error !</strong> The file size is too big !!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
              </button>
              </div> ';
            }
        }
        else{
          echo '  
            <div class="alert alert-danger alert-dismissible fade show MYALERT" role="alert">
                <strong>Error !</strong>'; echo mysqli_error($conn); echo'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div> ';
              echo mysqli_error($conn);
        }
    }
    else{
      echo '  <div class="alert alert-danger alert-dismissible fade show MYALERT" role="alert">
          <strong>Error !</strong> You cannot upload files of this type !!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
          </button>
      </div> ';
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f55c8a6e00.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Dashboard - <?php echo $_SESSION['username']?></title>
    <style>
    .sidebar {
      margin: 0;
      padding: 0;
      width: 200px;
      background-color: #f1f1f1;
      position: fixed;
      height: 100%;
      overflow: auto;
    }

    /* Sidebar links */
    .sidebar a {
      display: block;
      color: black;
      padding: 16px;
      text-decoration: none;
    }

    /* Active/current link */
    .sidebar a.active {
      background-color: #04AA6D;
      color: white;
    }

    /* Links on mouse-over */
    .sidebar a:hover:not(.active) {
      background-color: #555;
      color: white;
    }

    /* Page content. The value of the margin-left property should match 
    the value of the sidebar's width property */
    div.content {
      margin-top: 60px;
      margin-left: 200px;
      padding: 1px 16px;
      height: 1000px;
    }

    /* On screens that are less than 700px wide, make the sidebar into a topbar */
    @media screen and (max-width: 700px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }
      .sidebar a {float: left;}
      div.content {margin-left: 0;}
    }

    /* On screens that are less than 400px, display the bar vertically, instead of  horizontally */
    @media screen and (max-width: 400px) {
      .sidebar a {
        text-align: center;
        float: none;
      }
    }

    .MYALERT{
      text-align: center;
      align-items: center;
    }

    .profile img{
      height: 250px;
      /* width: 200px; */
      /* border-radius: 50%; */
      padding: 8px;
      
    }
    </style>
</head>

<body>
<?php require '_nav.php' ?>
    <!-- The sidebar -->
    <div class="sidebar" >
      <a class="active" href="career.php">Jobs</a>
      <a href="jobs.php">Candidates Applied</a>
      <a href="contact.php">Contact</a>
      <a href="#about">About</a>
    </div>  

    <!-- Welcome - <?php echo $_SESSION['username'] ?> -->
    <h1 class="alert-heading MYALERT"><b>Welcome - <?php echo $_SESSION['username'];

    include '_dbconnect.php';
    $sql = "SELECT `profilephoto` FROM `users` WHERE `Name`= '$varname'";
    $available = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($available);
    $prof=$row['profilephoto'];

    if($prof != 0){
      echo '</b><br><div class="profile"><img src="../InternJob/uploads/FIRST.jpg" alt=""></div>';
    }
    else{
      echo '</b><br><div class="profile"><img src="../InternJob/uploads/default_profile.jpg" alt=""></div>';
    }

    echo'
        <p>
          <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePROFILE"     aria-expanded="false" aria-controls="collapseExample">
          Change/Upload Profile Picture</button>
        </p> 
        <div class="collapse" id="collapsePROFILE">
            <div class="btn">
                <form action="index.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="file" class="form-control" id="file" name="file" required>
                    </div>
                    <input type="submit" class="btn btn-success" name="submitprofile">
                </form>
            </div>
        </div>
        
        <form action="index.php" method="POST">
            <input  type="submit" class="btn btn-danger" name="removeprofile" value="Remove">
        </form> ';
    ?></h1>