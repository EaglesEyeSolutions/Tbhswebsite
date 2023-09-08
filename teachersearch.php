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
    <link rel="stylesheet" href="style2.css" />
     <link rel="stylesheet" href="style3.css">
    <title>search</title>
  </head>
  <body>
    <div class="login-wrapper">
      <form action="fstudent.php" class="form" method="get">
        <h2>Search</h2>
        <div class="input-group">
          <input type="text" name="Uname" id="loginUser" required  placeholder='Enter Student Diceid' />
        </div>
        
        <input type="submit" value="Show" class="submit-btn" />
         <input type='button' value=' Click To Go Menu' onclick='history.go(-1)' style="color:blue">
      </form>
    </div>
  </body>
</html>
