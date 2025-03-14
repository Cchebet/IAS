<?php
    /* Main page with two forms: sign up and log in */
    require 'connectdb.php';
    
    session_start();
    ?>
<!DOCTYPE html>
<html>
<head>
<title>Sign-Up/Login Form</title>
<?php include 'css/css.html'; ?>
</head>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (isset($_POST['login'])) { //user logging in
            
            require 'login.php';
            
        }
        
        elseif (isset($_POST['register'])) { //user registering
            
            require 'register.php';
            
        }
    }
    ?>
<body>
<div class="form">

<ul class="tab-group">
<li class="tab"><a href="#signup">Sign Up</a></li>
<li class="tab active"><a href="#login">Log In</a></li>
</ul>

<div class="tab-content">

<div id="login">
<h1>Welcome Back!</h1>

<form action="index.php" method="post" autocomplete="off">

<div class="field-wrap">
<label>
Username<span class="req">*</span>
</label>
<input type="username" required autocomplete="off" name="username"/>
</div>

<div class="field-wrap">
<label>
Password<span class="req">*</span>
</label>
<input type="password" required autocomplete="off" name="password"/>
</div>

<button class="button button-block" name="login" />Log In</button>

</form>

</div>

<div id="signup">

<form action="index.php" method="post" autocomplete="off">

<div class="top-row">
<div class="field-wrap">
<label>
First Name<span class="req">*</span>
</label>
<input type="text" required autocomplete="off" name='first_name' />
</div>

<div class="field-wrap">
<label>
Last Name<span class="req">*</span>
</label>
<input type="text"required autocomplete="off" name='last_name' />
</div>
</div>

<div class="field-wrap">
<label>
Username<span class="req">*</span>
</label>
<input type="username"required autocomplete="off" name='username' />
</div>

<div class="field-wrap">
<label>
Set A Password<span class="req">*</span>
</label>
<input type="password"required autocomplete="off" name='password'/>
</div>

<button type="submit" class="button button-block" name="register" />Register</button>

</form>

</div>

</div><!-- tab-content -->

</div> <!-- /form -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="js/index.js"></script>

</body>
</html>

