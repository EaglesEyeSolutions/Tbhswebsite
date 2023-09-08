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
                   
	$stu_id=$_SESSION["stu_id"];
  $sq="select external from student_marks where student_id='$stu_id' and  external='Fail' or 'fail' or 'f' or 'F'";
  $res=$conn->query($sq);
  $n=$res->num_rows;
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
        echo "<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap' rel='stylesheet'>";
        echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>";
        echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>";
        echo "<link rel='stylesheet' type='text/css' href='display.css'>";
        echo "<body>";
        echo "<div class='student-profile py-4'>";
        echo "<div class='container'>";
        echo "<div class='row'>";
        echo "<div class='col-lg-4'>";
        echo "<div class='card shadow-sm'>";
        echo " <div class='card-header bg-transparent text-center'>";
         echo "<img class='profile_img' src='images/aliet.jfif' alt='student dp'>";
          echo "  <h3>".$row['student_name']."</h3>";
          echo "</div>";
          echo "<div class='card-body'>";
           echo " <p class='mb-0'><strong class='pr-1'>Student ID:</strong>".$row['student_id']."</p>";
            echo "<p class='mb-0'><strong class='pr-1'>Active Backlogs:</strong>".$n."</p>";
          echo "</div>";
         echo "</div>";
       echo "</div>";
       echo "<div class='col-lg-8'>";
        echo "<div class='card shadow-sm'>";
         echo " <div class='card-header bg-transparent border-0'>";
         echo "  <h3 class='mb-0'><i class='far fa-clone pr-1'></i>General Information</h3>";
         echo " </div>";
         echo " <div class='card-body pt-0'>";
           echo " <table class='table table-bordered'>";
             echo "<tr>";
              echo "  <th width='30%''>RollNo</th>";
               echo " <td width='2%''>:</td>";
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
               echo "</table>";
              echo "</div>";
              echo "</div>";
              echo "<div style='height: 26px'></div>";
              echo "<div class='card shadow-sm'>";
              echo "</div>";
              echo " <div class='card-header bg-transparent border-0'>";
              echo "<h3 class='mb-0'><i class='far fa-clone pr-1'></i>Marks Information</h3>";
              echo " </div>";
              $s="select max(year) as max_year from student_marks";
              $res=$conn->query($s);
              $res1=$res->fetch_assoc();
              $sm=$res1['max_year'];
              $sql="select * from student_marks where student_id='$stu_id' and year = '$sm' ";
	            $result=$conn->query($sql);
	       	  if ($result->num_rows > 0)
	 			    {

	 			    echo "<div >";
              		echo   "<table border='2px'>";
              		echo "<tr>";
              		echo "<th width='2%'>subject</th><th width='2%'>class</th><th width='2%'>FA1</th><th width='2%'>FA2</th><th width='2%'>FA3</th> <th width='2%'>FA4</th><th width='2%'>SA1</th><th width='2%'>SA2</th><th width='2%'>SA3</th>";
              		echo "</tr>";
                while($row = $result->fetch_assoc()) 
              {
      			  
              		echo "<tr>";
              		echo "<td>".$row['subname']."</td>"."<td>".$row['year']."</td>"."<td>".$row['mid1']."</td>"."<td>".$row['onlinemid1']."</td>"."<td>".$row['mid2']."</td>"."<td>".$row['onlinemid2']."</td>"."<td>".$row['external']."</td>"."<td>".$row['credit']."</td>"."<td>".$row['internal']."</td>";
              		echo "</tr>";
                }

              }
              	    echo "</table>";
                    echo "</div>";
                    if($sm==10)
            {
                echo " <div class='card-header bg-transparent border-0'>";
                echo "<h3 class='mb-0'><i class='far fa-clone pr-1'></i>SlipTest Marks</h3>";
                echo " </div>";
                 $sql1="SELECT * FROM allsliptest WHERE student_id='$stu_id'  ";
                 $result1=$conn->query($sql1);
                if ($result1->num_rows > 0)
                {

                    echo "<div >";
                    echo   "<table border='2px'>";
                    echo "<tr>";
                    echo "<th width='10%'>Student ID</th><th width='10%'>week</th><th width='10%'>subject</th><th width='10%'>Marks</th>";
                    echo "</tr>";
                    while($row1 = $result1->fetch_assoc()) 
                    {
              
                     echo "<tr>";
                      echo "<td>" . $row1['student_id'] . "</td>" . "<td>" . $row1['week'] . "</td>" . "<td>" . $row1['subject_name'] . "</td>" . "<td>" . $row1['marks'] . "</td>" ;
                    echo "</tr>";
                  }
              
               }
                    echo "</table></div>";
                
            }
                   echo "</div>";
                     echo " <div class='card-header bg-transparent border-0'>";
                     echo "<h3 class='mb-0'><i class='far fa-clone pr-1'></i>Attedance Information</h3>";
                     echo "</div><br><br><br>";
            }
                   echo "</div>";
                   $sql="select * from attedance where student_id='$stu_id' order by sem asc";
                   $result=$conn->query($sql);
                   if ($result->num_rows > 0)
	 			           {
                   	 echo "<div >";
              		echo   "<table border='2px'>";
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
              		 echo "</div>";
                    }
                  
                   echo "<br>";
                   echo "<input type='button' value='Go back!' onclick='history.back(2)''>";
                   echo "<input type='button' value='Print' onclick='print()' style='margin-left:50px'>";
              echo "</body>";
              echo "</html>";
          }
         
    }
   
$conn->close();
?>
    