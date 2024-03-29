<?php include 'header.php' ?>
<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      include '_dbconnect.php' ;
      $name = $_POST["name"];
      $email = $_POST["email"];
      $concern = $_POST["concern"];
      
      $sql = "INSERT INTO `contactus` (`name`, `email`, `concern`, `dt`) VALUES ('$name', '$email', '$concern', CURRENT_TIMESTAMP )"  ;
      $result=mysqli_query($conn, $sql);

      if($result){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your query has been submitted ! We will contact you soon !!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div> ';
      }
      else{
            //   die("                                            Error".mysqli_error($conn));
        echo '  <div class="alert alert-danger alert-dismissible fade show MYALERT" role="alert">
                <strong>Error!</strong> Sorry for the inconvenience ! We are facing some technical issues ! Please try again after 15 minutes.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div> ';
      }
    }
?>

<style>
        body{
            background-image: url('./Contact_Background.jpg');
            background-size: calc(100% - 200px) calc(100% - 52px);
            background-position: 200px 112px;
            background-repeat: no-repeat;
        }
        form{
            background: white;
            margin-top: 3%;
            margin-left: 70%;
            padding: 20px;
            box-shadow: 10px 10px 8px 10px #888888;
            width: 400px;
        }
    </style>

<div class="container">
    <form action="./contact.php" method="POST">
        <h3>** CONTACT US **</h3>
        <small>We will definitely look into your query.</small> <br><br>
        <div class="mb-3">
          <label for="name" class="col-form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
          <label for="email" class="col-form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
          <label for="concern" class="col-form-label">Concern</label>
          <textarea type="text" class="form-control" name="concern" id="concern" columns="15" rows="5" required></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Submit">
    </form> <br>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>