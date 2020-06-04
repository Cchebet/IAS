<?php
    /* Log out process, unsets and destroys session variables */
    session_start();
    session_unset();
    session_destroy();
    ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Logout</title>
<?php include 'css/css.html'; ?>
</head>

<body>
<div class="form">
<h1>Account successfully logged out</h1>



<a href="index.php"><button class="button button-block"/>Home</button></a>

</div>
</body>
</html>

