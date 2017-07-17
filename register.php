<?php

include "mail.php";
include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $phoneno= mysqli_real_escape_string($con, $_POST['phoneno']);
    $gender=mysqli_real_escape_string($con,$_POST['gender']);

    if (!is_numeric($phoneno)||strlen($phoneno) < 10) {
        $error = true;
        $phoneno_err = "Enter Phone No correctly";
    }   

    if (empty($_POST["gender"])) {
        $error= true;
        $gender_err = "Gender is required";
  } 
    //only alpha characters and space
    if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }
     if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
        $error = true;
        $username_error = "User Name must contain only alphabets and space";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please Enter Valid Email ID";
    }
    if(strlen($password) < 6) {
        $error = true;
        $password_error = "Password must be minimum of 6 characters";
    }
    if($password != $cpassword) {
        $error = true;
        $cpassword_error = "Password and Confirm Password doesn't match";
    }
    if (!$error) {
        if(mysqli_query($con, "INSERT INTO user(username,name,email,password,phoneno,gender) VALUES('".$username."',
            '" . $name . "', '" . $email . "', '" . $password . "','" . $phoneno . "','" . $gender . "')")) {
            $successmsg = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
        } else {
            $errormsg = "Error in registering...Please try again later!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link rel="stylesheet" href="css1/design.css" type="text/css" />
</head>
<body>

<!--header!-->

            <ul>
                
                <li><a href="index.php">Login</a></li>
                <li id="left"><a href="index.php">FOOD CAPTURE</a></li>
              
            </ul>   


<div class="container">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
              <span class="success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
            <span class="error"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
                    <h1>Sign Up</h1>

                    
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Enter Full Name" required/>
                        <span class="error"><?php if (isset($name_error)) echo $name_error; ?></span>
                        <br>

                        <label>User Name</label>
                        <input type="text" name="username" placeholder="Enter User Name" required/>
                        <span class="error"><?php if(isset($username_error)) echo $username_error?></span>

                        <br>                    
                        <label>Email</label>
                        <input type="text" name="email" placeholder="Email" required/>
                        <span class="error"><?php if (isset($email_error)) echo $email_error; ?></span>
                        <br>
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Password" required  />
                        <span class="error"><?php if (isset($password_error)) echo $password_error; ?></span>
                    

                        <br>
                        <label>Confirm Password</label>
                        <input type="password" name="cpassword" placeholder="Confirm Password" required />
                        <span class="error"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
                        
                        <br>
                         <label>Gender:</label><br>
                          <label>Female</label>
                        <input type="radio" name="gender" value="female">
                        <label>Male</label>
                        <input type="radio" name="gender" value="male">
                        <span class="error"><?php if (isset($gender_err)) echo $gender_err; ?></span>
                        
                        <br>
                        <label>Phone No</label>
                        <input type="text" name="phoneno" placeholder="Phone No." required />
                        <span class="error"><?php if (isset($phoneno_er)) echo $phoneno_er; ?></span>
                        <input type="submit" name="signup" value="Sign Up" />
                   

            </form>
          
 
    <div class="bottom-text">
        Already Registered? <a href="login.php">Login Here</a>
    </div>
        <br>
    <br>

</div>


<!--footer!-->


</body>
</html>
