<?php
session_start();
      if (! isset ( $_SESSION ['user'] ) || $_SESSION ['user'] == false)
                  {
                   header ( "Location: home.html" );
                   exit ();
                   } 
    ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
        <link rel="stylesheet" href="markscss.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Attendance</title>
   </head>
<body>
  <div class="container">
    <div class="title">Attendance Report</div>
    <div class="content">
      <form action="displaydashborad.php" method="get">
        <div class="user-details">
          <div class="input-box">
            <span class="details">From-Date</span>
            <input type="date"  required name="fromdate">
          </div>
          <div class="input-box">
            <span class="details">To-Date</span>
            <input type="date"  required name="todate">
          </div>
          <div class="input-box">
            <label for="section">Select Class:</label><br>
            <select name="class" id="class"> 
            <option value="1">1 class</option>
            <option value="2">2 class</option>
            <option value="3">3 class</option>
            <option value="4">4 class</option>
            <option value="5">5 class</option>
            <option value="6">6 class</option>
            <option value="7">7 class</option>
            <option value="8">8 class</option>
            <option value="9">9 class</option>
            <option value="10">10 class</option>
          </select>
          </div>
          <div class="input-box">
            <label for="section">Select Section:</label><br>
            <select name="section" id="section" > 
            <option value="1">Section -1</option>
            <option value="2">Section -2</option>
          </select>
          </div>
</div>	
			   <div class="button">
          <input type="submit" value="View Attendance">
        </div><br>
        <a href='teacher.php'> Go To Menu</a>
      </form>
    </div>
  </div>
</body>
</html>