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
		<a href="#"><li>Orders</li></a>
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
				<h2><b>Order Screen<b></h2>
            </header>
            <section>				
                <div id="container_demo" >
					<div id="wrapper">
					<div id="login" class="animate form">
						<?php
						global $con;
						//$code = $_SESSION['ProductCode'];
						$phno = $_SESSION['PhoneNumber'];
						//echo $code." ".$phno;
						$pwd_que = "SELECT * FROM ordertable,products where ordertable.PhoneNumber='$phno' AND ordertable.ProductCode=products.ProductCode";
						$run_products = mysqli_query($con,$pwd_que);
						$count = mysqli_num_rows($run_products);
						if($count==0){
							echo "<script> alert('No Orders yet!')</script>";
							echo "<p><b>No Orders yet<b></p>";
							exit();
						}
						else
						{
							$i=1;
							while ($row = mysqli_fetch_array($run_products)) 
								 {
									 echo "<p><b>Order Number :$i<b></p>";
									 echo "<p>".$row["ProductName"]."</p>";
									 echo "<p>".$row["Price"]."</p>";
									 echo "<p>".$row["DOP"]."</p>";
									 echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"width="175" height="200"/>';
									 echo "\n\n\n";
									 $i++;
								 }
								 echo '<form  method="get" action="pdf.php" autocomplete="on"> 
											<p class="login button"> 
												<input type="submit" name="generatepdf" value="Generate PDF!!" /> 
											</p>
										</form>';
								
						}
						?>
					</div>
					</div>
                </div>  
            </section>
        </div>
    </body>
</html>