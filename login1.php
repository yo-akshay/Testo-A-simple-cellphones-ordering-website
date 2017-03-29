<?php session_start(); 
//session_start();
if(!isset($_SESSION['PhoneNumber'])){
	header("location: index.php");
}
?>
<?php
include("db.php");
?>
<!DOCTYPE html>
<html lang="en" class="no-js"> 
    <head>
        <meta charset="UTF-8" />
        <title>Testo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
		<link rel="stylesheet" type="text/css" href="css/hamburger.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<button class="hamburger">&#9776;</button>
		<button class="cross">&#735;</button>
    </head> 
    <body>
	<div class="menu">
	  <ul>
		<a href="#"><li>Home</li></a>
		<a href="showorders.php"><li>Orders</li></a>
		<a href="logout.php"><li>Logout</li></a>
	  </ul>
	</div>
	<script>
	$( ".cross" ).hide();
	$( ".menu" ).hide();
	$( ".hamburger" ).click(function() {
	$( ".menu" ).slideToggle( "slow", function() {
	$( ".hamburger" ).hide();
	$( ".cross" ).show();
	});
	});

	$( ".cross" ).click(function() {
	$( ".menu" ).slideToggle( "slow", function() {
	$( ".cross" ).hide();
	$( ".hamburger" ).show();
	});
	});
	</script>
        <div class="container">
            <header>
                <h1>Testo</h1>
            </header>
            <section>				
                <div id="container_demo" >
					<div id="wrapper">
									<form  method="post" action="product_details.php" autocomplete="on"> 
										<h1>Enter 8 digits product code</h1> 
										<p> 
											<label for="product_code" class="uname" > Product Code </label>
											<input id="product_code" name="product_code" required="required" type="number" placeholder="eg. 0123456789"/>
										</p>
										<p class="login button"> 
											<input type="submit" name="show_details" value="Submit" /> 
										</p>
									</form>
								
					</div>
                </div>  
            </section>
        </div>
    </body>
</html>