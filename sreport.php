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
  $dt1=$_GET['fromdate'];
  $dt2=$_GET['todate'];
  $sql="select headername,Branch,trans_id,sum(amount) as sm from trans where dates BETWEEN '" . $dt1 . "' AND  '" . $dt2 . "' GROUP BY headername,Branch";
  $result = $conn->query($sql);
  if ($result->num_rows > 0)
   {

		echo "<!DOCTYPE html>";
		echo "<html>";
		echo "<head>";
			echo "<title>Today Transactions</title>";
		echo "</head>";
		echo "<link rel='stylesheet' href='reportcs.css' >";
		echo "<body>";
             echo "<div class='title'><h1>Andhra Loyola Institute Of Engineering And Technology</h1></div>";
             echo "<div class='title1'><h1>Transacion Details</h1></div>";
             echo "<div style='margin-left:240px'><h3>Date:  ".$dt1." - ".$dt2."</h3></div>";
             echo "<div style='margin-left:970px;margin-top:-45px'><h3>Address:Vijayawada</h3></div>";
             echo "<table  style='margin-left:280px'>";
             echo "<tr>";
             echo "<th >Branch</th>";
             echo "<th >Header Name</th>";
             echo "<th >Amount</th>";
             echo "</tr>";
             while($row = $result->fetch_assoc()) 
      			{
      				echo "<tr>";
      				echo "<td >".$row['Branch']."</td>";
      				echo "<td >".$row['headername']."</td>";
      				echo "<td >".$row['sm']."</td>";
      				echo "</tr>";
      			}
             echo "</table>";
             $sql="select sum(amount) as sum1 from trans where dates BETWEEN '" . $dt1 . "' AND  '" . $dt2 . "' ORDER by trans_id DESC";
             $result = $conn->query($sql);
             $row = $result->fetch_assoc();
             echo "<div class='sum'><h3>Total:".$row['sum1']."</h3></div>";
             echo "<button  onclick='history.go(-2)' >Go Back</button>";
             echo "<button  onclick='print()' >Print</button>";
		echo "</body>";
		echo "</html>";

    
   }

}
$conn->close();
?>