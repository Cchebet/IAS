<?php
require '../login/connectdb.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>System Summary</title>
        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                    <style>
                        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
                        .row.content {height: 550px}
                        
                        /* Set gray background color and 100% height */
                        .sidenav {
                            background-color: #f1f1f1;
                            height: 100%;
                        }
                    
                    /* On small screens, set height to 'auto' for the grid */
                    @media screen and (max-width: 767px) {
                        .row.content {height: auto;}
                    }
                    </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row content">
                <div class="col-sm-3 sidenav hidden-xs">
                    <h2>Analysis</h2>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#section1">Dashboard</a></li>
                        <li><a href="#section2">Users</a></li>
                        <li><a href="#section3">Sessions</a></li>
                        <li><a href="#section4">Group User Count</a></li>
                        <li><a href="#section5">Activity Entries</a></li>
                        <li><a href="#section6">Payment Claims</a></li>
                        <li><a href="#section7">Cleared Interns</a></li>
                        <li><a href="../services/adminservices.php">Back</a></li>
                    </ul><br>
                </div>
                <br>
                
                <div class="col-sm-9">
                    <div class="well">
                        <h4> <a name= "section1"> Dashboard </a> </h4>
                        <p>View system summary</p>
                    
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="well">
                                <h4> <a name= "section2">Users </a></h4>
                                <?php
                                    //get last user in table person
                                    $query = "SELECT MAX(personId) FROM person";
                                    $result = mysqli_query($conn,  $query);
                                    $row = mysqli_fetch_row($result);
                                    echo "Present No. of users: " . $row[0];
                                    
                                    ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="well">
                                <h4><a name= "section3">Sessions </a></h4>
                                <?php
                                    //count sessions open at once
                                    $number_of_users = count(scandir(ini_get("session.save_path")));
                                    echo "No. of sessions opened at once: " .$number_of_users;
                                    ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="well">
                                <h4><a name= "section4">Group User Count </a></h4>
                                <?php
                                    //count no. of users according to usertype
                                    $query = "SELECT COUNT(DISTINCT usertype = 'administrator') FROM person ";
                                    $result = mysqli_query($conn,  $query);
                                    $row = mysqli_fetch_row($result);
                                    echo "Total Administrators: " .$row[0];
                                    echo '<br />';
                                    
                                    $query = "SELECT COUNT(DISTINCT usertype) FROM person ";
                                    $result = mysqli_query($conn,  $query);
                                    $row = mysqli_fetch_row($result);
                                    echo "Total interns: " .$row[0];;
                                    echo '<br />';
                                    
                                    $query = "SELECT COUNT(DISTINCT usertype = 'supervisor') FROM person ";
                                    $result = mysqli_query($conn,  $query);
                                    $row = mysqli_fetch_row($result);
                                    echo "Total Supervisors: " .$row[0];;
                                    echo '<br />';
                                    
                                    $query = "SELECT COUNT(DISTINCT usertype = 'finance head') FROM person ";
                                    $result = mysqli_query($conn,  $query);
                                    $row = mysqli_fetch_row($result);
                                    echo "Total Heads of finance: " .$row[0];;
                                    ?>
                            </div>
                        </div>
                        </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="well">
                                <h4> <a name= "section5">Activity Entries </a></h4>
                                <?php
                                    //get last activity in table interndiary
                                    $query = "SELECT MAX(activityId) FROM interndiary";
                                    $result = mysqli_query($conn,  $query);
                                    $row = mysqli_fetch_row($result);
                                    echo "Total no. of activity entries: " . $row[0];
                                    
                                    ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="well">
                                <h4><a name= "section6">Payment Claims </a></h4>
                                <?php
                                    //get last payment in table payment
                                    $query = "SELECT MAX(paymentId) FROM payment";
                                    $result = mysqli_query($conn,  $query);
                                    $row = mysqli_fetch_row($result);
                                    echo "Total payment claims made: " . $row[0];
                                    ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="well">
                                <h4><a name= "section7">Cleared Interns </a></h4>
                                <?php
                                    //get last clearance in table clearance
                                    $query = "SELECT MAX(clearanceId) FROM clearance";
                                    $result = mysqli_query($conn,  $query);
                                    $row = mysqli_fetch_row($result);
                                    echo "Total cleared interns: " . $row[0];
                                    ?>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>
<!---$sql = "SELECT usertype FROM person WHERE usertype = '" . $usertype ."'; ---->
