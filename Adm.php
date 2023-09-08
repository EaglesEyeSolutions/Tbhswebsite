<?php
session_start();
      if (! isset ( $_SESSION ['user'] ) || $_SESSION ['user'] == false)
                  {
                   header ( "Location: home.html" );
                   exit ();
                   } 
echo "<!DOCTYPE html>";
                  echo "<html lang='en' dir='ltr'>";
                  echo "<head>";
                  echo "<meta charset='UTF-8'>";
                  echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
                  echo "<link rel='stylesheet' href='style3.css'>";
                  echo "</head>";
                  echo "<body background='images/alietbg.jpg' style='
                   width: 100%;
                   height: 50vh;
                   background-size: cover;
                   background-position: center;
                  '>";
                  echo "<nav>";
                  echo "<div class='menu'>";
                  echo "<div >";
                  echo "</div>";
                  echo "<div class='logo' style='margin-left: -280px'>";
                  echo "<a href='#' style='margin-left:120px'>Admin</a>";
                  echo "</div>";
                  echo "<ul>";
                   echo "<li><a href='fsearch.php'>Search Student</a></li>";
                  echo "<li><a href='user.php''>User</a></li>";
                  echo "<li><a href='addbranch.php''>Add New Branch</a></li>";
                  echo "<li><a href='remove.php''>Remove  Student Batch</a></li>";
                  echo "<li><a href='addstaff.php''>Add Staff</a></li>";
                  echo "<li><a href='subjectallocation.php''>Add Staff Subject</a></li>";
                   echo "<li><a href='logout.php''>Logout</a></li>";
                  echo "</ul>";
                  echo "</div>";
                  echo "</nav>";
                  echo "<div class='col-md-4'>";
                
                  echo "</div>";
                  echo "<div class='center'>";
                  echo "<div class='title'>ANDHRA LOYOLA INSTITUTE OF ENGINEERING AND TECHNOLOGY</div>";
                  echo "<div class='btns'>";
                  echo "<button style='margin-left:40px'>Learn More</button>";
                  echo "</div>";
                  echo "</div>";
                  echo "</body>";
                  echo "</html>";
?>