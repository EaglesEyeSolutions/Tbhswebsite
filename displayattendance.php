<?php
session_start();
      if (! isset ( $_SESSION ['user'] ) || $_SESSION ['user'] == false)
                  {
                   header ( "Location: home.html" );
                   exit ();
                   } 
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style2.css" />
    <link rel="stylesheet" href="sty.css" />
    <title>search</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light" style="color: #fff;background-color: black;height:70px">
            <div class="container">
              <div >
            <img src="images/aliet.jfif" style="width:70px;height: 70px; border-radius: 70% 70% 70% 70%;margin-left: -90px">
        </div>
          <div><h1>Student Info System</h1></div>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="teacher.php" style="font-family: Serif;color:white">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="addst.php" style="font-family: Serif;color:white">Add Student</a>
                  </li>
                  <li class="nav-item">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-family: Serif;color:white">
                     Search Student
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="font-family: Serif">
                      <li><a class="dropdown-item" href="search.php">All Details</a></li>
                      <li><a class="dropdown-item" href="personal.php">Personal Details</a></li>
            <li><a class="dropdown-item" href="specificm.php">Specific Year marks</a></li>
            <li><a class="dropdown-item" href="displayattendance.php">Attendance</a></li>
                    </ul>  
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-family: Serif;color:white">
                     Marks
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="font-family: Serif">
                      <li><a class="dropdown-item" href="adsub.php">Add subject</a></li>
                      <li><a class="dropdown-item" href="excelstpern.php">Upload excel Student Personal sheet</a></li>
            <li><a class="dropdown-item" href="mid1.php">Edit MID-1 Marks</a></li>
            <li><a class="dropdown-item" href="mid2.php">Edit MID-2 Marks</a></li>
            <li><a class="dropdown-item" href="external.php">Edit EXTERNAL Marks</a></li>
                      <li><a class="dropdown-item" href="uploadexcel1.php">Upload Marks Excel sheet</a></li>
                    </ul>  
          </li>
          <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-family: Serif;color:white">
                    Attendance
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="font-family: Serif">
                      <li><a class="dropdown-item" href="attendance.php">Upload Eexcel Sheet</a></li>
                      <li><a class="dropdown-item" href="addstaff.php">Add Staff</a></li>
                      <li><a class="dropdown-item" href="subjectallocation.php">Add Staff Subject</a></li>
                      <li><a class="dropdown-item" href="dailyattendance.php">Take Today Attendance</a></li>
                      <li><a class="dropdown-item" href="dashboard.php">Attendance Report</a></li>
                    </ul>  
          </li>
                   <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="mentorsearch.php" style="font-family: Serif;color:white">Mentor</a>
                  </li>      
                 <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="logout.php" style="font-family: Serif;color:white">Logout</a>
                  </li>  
              
              </div>
            </div>
          </nav>
    <div class="login-wrapper">
      <form action="displayatt.php" class="form" method="get">
        <h2>Search</h2>
        <div class="input-group">
          <input type="text" name="Uname" id="loginUser" required  />
          <label for="loginUser">Student RollNo</label>
        </div>
        <input type="submit" value="Show" class="submit-btn" />
        <a href="teacher.php" style="color:red">Go Back</a>
      </form>
    </div>
  </body>
</html>