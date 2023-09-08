<?php
session_start();
if (! isset ( $_SESSION ['user'] ) || $_SESSION ['user'] == false)
{
    header ( "Location: home.html" );
    exit ();
} 
$servername = "localhost";
$username = "u322949535_eagleseye";
$password = "EaglesEyeSolutions@2023*";
$dbname = "u322949535_tbhs";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{
  die("Connection failed: " . $conn->connect_error);
}
else
{
	$sid=$_GET["sid"];
	$dt=$_GET["tdate"];
	$amt=$_GET["amt"];
	$hn=$_GET["hname"];
	$sql="update trans set amount='$amt' where dates='$dt' and trans_id='$sid' and headername='$hn'";
	if ($conn->query($sql) === TRUE) {
		echo "<!DOCTYPE html>";
        echo" <html>";
        echo "<body>";
        echo "<style>
        a{
        	text-decaration:None;
        	color:red;

        }";
        echo "</style>";
        echo "<link rel='stylesheet' href='style2.css'/>";
		echo "<div class='login-wrapper'>";
        echo "<form  class='form' >";
        echo "Transaction Updated Successfully!!!";
        echo "<input type='button' value='Go Back' onclick='history.go(-2)'>";
        echo   "</form>";
        echo  "</div>";
        echo "</body>";
        echo "</html>";
	}
	else
	{
		echo "ERROR:503 Data Not Found!!!";

	}

	$conn->close();
}
?>