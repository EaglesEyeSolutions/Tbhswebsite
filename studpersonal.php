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


$stu_id=$_GET['Uname'];
	$sql="select * from student_personal where student_id='$stu_id'";
	$result=$conn->query($sql);
	if ($result->num_rows > 0)
	 {
      while($row = $result->fetch_assoc()) 
      {
      	echo "<!DOCTYPE html>";
        echo "<html>";
        echo "<head>";
        echo "<title>student</title>";
        echo "</head>";
        echo "<style type='text/css'>
        @media print {
         #printbtn {
        display :  none;
        }
        #backbutton{
        display :  none;
      }
       }
       </style>";
        echo "<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap' rel='stylesheet'>";
        echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>";
        echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>";
        echo "<link rel='stylesheet' type='text/css' href='display.css'>";
        echo "<body>";
        echo "<h2 style='font-family:serif;text-align:center;margin-top:5px'>Student Personal Details</h2>";
        echo "<div class='student-profile py-4'>";
        echo "<div class='container' >";
        echo "<div class='row'>";
        echo "<div class='col-lg-4'>";
        echo "<div class='card shadow-sm'>";
        echo " <div class='card-header bg-transparent text-center'>";
         echo "<img class='profile_img' src='images/aliet.jpeg' alt='student dp'>";
          echo "  <h3>".$row['student_name']."</h3>";
          echo "</div>";
          echo "<div class='card-body'>";
           echo " <p class='mb-0'><strong class='pr-1'>DICE ID:</strong>".$row['student_id']."</p>";
          echo "</div>";
         echo "</div>";
       echo "</div>";
       echo "<div class='col-lg-8' style='margin-top:15px'>";
        echo "<div class='card shadow-sm'>";
         echo " <div class='card-header bg-transparent border-0' >";
         echo "  <h3 class='mb-0'><i class='far fa-clone pr-1'></i>General Information</h3>";
         echo " </div>";
         echo " <div class='card-body pt-0'>";
           echo " <table class='table table-bordered'>";
             echo "<tr>";
              echo " <th width='30%'>DICE ID</th>";
               echo " <td width='2%'>:</td>";
                echo "<td>".$row['student_id']."</td>";
                echo "</tr>";
              echo "<tr>";
              echo "  <th width='30%'>Date of Birth</th>";
               echo " <td width='2%'>:</td>";
                echo "<td>".$row['dob']."</td>";
                echo "</tr>";
              echo "<tr>";
              echo "  <th width='30%'>Parent PhoneNo</th>";
               echo " <td width='2%'>:</td>";
                echo "<td>".$row['phone']."</td>";
                echo "</tr>";
              echo "<tr>";
              echo "  <th width='30%'>Address</th>";
               echo " <td width='2%'>:</td>";
                echo "<td>".$row['address']."</td>";
                echo "</tr>";
                echo "<tr>";
            echo "<th width='30%'>father Name</th>";
            echo "<td width='2%'>:</td>";
            echo "<td>".$row['father_name']."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th width='30%'>Mother Name</th>";
            echo "<td width='2%'>:</td>";
            echo "<td>".$row['mother_name']."</td>";
            echo "</tr>";
                echo "<tr>";
              echo "  <th width='30%'>Father Aadhar</th>";
               echo " <td width='2%'>:</td>";
                echo "<td>".$row['father_aadhar']."</td>";
                echo "</tr>";
                 echo "<tr>";
              echo "  <th width='30%'>Mother Aadhar</th>";
               echo " <td width='2%'>:</td>";
                echo "<td>".$row['mother_aadhar']."</td>";
                echo "</tr>";
                 echo "<tr>";
              echo "  <th width='30%'>Caste</th>";
               echo " <td width='2%'>:</td>";
                echo "<td>".$row['caste']."</td>";
                echo "</tr>";
                 echo "<tr>";
              echo "  <th width='30%'>Sub Caste</th>";
               echo " <td width='2%'>:</td>";
                echo "<td>".$row['subcaste']."</td>";
                echo "</tr>";
                 echo "<tr>";
              echo "  <th width='30%'>Alternative Phone</th>";
               echo " <td width='2%'>:</td>";
                echo "<td>".$row['alterphone']."</td>";
                echo "</tr>";
              echo "<tr>";
              echo "  <th width='30%'>GovernamentScheme</th>";
               echo " <td width='2%'>:</td>";
                echo "<td>".$row['government']."</td>";
                echo "</tr>";
                echo "<tr>";
              echo "  <th width='30%'>School Name:</th>";
               echo " <td width='2%'>:</td>";
                echo "<td>Briliance E.m school</td>";
                echo "</tr>";
               echo "</table>";
              echo "</div>";
              echo "</div>";
              echo "<div style='height: 26px'></div>";
              echo "<div class='card shadow-sm'>";
              echo "</div>";
              echo "<br>";
               echo "<input type='button' value='Go back!' onclick='history.back()'' style='margin-top:20px;margin-left:20px' id='backbutton'>";
               echo "<input type='button' value='Print' onclick='print()'' style='margin-top:20px;margin-left:20px' id='printbtn'>";
              echo "</body>";
              echo "</html>";
          }
            $conn->close();
        }
    }
?>