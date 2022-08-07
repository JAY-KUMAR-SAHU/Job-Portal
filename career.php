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
        echo '
               <div class="alert alert-danger alert-dismissible fade show MYALERT" role="alert">
               <strong>Error!</strong> '.mysqli_error($conn).'
          <div class="alert alert-danger alert-dismissible fade show MYALERT" role="alert">
                <strong>Error!</strong> <br> Miscellaneous error : Please do not use quotation marks, apostrophe s ! Implementaion and input error !
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <style>
        *{
            margin:0;
            padding:0;
        }
        h1, p{
            color:white;
        }
        .jobs{
            border: 1.45px solid black;
            box-shadow: 5px 5px 4px 3px grey;
            margin: 10px;
            padding: 10px;
        }
        form{
            background: white;
            padding: 10px;
            box-shadow: 5px 5px 10px 5px #888888;
        }
        form select{
            width: 100%;
            height: 40px;
            /* margin: auto; */
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

    <title>Career</title>
</head>
<body>
    <div class="row"  class="jumbotron jumbotron-fluid" style="background-image: url('./Banner-1.jpg'); background-size:100%; background-repeat:no-repeat; height:100vh;">
        <div class="col-12">
            <div>
                <div class="container">
                    <h1>Job Portal</h1>
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
                  
                        <button type="button" class="btn btn-primary" id="MODALOPEN" data-toggle="modal" data-target="#ApplyModal"> Apply Now </button>

                    </div>
                </div>';
            }
        }
        ?>
    </div>
    
    <!-- IF MODAL DOES NOT WORK IN ANY CASE , I HAVE PUT ANOTHER FORM  "Candidate_apply_form.php" 
    !!  COMMENT THE  MODAL BELOW, AND REPLACE THE BUTTON IN LINE 107 BY BELOW BUTTON

    <button type="button" class="btn btn-primary"><a href="Candidate_apply_form.php" style="text-decoration:none; color:white;">Apply Now</a></button>   

    -->

<!-- MODAL START -->
<div class="modal fade" id="ApplyModal" tabindex="-1" role="dialog" aria-labelledby="ApplyModal"      aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          
            <div class="modal-header">
                <h3 style="margin:auto;">** APPLY FOR A JOB **</h3> <br>
            </div>

            <div class="modal-body">
              
                <form method="POST" action="career.php">

                    <div class="mb-3">
                        <label for="Name" class="col-form-label">Name</label>
                        <input type="text" class="form-control" id="Name" name="Name" maxlength="40" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="apply" class="col-form-label">Applying For </label>
                        <select name="apply" placeholder="" required>
                            <?php
                            include '_dbconnect.php';
                            $sql="Select cname, position from jobs";
                            $result=mysqli_query($conn, $sql);
                            if($result->num_rows>0){
                                while($rows=$result->fetch_assoc()){
                                    echo'<option scope="row">'.$rows['position'].' - IN - '.$rows['cname'].'</ option>';
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
                        <input type="text" class="form-control" id="qual" name="qual" maxlength="100" required>
                    </div>

                    <div class="mb-3">
                        <label for="year" class="col-form-label">Year Passout / Learned the skill</label>
                        <input type="date" class="form-control" id="year" name="year" required>
                    </div>

                    <div class="modal-footer">
                        <!-- <input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value="Close"> -->
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Close</button>
                        <button type="submit" name="APPLY" class="btn btn-primary" >Apply</button>
                    </div>
                    
                </form>

                <?php
                    if(isset($_POST['APPLY'])){
                        include '_dbconnect.php' ;
                        $nameC=$_POST['Name'];
                        $applyC=$_POST['apply'];
                        $qualC=$_POST['qual'];
                        $yearC=$_POST['year'];

                        $SQL="INSERT INTO `candidates`(`Name`, `Applied_for`, `qualification`, `year_passout`) VALUES   ('$nameC','$applyC','$qualC','$yearC')";
                    }
                ?>  
          </div> <!--modal-body-->
        </div> <!--modal-content-->
    </div> <!--modal-dialog-->
</div>
<!-- MODAL END -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>