<?php
session_start();

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
						<?php
						global $con;
						if(isset($_POST['login'])){
							
							$ph_no = $_POST["phone_no_login"];
							$pass = $_POST["password"];
							$pwd_que = "select * from user where PhoneNumber='$ph_no'";
							$run_products = mysqli_query($con,$pwd_que);
							if($ph_no=='' OR $pass==''){
								echo "<script> alert('Please fill all the fields!')</script>";
								exit();
							}
							$count = mysqli_num_rows($run_products);
							if($count==0){
								echo "<script> alert('Please fill a valid phone number!')</script>";
								echo"<script> window.top.location='index.php'</script>";
								exit();
							}
							$row_products = mysqli_fetch_array($run_products);
							$cust_ph_no=$row_products['PhoneNumber'];
							$valid_pwd=$row_products['Password'];
							$pass = md5($pass);
							if($pass == $valid_pwd){
								$_SESSION['PhoneNumber'] = $cust_ph_no;
								//$_SESSION['sid'] = session_id();
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
								//exit();
							}
							else
							{
								echo "<script> alert('Password not match!')</script>";
								echo"<script> window.top.location='index.html'</script>";
								exit();	
							}
							}
						?> 
					</div>
                </div>  
            </section>
        </div>
    </body>
</html>