<?php
    require '../login/connectdb.php';
    session_start();
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>clearance</title>
    </head>
    </style>
    <body>
        <p style="text-align:center; font-size: 50px; color:black; weight:bold;">Clearance</p>
        <hr>
        
        <a href="displayservices.php">
            <button type="button" style="width: 10%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none;border-radius: 4px;cursor: pointer; float: right;">BACK</button>
        </a>
        
        <div class="form boarder" style=" width: 700px;height:700px;box-sizing: border-box;">
            <fieldset style="border:2px solid blue;">
                <div class="form details"style="border-radius: 5px;background-color: #f2f2f2;padding: 20px;">
                    <h1><a name= "details"> Clearance</h1>
                    <form action="clearance.php" method="post" autocomplete="off" enctype="multipart/form-data">
                        <label>First Name</label>
                        <input type="text" disabled value="<?php echo htmlspecialchars($_SESSION['first_name'])?>"required autocomplete="off" name="first_name" style="width: 30%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box; font-size:15px;"/>
                        <label>Last Name</label>
                        <input type="text" disabled value="<?php echo htmlspecialchars($_SESSION['last_name'])?>"required autocomplete="off" name="last_name" style="width: 30%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box; font-size:15px;"/><br>
                        <label>Contract term</label><br>
                        <label>From</label>
                        <input type="date" name="contractTermFrom" style="width: 30%; padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;font-size: 15px;">
                        <label>To</label>
                        <input type="date" name="contractTermFromTo" style="width: 30%; padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;font-size: 15px;"><br>
                        <input type="submit" value="CLEAR" name="clear" style="width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none;border-radius: 4px;cursor: pointer;">
                    </form>
                </div>
            </fieldset>
        </div> <!-- /form -->
        
    </body>
</html>

<?php
   
    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        $first_name=$_SESSION['first_name'];
        $last_name=$_SESSION['last_name'];
        $contractTermFrom= $_POST['contractTermFrom'];
        $contractTermTo= $_POST['contractTermFromTo'];
        

        
        $sql = "INSERT INTO clearance (first_name, last_name,contractTermFrom, contractTermFromTo)". "VALUES ('$first_name', '$last_name','$contractTermFrom', '$contractTermTo')";
        
        try{
            
            mysqli_query($conn,$sql);
            echo "<script type='text/javascript'>alert('Successfully Cleared!!');</script>";
        }
        catch(Exception $e){
            echo($e);
     
        }
    }
?>








