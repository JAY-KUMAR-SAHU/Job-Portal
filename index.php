<?php include 'header.php' ?>
<?php 
    // if($_SERVER["REQUEST_METHOD"] == "POST"){
      if(isset($_POST['applycompany'])){
      include '_dbconnect.php' ;
      $cname = $_POST["cname"];
      $pos = $_POST["pos"];
      $Jdesc = $_POST["Jdesc"];
      $CTC = $_POST["CTC"];
      $skills = $_POST["skills"];
      
      $sql = "INSERT INTO `jobs` (`cname`, `position`, `Jdesc`, `CTC`, `skills`) VALUES ('$cname', '$pos', '$Jdesc',  '$CTC', '$skills');"  ;
      $result=mysqli_query($conn, $sql);

      if($result){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> New Job Posted !
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
        .jobs{
            border: 1px solid black;
            box-shadow: 5px 5px 4px 5px grey;
            margin: 10px;
            padding: 10px;
        }
    </style>
  
    <div class="content">
      <p>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Post Job
       </button>
      </p>
      <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <form action="index.php" method="POST">
              <div class="mb3">
                <label for="Company Name">Company Name</label>
                <input type="text" class="form-control" id="cname" name="cname">
              </div> <br>
              <div class="mb3">
                <label for="position">Position</label>
                <input type="text" class="form-control" id="pos" name="pos">
              </div> <br>
              <div class="mb3">
                <label for="JobDesc">Job Description</label>
                <textarea type="text" class="form-control" id="JobDesc" rows="5" name="Jdesc"></textarea>
              </div> <br>
              <div class="mb3">
                <label for="Skills">Skills Required</label>
                <input type="text" class="form-control" id="skills" name="skills">
              </div> <br>
              <div class="mb3">
                <label for="CTC">CTC (in INR)</label>
                <input type="text" class="form-control" id="CTC" name="CTC">
              </div> <br>
              <!-- <button type="submit" class="btn btn-primary" name="job">Submit</button> -->
              <input type="submit" class="btn btn-primary" value="Submit" name="applycompany">
            </form>
        </div>
      </div>

      <br>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Company Name</th>
            <th scope="col">Position</th>
            <th scope="col">CTC (INR)</th>
          </tr>
        </thead>
        <tbody>
        <?php
            include '_dbconnect.php';
            $sql="Select cname, position, CTC from jobs";
            $result=mysqli_query($conn, $sql);
            $i=0;
            if($result->num_rows>0){
                while($rows=$result->fetch_assoc()){
                    echo'<tr>
                         <th scope="row">'.++$i.'</th>
                         <td>'.$rows['cname'].'</td>
                         <td>'.$rows['position'].'</td>
                         <td>'.$rows['CTC'].'</td>
                         </tr>';
                }
            }
            else{
                echo"";
            }
            ?>
        </tbody>

        <?php
        include '_dbconnect.php' ;
        $sql="SELECT `cname`, `position`, `CTC`, `Jdesc`, `skills` FROM `jobs`";
        $result=mysqli_query($conn, $sql);
        if($result->num_rows>0){
            while($rows=$result->fetch_assoc()){
            echo '
                <div class="col-md-12">
                    <div class="jobs">
                        <h3 style="text-align:center;">'.$rows['position'].'</h3>
                        <h4 style="text-align:center;">'.$rows['cname'].'</h4>
                        <p style="color:black; text-align:justify;">'.$rows['Jdesc'].'</p>
                        <p style="color:black;"><b>Skills Required : </b>'.$rows['skills'].'</p>
                        <p style="color:black;"><b>CTC : </b>INR '.$rows['CTC'].'</p>
                        <button type="button" class="btn btn-primary">
                        <a href="career.php" style="text-decoration:none; color:white;">Apply Now</a></button>
                    </div>
                </div>
                <br>';
            }
        }
        ?>
      </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>