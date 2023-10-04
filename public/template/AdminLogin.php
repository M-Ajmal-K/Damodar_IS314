<?php
session_start();

//Admin Credentials to test admin
$admin_username = "admin";
$admin_password = "admin123"; 

// Checking if form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //fetch the entered username and password
    $entered_username = $_POST['username'];
    $entered_password = $_POST['password'];

    //checking of the form credentials match with above admin credentials
    if ($entered_username === $admin_username && $entered_password === $admin_password) {
        //Setting session variable to indicate that the admin is logged in
        $_SESSION['admin_logged_in'] = true;
        //Redirect to admin page
        header("Location: AdminPage.html");
        exit();
    } else {
        //if invalid credentials, display this message
        $error_message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<link rel="stylesheet" href="forms.css">
<link rel="stylesheet" href="style.css">
<body class="mainBody">

<div class="card-body">
    <?php if (isset($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form  action="#" method="post"  style="border:1px solid #ccc; margin-top: 112px;" >
        <div class="container">
          <h1>Admin Login</h1>
          <p>Please fill in this form to Login.</p>
          <hr>
          <!--Email Field-->
          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" name="username" required>

          <!--Password Field-->
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" required>
          
          <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
          </label>
          
          <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

          <div class="clearfix">
            <button type="button" class="clear">Clear</button>
            <button type="submit" class="signupbtn">Login</button>
          </div>
        </div>
      </form>
</div>
 
</body>
</html>


