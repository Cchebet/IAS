<?php
    /* User login process, checks if user exists and password is correct */
    
    // Escape username to protect against SQL injections
    $username = $conn->escape_string($_POST['username']);
    $result = $conn->query("SELECT * FROM person WHERE username='$username'")
    or die("Error " . $conn->error());
    
    if ( $result->num_rows == 0 ){ // User doesn't exist
        $_SESSION['message'] = "User with that username doesn't exist!";
        header("location: error.php");
    }
    else { // User exists
        $user = $result->fetch_assoc();
        
        if ( password_verify(trim($_POST['password']), $user['password']) ) {
            session_start();
            $_SESSION['username'] = $user['username'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['active'] = $user['active'];
            
            
            // This is how to know the user is logged in
            $_SESSION['logged_in'] = true;
            header("location: profile.php");
        }
        else {
            $_SESSION['message'] = "You have entered wrong password, try again!";
            header("location: error.php");
        }
    }
    

