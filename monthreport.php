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
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="sty.css" />
     <link rel="stylesheet" href="markscss.css">
     <title>Month Report</title>
   </head>
<body>
  <div class="container">
    <div class="title">Month-Report</div>
    <div class="content">
      <form action="monthreports.php" method="get">
        <div class="user-details">
          <div class="input-box">
            <label for="sem">Select Month</label><br>
            <select name="month" id="sem" >
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
          </select>
            
          </div>
          <div class="input-box">
            <span class="details">year</span>
            <input type="text" placeholder="Enter Year" required name="year">
          </div>
</div>	
			   <div class="button">
          <input type="submit" value="Generate">
        </div><br>
        
        <div style="text-align: center; padding-top: 50px;">
        <div style="text-align: center; padding-top: 50px;">
        <a href="javascript:history.go(-1)"
           style="padding: 10px 20px; margin-top: 20px; text-decoration: none; background-color: #000; color: #fff; border-radius: 5px; 
           transition: background-color 0.3s ease;" 
           onmouseover="this.style.background='linear-gradient(to bottom, #444, #000)'" 
           onmouseout="this.style.background='#000'">Go Back</a>
    </div>
    </div>
      </form>
    </div>
  </div>

   

</body>
</html>