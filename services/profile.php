<?php
    require '../login/connectdb.php';
    session_start();
    //$_SESSION['usertype'] = $_POST['usertype'];
    
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>profile</title>
        
    </head>
    </style>
    <body>
        
        <p style="text-align:center; font-size: 50px; color:black; weight:bold;">Profile</p>
        <hr>
        
        
        <!--<a href='./adminservices.php' class="btn btn-info">back</a>--->
        
        <a href="displayservices.php">
            <button type="button" name="back" style="width: 10%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none;border-radius: 4px;cursor: pointer; float: right;">BACK</button>
        </a>
        <!---redirect according to usertype--->
        <?php
            $username = $_SESSION['username'];
            $query="SELECT usertype from person WHERE username = '$username'";
            $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
            
            while($row=mysqli_fetch_assoc($result))
            {
                $usertype=$row['usertype'];
            }
        if($usertype == 'administrator'){
            //header("location: adminservices.php");
            echo "<a href='adminservices.php' class='btn btn-info'>back</a>";
        }
        elseif($usertype == 'intern'){
            //header("location: internervices.php");
            echo "<a href='internservices.php' class='btn btn-info'>back</a>";
        }
        if($usertype == 'supervisor'){
            //header("location: supervisorservices.php");
            echo "<a href='supervisorservices.php' class='btn btn-info'>back</a>";
        }
        elseif($usertype == 'finance head'){
            //header("location: financeservices.php");
            echo "<a href='financeservices.php' class='btn btn-info'>back</a>";
        }
    
        ?>
        
        <p style= "color:red;font-weight:bold; font-size: 20px;"> If you have already updated your profile go back to access services<span style="color:red;">*</span>
        </p>
        
        <div class="form boarder" style=" width: 700px;height:700px; box-sizing:border-box;">
            <fieldset style="border:2px solid blue;">
                <div class="form details"style="border-radius: 5px;background-color: #f2f2f2;padding: 20px;">
                    <h1><a name= "details"> Details</h1>
                    <form action="profile.php" method="post" autocomplete="off">
                        <label>Username</label>
                        <input type="text" disabled value="<?php echo htmlspecialchars($_SESSION['username'])?>" required autocomplete="off" name="username" style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box; font-size: 15px;"/>
                        <label>Bank Name</label>
                        <input type="text" required autocomplete="off" name="bnkname" style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box; font-size: 15px;"/>
                        <label>Bank Account Number</label>
                        <input type="text" required autocomplete="off" name="bnkaccount" style="width: 35%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box; font-size: 15px;"/>
                        <label>National ID</label>
                        <input type="text" required autocomplete="off" name="nationalID" style="width: 20%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box; font-size: 15px;"/><br>
                        <label>User Type</label>
                        <select name= "usertype" value="<?php echo htmlspecialchars($_SESSION['usertype'])?>"style="width: 26%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box; font-size: 15px;">
                            <option value="select"></option>
                            <option value="administrator">Administrator</option>
                            <option value="intern">Intern</option>
                            <option value="finance head">Finance Head</option>
                            <option value="supervisor">Supervisor</option>
                        </select>
                        <input type="submit" value="UPDATE" name= "submit "style="width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none;border-radius: 4px;cursor: pointer;">
                            </form>
                </div>
            </fieldset>
        </div> <!-- /form -->
    </body>
</html>


<?php
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        $bnkname= $_POST['bnkname'];
        $username=$_SESSION['username'];
        $bnkaccount= $_POST['bnkaccount'];
        $nationalID= $_POST['nationalID'];
        $usertype= $_POST['usertype'];
        
        $sql = "UPDATE person set bnkname='$bnkname', bnkAccountNo='$bnkaccount', nationalID='$nationalID', usertype='$usertype' WHERE username = '$username'";
        
        try{
            mysqli_query($conn,$sql);
            echo "<script type='text/javascript'>alert('Successfull Profile Update!! You can now go back to access services');</script>";
        }
        catch(Exception $e){
            echo($e);
        }
        
       


        }


    ?>







