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
	$men=$_GET["Uname"];
  if(strpos($men, $_SESSION["branch"]))
  {
	$sql=" select * from attedance where student_id='$men' ";
	$result=$conn->query($sql);
	if ($result->num_rows > 0)
	 {

	 	   echo "<!DOCTYPE html>";

            echo "<html>";

           echo "<head>";

            echo "<title>Table layout</title>";

           echo "<link rel='stylesheet' href='main.css'>";

           echo "</head>";

           echo "<body>";
           echo "<div class='filter'>";

          echo "</div>";

          echo "<table >";
          echo "<tr>";
           echo "<th width='5%'>Student RollNo:</th>";

          echo "<th width='2%'>".$men."</th>";
          echo "</tr>";
          echo "<tr>";
                  echo "<th width='2%'>Month</th><th width='2%'>Sem No</th><th width='2%'>Total Class Conducted</th><th width='2%'>No of class Attended</th><th width='2%'>Percentage</th>";
                  echo "</tr>";

          while($row = $result->fetch_assoc()) 
        {
          echo "<tr>";
                      echo "<td>".$row['month']."</td>"."<td>".$row['sem']."</td>"."<td>".$row['totcls']."</td>"."<td>".$row['attcls']."</td>"."<td>".$row['percentage']."</td>";
                      echo "</tr>";
        }
        echo "</table>";
   }
   echo "</body>";
   echo "</html>";
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
        echo "Invalid Student!! Access denaied!!";
        echo "<input type='button' value='Go Back!!' onclick='history.back(2)'>";
        echo   "</form>";
        echo  "</div>";
        echo "</body>";
        echo "</html>";
  }
}
?>

