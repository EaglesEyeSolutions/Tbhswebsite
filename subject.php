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
	$sid=$_GET["sid"];
	$sname=$_GET["name"];
	$sem=$_GET["sem"];
	$branch=$_GET["branch"];
	$section=$_GET["section"];
    
	$sql="INSERT INTO subject_allocation(staff_id ,branch ,sem ,subject,section) 
	VALUES ('$sid','$branch','$sem','$sname','$section') ";

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
        echo "Subjected Added to the Staff Successfully!!";
         echo "<input type='button' value='GO Back!!' onclick='history.go(-2)'>";
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
$conn->close();
?>
