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
     <title>Add Staff</title>
   </head>
<body>
  <div class="container">
    <div class="title">Subject Allocation</div>
    <div class="content">
      <form action="subject.php" method="get">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Staff ID</span>
            <input type="text" placeholder="Enter Staff ID" required name="sid">
          </div>
          <div class="input-box">
            <span class="details">Subject</span>
            <input type="text" placeholder="Enter Subject Name" required name="name">
          </div>
          <div class="input-box">
            <span class="details">Sem</span>
            <input type="text" placeholder="Enter Branch Id" required name="sem">
          </div>
          <div class="input-box">
            <label for="period">Select Teaching Branch</label><br>
            <select name="branch"> 
            <option value="civil">CIVIL</option>
            <option value="mech">MECH</option>
            <option value="ece">ECE</option>
            <option value="eee">EEE</option>
            <option  value="cse">CSE</option>
            <option value="it">IT</option>
          </select>
          </div>
          <div class="input-box">
            <span class="details">Section</span>
            <input type="text" placeholder="Enter Section" required name="section">
          </div>
</div>	
			   <div class="button">
          <input type="submit" value="Update">
        </div><br>
        <input type="button" value="GoBack!!" style="color:blue" onclick="history.go(-1)">
      </form>
    </div>
  </div>
</body>
</html>