<?php include 'header.php' ?>

    <div class="content">
        <table class="table" style="text-align:center;">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Candidate's Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Year Passout</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '_dbconnect.php';
                $sql="Select Name, Applied_for, year_passout from candidates";
                $result=mysqli_query($conn, $sql);
                $i=0;
                if($result->num_rows>0){
                    while($rows=$result->fetch_assoc()){
                        echo'<tr>
                             <th scope="row">'.++$i.'</th>';
                            //  <td>'.$rows['Name'].'</td>
                        echo'<td>****</td>
                             <td>'.$rows['Applied_for'].'</td>
                             <td>'.$rows['year_passout'].'</td>
                             </tr>';
                    }
                }
                else{
                    echo"";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>