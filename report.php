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
  $branch=$_GET["branch"];
  if($branch=='all')
  {
    $date1=$_GET["fromdate"];
  $d1=substr($date1,8,2)."-".substr($date1,5,2)."-".substr($date1,0,4);
  $date2=$_GET["todate"];
  $d2=substr($date2,8,2)."-".substr($date2,5,2)."-".substr($date2,0,4);
  $sql=" select * from fees where Trns_date BETWEEN '" . $d1 . "' AND  '" . $d2 . "'  " ;
  $result=$conn->query($sql);
  if ($result->num_rows > 0)
   {

       echo "<!DOCTYPE html>";

            echo "<html>";

           echo "<head>";

            echo "<title>Table layout</title>";

           echo "<link rel='stylesheet' href='main.css'>";
           echo "<link rel='stylesheet' href='style3.css'>";

           echo "</head>";

           echo "<body>";
           echo "<div class='filter'>";

          echo "</div>";
          echo "<div>";
          echo "<table >";
          echo "<tr>";
          echo "<th>RollNO</th>";
          echo "<th>Student Name</th>";
          echo "<th>UTR/UPI NO</th>";
          echo "<th>Amount</th>";
          echo "<th>Date Of Payment</th>";
          echo "<th>Mentor</th>";

          echo "</tr>";

        while($row = $result->fetch_assoc()) 
        { 
          echo "<tr>";
          echo "<td>".$row['student_id']."</td>";
          echo "<td>".$row['student_name']."</td>";
          echo "<td>".$row['trans_id']."</td>";
          echo "<td>".$row['amount']."</td>";
          echo "<td>".$row['Trns_date']."</td>";
          echo "<td>".$row['verified']."</td>";
          echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        echo "</body>";
        echo "</html";
   }
  }
  else
  {
  $date1=$_GET["fromdate"];
  $d1=substr($date1,8,2)."-".substr($date1,5,2)."-".substr($date1,0,4);
  $date2=$_GET["todate"];
  $d2=substr($date2,8,2)."-".substr($date2,5,2)."-".substr($date2,0,4);
  $sql=" select * from fees where Trns_date BETWEEN '" . $d1 . "' AND  '" . $d2 . "'  and branch='$branch' " ;
  $result=$conn->query($sql);
  if ($result->num_rows > 0)
   {

       echo "<!DOCTYPE html>";

            echo "<html>";

           echo "<head>";

            echo "<title>Table layout</title>";

           echo "<link rel='stylesheet' href='main.css'>";
           echo "<link rel='stylesheet' href='style3.css'>";

           echo "</head>";

           echo "<body>";
           echo "<div class='filter'>";

          echo "</div>";
          echo "<div>";
          echo "<table >";
          echo "<tr>";
          echo "<th>RollNO</th>";
          echo "<th>Student Name</th>";
          echo "<th>UTR/UPI NO</th>";
          echo "<th>Amount</th>";
          echo "<th>Date Of Payment</th>";
          echo "<th>Mentor</th>";

          echo "</tr>";

        while($row = $result->fetch_assoc()) 
        { 
          echo "<tr>";
          echo "<td>".$row['student_id']."</td>";
          echo "<td>".$row['student_name']."</td>";
          echo "<td>".$row['trans_id']."</td>";
          echo "<td>".$row['amount']."</td>";
          echo "<td>".$row['Trns_date']."</td>";
          echo "<td>".$row['verified']."</td>";
          echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        echo "</body>";
        echo "</html";
   }
  }
   $conn->close();
}
?>