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
				<h1>Product Details Screen</h1>
            </header>
            <section>				
                <div id="container_demo" >
					<div id="wrapper">
					<div id="login" class="animate form">
						<?php
						global $con;
						if(isset($_POST['show_details'])){
							//echo $_POST["product_code"];
							$code = $_POST["product_code"];
							$pwd_que = "select * from products where ProductCode='$code'";
							$run_products = mysqli_query($con,$pwd_que);
							$count = mysqli_num_rows($run_products);
							if($count==0){
								echo "<script> alert('No Such Product Available!')</script>";
								echo '<form  method="post" action="product_details.php" autocomplete="on"> 
										<h1>Enter 8 digits product code</h1> 
										<p> 
											<label for="product_code" class="uname" > Product Code </label>
											<input id="product_code" name="product_code" required="required" type="number" placeholder="eg. 0123456789"/>
										</p>
										<p class="login button"> 
											<input type="submit" name="show_details" value="Submit" /> 
										</p>
								</form>';
								exit();
							}
							else
							{
								$_SESSION['ProductCode'] = $code;
								while ($row = mysqli_fetch_array($run_products)) 
								 {
									 $avail=$row["Availability"];
									 $avail--;
									 //echo $row["Manufacturer"];
									 echo "<p><b>Product Name:</b>".$row["ProductName"]."</p><br>";
									 echo "<p><b>Manufacturer:</b>".$row["Manufacturer"]."</p>";
									 echo "<p><b>Product Category:</b>".$row["Category"]."</p>";
									 echo "<p><b>Product Price:</b>".$row["Price"]."</p>";
									 echo "<p><b>Number of items remaining in stock:</b>".$row["Availability"]."</p><br>";
									 echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"width="175" height="200"/>';
									 //<img src=getImage.php?code='.$code.' width="175" height="200" />
								 }
								 echo '<form  method="post" action="buynow.php" autocomplete="on"> 
											<p class="login button"> 
												<input type="submit" name="buynow" value="Buy Now!!" /> 
											</p>
										</form>';
								 $q = "UPDATE products SET Availability='$avail' WHERE ProductCode='$code' ";
								 mysqli_query($con,$q);
							}
						}
						?> 
					</div>
					</div>
                </div>  
            </section>
        </div>
    </body>
</html>