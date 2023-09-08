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
	$us=$_SESSION["pid"];
    $p1=$_GET["newpss"];
    $p2=$_GET["conpss"];
    if($p1==$p2)
    {
	$sql="update user set password='$p1'   where username='$us'  ";
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
        echo "User  Password changed successfully";
        echo "<input type='button' value=' Click To Go Menu' onclick='history.back(-3)'>";
        echo   "</form>";
        echo  "</div>";
        echo "</body>";
        echo "</html>";
	}
	else
	{
		echo "Error occurs";
	}
  }
  else
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
        echo "Two Password Must be Same!!!! Error....";
        echo "<input type='button' value=' Click To Go Menu' onclick='history.back(-3)'>";
        echo   "</form>";
        echo  "</div>";
        echo "</body>";
        echo "</html>";
  }
}
$conn->close();
?>