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
     <title>Payment</title>
   </head>
<body>
  <div class="container">
    <div class="title">Payment Report</div>
    <div class="content">
      <form action="report.php" method="get">
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
            <label for="section">Select Branch:</label><br>
            <select name="branch" id="branch" > 
            <option value="cse">Cse</option>
            <option value="mech">Mech</option>
            <option value="civil">Civil</option>
            <option value="it">IT</option>
            <option value="ece">ECE</option>
            <option value="eee">EEE</option>
            <option value="all">ALL</option>
          </select>
          </div>
</div>	
			   <div class="button">
          <input type="submit" value="View Payment Report">
        </div><br>
        <a href='javascript:history.back(-2)'> Go To Menu</a>
      </form>
    </div>
  </div>
</body>
</html>