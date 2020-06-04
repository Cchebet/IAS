<?php
    /*Declaring database constants*/
    $servername = "localhost";
    $serveruser = "root";
    $serverpass = "";
    $dbname = "ca_db";
    
    //Create the database connection
    $conn = new mysqli($servername, $serveruser, $serverpass, $dbname) or die($conn->error);
    ?>

