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
  $sem=$_GET["sem"];
	$sql=" select * from student_marks where student_id='$men' and year='$sem' ";
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
                  echo "<th width='2%'>subject</th><th width='2%'>class</th><th width='2%'>FA1</th><th width='2%'width='2%'>FA2</th><th width='2%'>FA3</th> <th width='2%'>FA4</th><th width='2%'>SA1</th><th width='2%'>SA2</th><th width='2%'>SA3</th>";
          echo "</tr>";

          while($row = $result->fetch_assoc()) 
        {
          echo "<tr>";
                  echo "<td>".$row['subname']."</td>"."<td>".$row['year']."</td>"."<td>".$row['mid1']."</td>"."<td>".$row['onlinemid1']."</td>"."<td>".$row['mid2']."</td>"."<td>".$row['onlinemid2']."</td>"."<td>".$row['external']."</td>"."<td>".$row['credit']."</td>"."<td>".$row['internal']."</td>";
                  echo "</tr>";
        }
        echo "</table>";
   }
   echo "</body>";
   echo "</html>";
  }
?>

