<?php
    require '../login/connectdb.php';
    session_start();
    //restrict users
    
    //if($_SESSION["usertype"]!="intern" || "administrator")
    //{
    // header('Location: displayservices.php');
    //}
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>adminservices</title>
        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                    </head>
    
    <body>
        <p style="text-align:center; font-size: 50px; color:black; weight:bold;">Services</p>
        <hr>
        <a href="../login/logout.php">
            <button type="button" style="width: 10%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none;border-radius: 4px;cursor: pointer; float: right;">LOGOUT</button>
        </a><br>
        
        <!---contextual classes to color list items using .list-group-item-success, list-group-item-info, list-group-item-warning, and .list-group-item-danger ---->
        <div class="container">
            <h2>Acess My Services</h2>
            <div class="list-group">
                <a href="profile.php" class="list-group-item list-group-item-success">Profile</a>
                <a href="internActivity.php" class="list-group-item list-group-item-info">Intern Activities</a>
                <a href="payment.php" class="list-group-item list-group-item-warning">Payment</a>
                <a href="clearance.php" class="list-group-item list-group-item-danger">Clearance</a>
                <a href="supervision.php" class="list-group-item list-group-item-info">Supervision</a>
                <a href="supervisorclearance.php" class="list-group-item list-group-item-danger">Clearance by Supervisor</a>

                <a href="finance.php" class="list-group-item list-group-item-warning">Finance</a>
                <a href="../analytics/systemSummary.php" class="list-group-item list-group-item-success">Analysis</a>
            </div>
        </div>
        
    </body>
</html>





</body>
</html>






