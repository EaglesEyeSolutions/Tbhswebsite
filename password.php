<?php
session_start();
      if (! isset ( $_SESSION ['user'] ) || $_SESSION ['user'] == false)
                  {
                   header ( "Location: home.html" );
                   exit ();
                   } 
                   $_SESSION["pid"]=$_GET["sid"];
    ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
        <link rel="stylesheet" href="markscss.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Update Password</title>
   </head>
<body>
  <div class="container">
    <div class="title">Password</div>
    <div class="content">
      <form action="updatepassword.php" method="get">
        <div class="user-details">
          <div class="input-box">
            <span class="details">New Password</span>
            <input type="text" placeholder="Enter New Password" required name="newpss">
          </div>
          <div class="input-box">
            <span class="details">Conform Password</span>
            <input type="text" placeholder="Retype the Password" required name="conpss">
          </div>
</div>	
			   <div class="button">
          <input type="submit" value="Update">
        </div><br>
        <a href='admin.php'> Go To Menu</a>
      </form>
    </div>
  </div>
</body>
</html>