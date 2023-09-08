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
     <title>Mid-1 Marks</title>
   </head>
<body>
  <div class="container">
    <div class="title"> Report</div>
    <div class="content">
      <form action="sreport.php" method="get">
        <div class="user-details">
          <div class="input-box">
            <span class="details">From-Date</span>
            <input type="date"  required name="fromdate">
          </div>
          <div class="input-box">
            <span class="details">To-Date</span>
            <input type="date"  required name="todate">
          </div>
        </div>
			   <div class="button">
          <input type="submit" value="Show Report">
        </div><br>
        <a href='accountant.php'> Go To Menu</a>
      </form>
    </div>
  </div>
</body>
</html>