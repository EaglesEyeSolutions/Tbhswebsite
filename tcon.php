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
  $dt=date('y-m-d');
  $sql="select sum(amount) as sum1,headername,account from trans where dates='$dt' group by account,headername";
  $result = $conn->query($sql);
  if ($result->num_rows > 0)
   {

		echo "<!DOCTYPE html>";
		echo "<html>";
		echo "<head>";
			echo "<title>Today Transactions</title>";
		echo "</head>";
    echo "<style>
      @media print {
   .noprint {
      visibility: hidden;
    }
  }
  ";
    echo "</style>";
		echo "<link rel='stylesheet' href='reportcs.css' >";
		echo "<body>";
             echo "<div class='title'><h1>Andhra Loyola Institute Of Engineering And Technology</h1></div>";
             echo "<div class='title1'><h1>Transacion Details</h1></div>";
             echo "<div style='margin-left:240px'><h3>Date:  ".$dt."</h3></div>";
             echo "<div style='margin-left:970px;margin-top:-45px'><h3>Address:Vijayawada</h3></div>";
             echo "<table  style='margin-left:310px'>";
             echo "<tr>";
             echo "<th >Account</th>";
             echo "<th >Header Name</th>";
             echo "<th >Amount</th>";
             echo "</tr>";
             while($row = $result->fetch_assoc()) 
      			{
      				echo "<tr>";
              echo "<td >".$row['account']."</td>";
      				echo "<td >".$row['headername']."</td>";
      				echo "<td >".$row['sum1']."</td>";
      				echo "</tr>";
      			}
             echo "</table>";
             $sql=$sql="select sum(amount) as sum1 from trans where dates='$dt' ";
             $result = $conn->query($sql);
             $row = $result->fetch_assoc();
             echo "<div class='sum' style='margin-left:900px'><h3>Total-Amount:".$row['sum1']."</h3></div>";
             echo "<button  onclick='history.go(-2)' class='noprint'>Go Back</button>";
             echo "<button  onclick='print()' class='noprint'>Print</button>";
		echo "</body>";
		echo "</html>";

    
   }

}
$conn->close();
?>