<?php
    require '../login/connectdb.php';
    session_start();
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>payment</title>
        
    </head>
    </style>
    <body>
        <p style="text-align:center; font-size: 50px; color:black; weight:bold;">Payment</p>
        <hr>
        
        <a href="displayservices.php">
            <button type="button" style="width: 10%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none;border-radius: 4px;cursor: pointer; float: right;">BACK</button>
        </a>
        
        <div class="form boarder" style=" width: 700px;height:700px;box-sizing: border-box;">
            <fieldset style="border:2px solid blue;">
                <div class="form details"style="border-radius: 5px;background-color: #f2f2f2;padding: 20px;">
                    
                    <form action="payment.php" method="post" autocomplete="off">
                        <label>First Name</label>
                        <input type="text" disabled value="<?php echo htmlspecialchars($_SESSION['first_name'])?>"required autocomplete="off" name="first_name" style="width: 30%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box; font-size: 15px;"/>
                        <label>Last Name</label>
                        <input type="text" disabled value="<?php echo htmlspecialchars($_SESSION['last_name'])?>"required autocomplete="off" name="last_name" style="width: 30%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box; font-size: 15px;"/><br>
                        <label>Amount Payable</label><br>
                        <input type="text" required autocomplete="off" name="amount" style="width: 50%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box; font-size:15px;"/><br>
                        <label>Date</label><br>
                        <input type="date" required autocomplete="off" name="date" style="width: 32%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box; font-size: 15px;"/><br>
                        <label>Days worked</label>
                        <select name="daysworked" style="width: 26%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box; font-size: 15px;">
                            <option value="select"></option>
                            <option value="1day">1</option>
                            <option value="2days">2</option>
                            <option value="3days">3</option>
                            <option value="4days">4</option>
                            <option value="5days">5</option>
                            <option value="6days">6</option>
                            <option value="7days">7</option>
                            <option value="8days">8</option>
                            <option value="9days">9</option>
                            <option value="10days">10</option>
                            <option value="11days">11</option>
                            <option value="12days">12</option>
                            <option value="13days">13</option>
                            <option value="14days">14</option>
                            <option value="15days">15</option>
                            <option value="16days">16</option>
                            <option value="17days">17</option>
                            <option value="18days">18</option>
                            <option value="19days">19</option>
                            <option value="20days">20</option>
                            <option value="21days">21</option>
                            <option value="22days">22</option>
                            <option value="23days">23</option>
                            <option value="24days">24</option>
                            <option value="25days">25</option>
                            <option value="26days">26</option>
                            <option value="27days">27</option>
                            <option value="28days">28</option>
                            <option value="29days">29</option>
                            <option value="30days">30</option>
                            <option value="31days">31</option>
                        </select>
                        <input type="submit" value="APPLY" style="width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none;border-radius: 4px;cursor: pointer;">
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
        $amount= $_POST['amount'];
        $date= $_POST['date'];
        $daysworked= $_POST['daysworked'];
        
        
        $sql = "INSERT INTO payment (first_name, last_name,amount, date, daysworked)"
        . "VALUES ('$first_name', '$last_name','$amount','$date','$daysworked')";
        
        try{
            
            mysqli_query($conn,$sql);
            echo "<script type='text/javascript'>alert('Successfully Applied for Payment!!');</script>";;
        }
        catch(Exception $e){
            echo($e);
        }
    }
?>








