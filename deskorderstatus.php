<!DOCTYPE html>
<html>
<head>
<title>Order Status</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="admin.css">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,600,400italic,600italic,700' rel='stylesheet' type='text/css'>
</head>
<body>

<div id="header">
  <div class="logo">
    <a href="deskorderstatus.php">DESK<span>PANEL</span></a>
  </div>
  
</div>


<a class="mobile">MENU</a>


<div id="container">

  <div class="sidebar">
    <ul id="nav">
     <li><a href="deskorderstatus.php">Order Status</a></li>
  <li><a href="deskplaceorder.php">Place Order</a></li>
<li><a href="index.php">LOGOUT</a></li>
    </ul>
    
  </div>

  <div class="content">
    <h1>Order Status</h1>
    <p></p>

    <div id="box">
     <div class="box-top">See Order Status Here</div>
     <div class="box-panel">
   
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
