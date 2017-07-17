<!DOCTYPE html>
<html>
<head>
<title>View Items</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="admin.css">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,600,400italic,600italic,700' rel='stylesheet' type='text/css'>
</head>
<body>

<div id="header">
  <div class="logo">
    <a href="admin.php">ADMIN<span>PANEL</span></a>
  </div>
  
</div>


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
    <h1>Item</h1>
    <p></p>

    <div id="box">
     <div class="box-top">Item list</div>
     <div class="box-panel">
    <?php
   $con = mysqli_connect("localhost", "root", "", "foodcatch") or die("Error " . mysqli_error($con));
   $db="user";
    // connect to databsase 

    mysqli_select_db($con,$db);



    // query the database 

    $query = mysqli_query($con,"SELECT * FROM items");

    // fetch the result / convert resulte in to array 

    WHILE ($rows = mysqli_fetch_array($query)):

       $id = $rows['itemid'];
       $name = $rows['itemname'];
       $price = $rows['price'];
       $category = $rows['category'];

      echo "Item Id: $id<br>
      Item Name: $name<br>
      Price: $price<br>
      Category: $category<br>";
       endwhile;

       ?> 
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
