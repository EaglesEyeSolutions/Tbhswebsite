<?php
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
	$otp1 = $_POST['otp1'];
	$otp2 = $_POST['otp2'];
	$otp3 = $_POST['otp3'];
	$otp4 = $_POST['otp4'];

 
   $userEnteredOTP = $otp1 . $otp2 . $otp3 . $otp4;
   session_start();
  $otp = $_SESSION['otp']; // The OTP to compare with

if ($userEnteredOTP === $otp) {



	$name = $_SESSION['name'];
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	$phone = $_SESSION['phone'];
	$role = $_SESSION['role'];
	$id=$_SESSION['id'];
	
	
	$sql="INSERT INTO user (name,username,password,role,phone,id) 
	VALUES ('$name','$username','$password','$role','$phone','$id') ";

	if($conn->query($sql))
	{
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
        echo "Registration Successfull u can login now";
        echo "<a href='login.html'> Login Here</a>";
        echo   "</form>";
        echo  "</div>";
        echo "</body>";
        echo "</html>";
	}
	else
	{
		 echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
}
else {
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
        echo "U ENTERED INVALID OTP";
        echo "<a href='login.html'> Login Here</a>";
        echo   "</form>";
        echo  "</div>";
        echo "</body>";
        echo "</html>";
}
}
$conn->close();
?>
