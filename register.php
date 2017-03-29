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
    </head>
    <body>
        <div class="container">
            <header>
                <h1>Testo</h1>
            </header>
            <section>				
                <div id="container_demo" >
                    <?php
					global $con;
					if(isset($_POST['register'])){
						$user_name = $_POST['usernamesignup'];
						$ph_no = $_POST['phone_no_signup'];
						$pass = $_POST['passwordsignup'];
						$pwd_que = "select * from user where PhoneNumber='$ph_no'";
						$run_products = mysqli_query($con,$pwd_que);
						$count = mysqli_num_rows($run_products);
						if($count>0){
							echo "<script> alert('Allready registered!')</script>";
							exit();
						}
						else if($user_name=='' OR $pass==''){
							echo "<script> alert('Please fill all the fields!')</script>";
							exit();
						}
						else
						{
							$pass = md5($pass);
							$insert_product = "insert into user (UserName,PhoneNumber,Password) value('$user_name','$ph_no','$pass')";
							$run_product = mysqli_query($con,$insert_product);
							
							if($run_product){
								echo"<script>alert('Registered successfully!!! Now login with your credentials')</script>";
								echo"<script> window.top.location='index.php'</script>";
							}
						
						}
					}
					?>
                </div>  
            </section>
        </div>
    </body>
</html>