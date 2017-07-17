<?

include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['add'])) {
    $itemname = mysqli_real_escape_string($con, $_POST['itemname']);
    $price= mysqli_real_escape_string($con,$_POST['price']);
    $category= mysqli_real_escape_string($con,$_POST['category']);

    if (!preg_match("/^[a-zA-Z ]+$/",$itemname)) {
        $error = true;
        $itemname_error = "Item Name must contain only alphabets and space";
    }

    if (!is_numeric($price)||strlen($price) > 5) {
        $error = true;
        $price_error = "Enter Price properly";
    }  
    if (!preg_match("/^[a-zA-Z ]+$/",$category)) {
        $error = true;
        $category_error = "Item Name must contain only alphabets and space";
    }


    if (!$error) {
        if(mysqli_query($con, "INSERT INTO items (itemname,price,category) VALUES('".$itemname."',
            '" . $price . "', '" . $category . "')")) 
             {
            $successmsg = "Successfully item added";
        } else 
	    {
            $errormsg = "Error in adding...Please try again later!";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Add Items</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css1/admin.css">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,600,400italic,600italic,700' rel='stylesheet' type='text/css'>
</head>
<body>

<div id="header">
  <div class="logo">
    <a href="admin.php">ADMIN<span>PANEL</span></a>
  </div>
  
</div><?

include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['add'])) {
    $itemname = mysqli_real_escape_string($con, $_POST['itemname']);
    $price= mysqli_real_escape_string($con,$_POST['price']);
    $category= mysqli_real_escape_string($con,$_POST['category']);

    if (!preg_match("/^[a-zA-Z ]+$/",$itemname)) {
        $error = true;
        $itemname_error = "Item Name must contain only alphabets and space";
    }

    if (!is_numeric($price)||strlen($price) > 5) {
        $error = true;
        $price_error = "Enter Price properly";
    }  
    if (!preg_match("/^[a-zA-Z ]+$/",$category)) {
        $error = true;
        $category_error = "Item Name must contain only alphabets and space";
    }


    if (!$error) {
        if(mysqli_query($con, "INSERT INTO items (itemname,price,category) VALUES('".$itemname."',
            '" . $price . "', '" . $category . "')")) 
             {
            $successmsg = "Successfully item added";
        } else 
	    {
            $errormsg = "Error in adding...Please try again later!";
        }
    }
}

?>


<a class="mobile">MENU</a>


<div id="container">

  <div class="sidebar">
    <ul id="nav">
     <li><a href="admin.php">View Items</a></li>
  <li><a href="adminadditems.php">Add Items</a></li>
 <li><a href="index.php">LOGOUT</a></li>
    </ul>
    
  </div>

  <div class="content">
    <h1>Add Items</h1>
    <p></p>

    <div id="box">
     <div class="box-top">Fill these details</div>
     <div class="box-panel">
	<!--additem!-->
<div class="container">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
            
            <span class="error"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
                  

                    
                        <label>Item Name</label>
                        <input type="text" name="itemname" placeholder="Item Name" required/>
                        <span class="error"><?php if (isset($itemname_error)) echo $itemname_error; ?></span>
                        <br>

                        <label>Price</label>
                        <input type="text" name="price" placeholder="Enter Price" required/>
                        <span class="error"><?php if(isset($price_error)) echo $price_error?></span>

                        <br>                    
                        <label>category</label>
                        <input type="text" name="category" placeholder="Category" required/>
                        <span class="error"><?php if (isset($category_error)) echo $category_error; ?></span>
                        <br>
                        <input type="submit" name="add" value="Add Item" />
                   

            </form>
 	<span class="success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
	</div>
    </div>

  

  </div>


</div><!-- #container -->

<script type="text/javascript">

	$(document).ready(function(){
     $("a.mobile").click(function(){
      $(".sidebar").slideToggle('fast');
     });

    window.onresize = function(event) {
      if($(window).width() > 480){
      	$(".sidebar").show();
      }
    };


	});

</script>

</body>
</html>
