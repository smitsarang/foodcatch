<!DOCTYPE html>
<?
require_once 'dbconnect.php';
 
 // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
  header("Location: home.php");
  exit;
 }
 
 $error = false;
 
 if( isset($_POST['login']) ) { 
  $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $result = mysqli_query($con, "SELECT * FROM user WHERE username = '" . $username. "' and password = '" . $password . "'");


 /* // prevent sql injections/ clear user invalid inputs
  $email = mysql_real_escape_string(unescaped_string)($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  // prevent sql injections / clear user invalid inputs
 */ 
  if(empty($username)){
   $error = true;
   $usernameError = "Please enter your User name.";
  } else if ( !filter_var($username) ) {
   $error = true;
   $username_error = "Please enter valid valid username.";
  }
  
  if(empty($password)){
   $error = true;
   $pass_error = "Please enter your password.";
  }
  
  // if there's no error, continue to login
  if (!$error) {
   
   $password = ($password); // password hashing using SHA256
  
   $res=mysqli_query($con,"SELECT password FROM users WHERE username='$username'");
   $row=mysqli_fetch_array($res);
   $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
   
   $userType = $_POST['username'];

   if($userType == 'admin'&& $row['password']==$password){
    header("Location:admin.php"); // This line triggers a redirect if the user_type is admin
}else
 if($userType == 'desk'&& $row['password']==$password){
    header("Location:deskplaceorder.php"); // This line triggers a redirect if the user_type is admin
}else
 if($userType == 'kitchen'&& $row['password']==$password){
    header("Location:kitchen.php"); // This line triggers a redirect if the user_type is admin
}else 
{
    $errormsg = "Incorrect Credentials, Try again...";
   }
    
  }
  
 }

 ?>
<html >
<head>
  <meta charset="UTF-8">
  <title>FOOD CATCH</title>
  
  

      <link rel="stylesheet" href="css1/loginstyle.css">
<link rel="stylesheet" href="css1/header.css">
  
</head>

<body>

<!--header!-->
<ul>
  <li><a class="active" href="index.php">FOODCATCH</a></li>
</ul>
<!--Login form!-->

 <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
<div class="container">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
             
            <span class="error"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
                    <h1>Log in</h1>

                    
                        <br>                    
                        <label>Username</label>
                        <input type="text" name="username" placeholder="Username" required/>
                        <span class="error"><?php if (isset($username_error)) echo $username_error; ?></span>

                        <br>
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Password" required  />
                        <span class="error"><?php if (isset($password_error)) echo $password_error; ?></span>
                        <input type="submit" name="login" value="Log In" />


            </form>
</div>
</body>
</html>
