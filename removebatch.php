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
	$st_id=$_GET["batch"];
	$sql="delete from attedance where student_id like '$st_id'%";
	if($conn->query($sql))
	{
		$sql="delete from student_marks where student_id like '$st_id'%";
	   if($conn->query($sql))
	   {
	   	 $sql="delete from student_personal where student_id like '$st_id'%";
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
        echo "Student Batch Removed Successfully";
        echo "<input type='button' value='Go Back!' onclick='history.back(2)'>";
        echo   "</form>";
        echo  "</div>";
        echo "</body>";
        echo "</html>";

	   	}


	   }

	}
	else
	{
		echo "Error occurs";
	}
}
$conn->close();
?>