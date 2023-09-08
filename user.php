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
	
	$sql=" select username from user where role!='admin'";
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

          echo "<th>User Name</th>";

          echo "<th>Enable</th>";

         echo "<th>Disable</th>";

         echo "<th>Password</th>";

          echo "</tr>";

        while($row = $result->fetch_assoc()) 
        { 
        	echo "<tr>";
          echo "<td>".$row['username']."</td>";
        	echo "<td><a href='enable.php?sid=".$row['username']."'>Enable</a></td>";
        	echo "<td><a href='disable.php?sid=".$row['username']."'>Disable</a></td>";
          echo "<td><a href='password.php?sid=".$row['username']."'>Change Password</a></td>";
        	echo "</tr>";

        }
        echo "</table>";
        echo "</body>";
        echo "</html";
	 }
}
?>