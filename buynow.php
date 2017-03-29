<?php
session_start();
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
		<a href="login1.php"><li>Home</li></a>
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
				<h1>Buy Now Screen</h1>
            </header>
            <section>				
                <div id="container_demo" >
					<div id="wrapper">
					<div id="login" class="animate form">
						<?php
						global $con;
						$code = $_SESSION['ProductCode'];
						$phno = $_SESSION['PhoneNumber'];
						/*$avail=$_SESSION['avail'];
						$q = "UPDATE products SET Availability='$avail' WHERE ProductCode='$code'";
						mysqli_query($con,$q);*/
						$pwd_que = "INSERT INTO `ordertable`(`PhoneNumber`, `ProductCode`, `DOP`) VALUES ('$phno','$code',CURRENT_DATE);";
						$run_product = mysqli_query($con,$pwd_que);
						if($run_product){
								echo"<script>alert('Product Successfully stored in Cart !!!')</script>";
								echo "<p> <b>Product Successfully Added to Cart !!!!!</b> </p>";
								echo '<form  method="post" action="showorders.php" autocomplete="on"> 
											<p class="login button"> 
												<input type="submit" name="showorders" value="Show Orders!!" /> 
											</p>
										</form>';
							}
						else
						{
							echo"<script>alert('Error !!!')</script>";
						}
						?> 
					</div>
					</div>
                </div>  
            </section>
        </div>
    </body>
</html>