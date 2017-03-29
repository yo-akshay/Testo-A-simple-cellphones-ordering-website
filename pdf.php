<?php
session_start();
include("db.php");
//include("functions/functions.php");
?>
<?php
global $con;
$phno = $_SESSION['PhoneNumber'];
$pwd_que = "SELECT * FROM ordertable,products where ordertable.PhoneNumber='$phno' AND ordertable.ProductCode=products.ProductCode";
$run_products = mysqli_query($con,$pwd_que);
$i=1;
$str="";
while ($row = mysqli_fetch_array($run_products)) 
{
/*echo "<p><b>Order Number :$i<b></p>";
echo "<p>".$row["ProductName"]."</p>";
echo "<p>".$row["Price"]."</p>";
echo "<p>".$row["DOP"]."</p>";*/
$str.="<br>Order Number : ".$i."<br>";									 
$str.="Product Name : ".$row["ProductName"]."<br>";
$str.="Price : ".$row["Price"]."<br>";
$str.="Date of Purchase : ".$row["DOP"]."<br><br><br>";
$i++;
}								 
// If html2pdf folder placed in root directory
require_once('html2fpdf.php');
// Create new HTML2PDF class for an A4 page, measurements in mm
$pdf = new HTML2FPDF('P','mm','A4');

// Optional top margin
$pdf->SetTopMargin(1);
$pdf->AddPage();
// Control the x-y position of the html
$pdf->SetXY(0,0);
$pdf->WriteHTML($str);

// The 'D' arg forces the browser to download the file 
$pdf->Output('MyFile.pdf','D');
?>