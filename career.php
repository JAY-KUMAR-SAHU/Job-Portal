<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <style>
        *{
            margin:0;
            padding:0;
        }
        /* h1, p{
            color:white;
        } */
        .jobs{
            border: 1.45px solid black;
            box-shadow: 5px 5px 4px 3px grey;
            margin: 10px;
            padding: 10px;
        }
    </style>
    <title>Career</title>
</head>
<body>
    <div class="row"  class="jumbotron jumbotron-fluid" style="background-image: url('Banner_1.jpg'); background-size:100%; background-repeat:no-repeat; height:100vh;">
        <div class="col-12">
            <div>
                <div class="container">
                    <h1>Job Portal --> Career Page</h1>
                    <p>Best Jobs available matching your skills</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php
        include '_dbconnect.php' ;
        $sql="SELECT cname, position, Jdesc, CTC, skills from jobs";
        $result=mysqli_query($conn, $sql);
        if($result->num_rows>0){
            while($rows=$result->fetch_assoc()){
                echo '
                <div class="col-md-4" style="padding: 15px;">
                    <div class="jobs" style="padding: 20px;">
                        <h3 style="text-align:center;">'.$rows['position'].'</h3>
                        <h4 style="text-align:center;">'.$rows['cname'].'</h4>
                        <p style="color:black; text-align:justify;">'.$rows['Jdesc'].'</p>
                        <p style="color:black;"><b>Skills Required : </b>'.$rows['skills'].'</p>
                        <p style="color:black;"><b>CTC : </b>INR '.$rows['CTC'].'</p>
                        <button type="button" class="btn btn-primary">
                        <a href="Candidate_apply_form.php" style="text-decoration:none; color:white;">Apply Now</a></button>
                    </div>
                </div>';
            }
        }
        ?>

        <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"       aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">APPLY</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> </button>
              </div>
              <div class="modal-body">
                <form method="POST" action="career.php">
                  <div class="mb-3">
                    <label for="Name" class="col-form-label">Name</label>
                    <input type="text" class="form-control" id="Name" name="Name">
                  </div>
                  <div class="mb-3">
                    <label for="apply" class="col-form-label">Applying For</label>
                    <input type="text" class="form-control" id="apply" name="apply">
                  </div>
                  <div class="mb-3">
                    <label for="qual" class="col-form-label">Qualification</label>
                    <input type="text" class="form-control" id="qual" name="qual">
                  </div>
                  <div class="mb-3">
                    <label for="year" class="col-form-label">Year Passout</label>
                    <input type="number" minvalue="1980" maxvalue="2021" class="form-control" id="year" name="year">
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="APPLY" class="btn btn-primary" >Apply</button>
                </form> -->

                <?php
                    if(isset($_POST['APPLY'])){
                        include '_dbconnect.php' ;
                        $nameC=$_POST['Name'];
                        $applyC=$_POST['apply'];
                        $qualC=$_POST['qual'];
                        $yearC=$_POST['year'];

                        $SQL="INSERT INTO `candidates`(`Name`, `Applied_for`, `qualification`, `year_passout`) VALUES ('$nameC','$applyC','$qualC','$yearC')";
                    }
                ?>
              </div>
            </div>
          </div>
        </div>

    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>