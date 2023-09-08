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
     <title>Transaction Edit</title>
   </head>
<body>
  <div class="container">
    <div class="title"> Report</div>
    <div class="content">
      <form action="tedit.php" method="get">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Transaction-Date</span>
            <input type="date"  required name="tdate">
          </div>
          <div class="input-box">
           <span class="details">Transaction_id</span>
            <input type="text" placeholder="Enter Year" required name="sid">
          </div>
          <?php 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "finance";
            $conn = new mysqli($servername, $username, $password, $dbname);
                  $sql="select DISTINCT headername from headers";
                  $result=$conn->query($sql);
                  echo "<div class='input-box'>";
                    echo "<label for='subject'>Select Header:</label><br>";
                     echo "<select name='hname' id='subject' >";
                     while($row = $result->fetch_assoc()) 
                  {
                    echo "<option value=".$row['headername'].">".$row['headername']."</option>";
                  }
                  echo "</select>";
                  echo "</div>";
             ?>
              <div class="input-box">
           <span class="details">Amount</span>
            <input type="text" placeholder="Enter Amount" required name="amt">
          </div>
        </div>
			   <div class="button">
          <input type="submit" value="Update">
        </div><br>
        <a href='accountant.php'> Go To Menu</a>
      </form>
    </div>
  </div>
</body>
</html>