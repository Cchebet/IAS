<?php
    /* Registration process, inserts user info into the database*/
    
    // Set session variables to be used on profile.php page
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['first_name'] = $_POST['first_name'];
    $_SESSION['last_name'] = $_POST['last_name'];
    
    // Escape all $_POST variables to protect against SQL injections
    $first_name = $conn->escape_string($_POST['first_name']);
    $last_name = $conn->escape_string($_POST['last_name']);
    $username = $conn->escape_string($_POST['username']);
    $password = $conn->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
    $hash = $conn->escape_string( md5( rand(0,1000) ) );
    
    // Check if user with that username already exists
    $result = $conn->query("SELECT * FROM person WHERE username='$username'") or die($conn->error());
    
    // To know user username exists if the rows returned are more than 0
    if ( $result->num_rows > 0 ) {
        
        $_SESSION['message'] = 'User with this username already exists!';
        header("location: error.php");
        
    }
    else { // username doesn't already exist in a database, proceed...
        
        
        $sql = "INSERT INTO person (first_name, last_name, username, password, hash) "
        . "VALUES ('$first_name','$last_name','$username','$password', '$hash')";
        $result = $conn->query($sql) or die($conn->error);
        // Add user to the database
        if ($result){
            
            $_SESSION['active'] = 1; //0 since new valid user has registered
            $_SESSION['logged_in'] = true; // so to know the user has logged in
            header("location: profile.php");
        }
        
        else {
            $_SESSION['message'] = 'Registration failed!';
            header("location: error.php");
        }
       
    }

