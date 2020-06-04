<?php
    require '../login/connectdb.php';
    session_start();
    ///restrict users
    //$query ="SELECT usertype FROM person";
    //$result = mysqli_query($conn, $query);
    
    //if($result==intern, administrator){
    
    //}
    
    
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>diary</title>
        
    </head>
    </style>
    <body>
        <p style="text-align:center; font-size: 50px; color:black; weight:bold;">Diary Activities</p>
        <hr>
        
        <a href="displayservices.php">
            <button type="button" style="width: 10%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none;border-radius: 4px;cursor: pointer; float: right;">BACK</button>
        </a>
        
        <div class="form boarder" style=" width: 700px;height:700px;box-sizing: border-box;">
            <fieldset style="border:2px solid blue;">
                <div class="form details"style="border-radius: 5px;background-color: #f2f2f2;padding: 20px;">
                    
                    <h1><a name= "details"> Diary Activities</h1>
                    <form action="internActivity.php" method="post" autocomplete="off">
                        
                        
                        <!----<input type= "text" name="personId" value="<?php echo htmlspecialchars($_SESSION['personId'])?>">--->
                    
                        <label>First Name</label>
                        <input type="text" readonly value="<?php echo htmlspecialchars($_SESSION['first_name'])?>"required autocomplete="off" name="first_name" style="width: 30%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box; font-size: 15px;"/>
                        <label>Last Name</label>
                        <input type="text" readonly value="<?php echo htmlspecialchars($_SESSION['last_name'])?>"required autocomplete="off" name="last_name" style="width: 30%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box; font-size: 15px;"/><br>
                        <label>Username</label>
                        <input type="text" readonly value="<?php echo htmlspecialchars($_SESSION['username'])?>" required autocomplete="off" name="username" style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box; font-size: 15px;"/>
                        <label>Activity Details</label>
                        <input type="text" required autocomplete="off" name="details" style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box; font-size: 15px;"/>
                        <label>Date</label><br>
                        <input type="date" required autocomplete="off" name="activitydate" style="width: 32%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box; font-size: 15px;"/>
                        <a href="viewMyActivities.php">
                            <button type="button" style="width: 10%; background-color: #bfbfbf; color: white; padding: 14px 20px; margin: 8px 0; border: none;border-radius: 4px;cursor: pointer;">View</button>
                        </a>
                        <input type="submit" value="UPDATE" name="up_date"  style="width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none;border-radius: 4px;cursor: pointer;">
                    </form>
                </div>
            </fieldset>
        </div> <!-- /form -->
        
    </body>
</html>

<?php
    
    if(isset($_POST['up_date'])){
        
        $username=$_POST['username'];
        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        $details=$_POST['details'];
        $activitydate= $_POST['activitydate'];
        
        $sql = "INSERT INTO interndiary (first_name, last_name, details, activitydate)"
        . "VALUES ('$first_name', '$last_name', '$details','$activitydate')";
        $conn->query($sql);
        
        try{
            mysqli_query($conn,$sql);
            echo "<script type='text/javascript'>alert('Successfull Diary-Activity Update!!');</script>";
        }
        catch(Exception $e){
            echo($e);
        }
    }
?>

