<?php include 'header.php' ?>
<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      include '_dbconnect.php' ;
      $Name = $_POST["Name"];
      $apply = $_POST["apply"];
      $qual = $_POST["qual"];
      $date = $_POST["year"];
      
      $sql = "INSERT INTO `candidates` (`Name`, `Applied_for`, `qualification`, `year_passout`) VALUES ('$Name', '$apply', '$qual', '$date');"  ;
      $result=mysqli_query($conn, $sql);

      if($result){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Application has been submitted ! We will contact you soon if nominated !!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div> ';
      }
      else{
              // <div class="alert alert-danger alert-dismissible fade show MYALERT" role="alert">
              // <strong>Error!</strong> '.mysqli_error($conn).'
        echo '  <div class="alert alert-danger alert-dismissible fade show MYALERT" role="alert">
                <strong>Error!</strong> Please do not use quotation marks, apostrophe s ! Implementaion and input error !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div> ';
      }
    }
?>

<style>
        body{
            background-image: url('./Apply_Background.jpg');
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
        form select{
            width: 100%;
            height: 40px;
            margin: auto;
            padding: 6px;
            font-size: 15px;

            border-radius: 3px;
            border:1px solid #DED8D6;
            background:white;
        }
        form select:focus{
            box-shadow: 1px 1px 8px rgba(255, 255, 255);
            background:black;
            color: white;
        }
    </style>

<div class="container">
    <form action="./Candidate_apply_form.php" method="POST" style="margin:auto; width:450px">
        <h3 style="margin:auto;">** APPLY FOR A JOB **</h3> <br>
        <div class="mb-3">
          <label for="Name" class="col-form-label">Name</label>
          <input type="text" class="form-control" id="Name" name="Name" required>
        </div>
        Applying For  <br>
        <div class="mb-3">
        <select name="apply" placeholder="" required>
            <?php
            include '_dbconnect.php';
            $sql="Select cname, position from jobs";
            $result=mysqli_query($conn, $sql);
            if($result->num_rows>0){
                while($rows=$result->fetch_assoc()){
                    echo'<option scope="row">'.$rows['position'].' ________ in '.$rows['cname'].'</option>';
                }
            }
            else{
                echo"";
            }
            ?>
        </select>
        </div>
        <div class="mb-3">
          <label for="qual" class="col-form-label">Qualification</label>
          <input type="text" class="form-control" id="qual" name="qual" required>
        </div>
        <div class="mb-3">
          <label for="year" class="col-form-label">Year Passout / Learned the skill</label>
          <input type="date" minvalue="1980" maxvalue="2021" class="form-control" id="year" name="year" required>
        </div>
        <input type="submit" class="btn btn-primary" value="Submit">
    </form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>