<?php
    require '../login/connectdb.php';
    session_start();
    $query ="SELECT  * FROM clearance";
    $result = mysqli_query($conn, $query);
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>supervision</title>
        <?php include 'css.html'; ?>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    </head>
    <style>
        .clicked{
            background-color:green;
        }
    </style>
    <body>
        <p style="text-align:center; font-size: 50px; color:black; weight:bold;">Intern Clearance</p>
        <a href="displayservices.php">
            <button type="button" style="width: 10%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none;border-radius: 4px;cursor: pointer; float: right;">BACK</button>
        </a>
        <hr>
        
        
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Clearance No.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Contract Term From</th>
                    <th>Contract Term To</th>
                    <th>Clearance</th>
                    
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Clearance No.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Contract Term From</th>
                    <th>Contract Term To</th>
                    <th>Clearance</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                    while($row = mysqli_fetch_array($result))
                    {
                        echo '
                        <tr>
                        <td>'.$row["clearanceId"].'</td>
                        <td>'.$row["first_name"] .'</td>
                        <td>'.$row["last_name"] .'</td>
                        <td>'.$row["contractTermFrom"].'</td>
                        <td>'.$row["contractTermFrom"].'</td>
                        <td><button onclick="myFunction(this, event)" class="btn clear btn-primary" name= "clear" >Clear Intern</button></td>
                        </tr>
                        ';
                    }
                
                    ?>
            </tbody>
        </table>
        <script>
            function myFunction(element, event) {
                console.dir(event);
                event.srcElement.classList.add('clicked');
                console.dir(element);
            }
        </script>
    </body>
</html>
<script>
    $(document).ready(function() {
                      $('.clear').on('click', function(){
                                      console.log('clicked');
                                      $(this).addClass('clicked');
                                      });
                      $('#table').DataTable();
                      } );
    </script>










