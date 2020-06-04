<?php
    require '../login/connectdb.php';
    session_start();
    $firstName=$_SESSION['first_name'];
    $lastName=$_SESSION['last_name'];
    $query ="SELECT * FROM interndiary WHERE first_name = '$firstName' AND last_name = '$lastName'" ;
     //$query ="SELECT  activityId,first_name, last_name, activitydate, details FROM interndiary ORDER BY activityId DESC";
   $result = mysqli_query($conn, $query);
   //echo $query;
   //var_dump($result);
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>view activities</title>
        <?php include 'css.html'; ?>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    </head>
    </style>
    <body>
        <p style="text-align:center; font-size: 50px; color:black; weight:bold;">My Activities</p>
        <a href="internActivity.php">
            <button type="button" style="width: 10%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none;border-radius: 4px;cursor: pointer; float: right;">BACK</button>
        </a>
        <hr>
        
        
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Activity No.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Activity Date</th>
                    <th>Details</th>
                    
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Activity No.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Activity Date</th>
                    <th>Details</th>
                    
                </tr>
            </tfoot>
            <tbody>
                <?php
                    while($row = mysqli_fetch_array($result))
                    {
                        echo '
                        <tr>
                        <td>'.$row["activityId"].'</td>
                        <td>'.$row["first_name"] .'</td>
                        <td>'.$row["last_name"] .'</td>
                        <td>'.$row["activitydate"].'</td>
                        <td>'.$row["details"].'</td>
                        
                        </tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
        
    </body>
</html>
<script>
    $(document).ready(function() {
                      $('#table').DataTable();
                      } );
    </script>







