<?php
session_start();
      if (! isset ( $_SESSION ['user'] ) || $_SESSION ['user'] == false)
                  {
                   header ( "Location: home.html" );
                   exit ();
                   } 
    ?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style2.css" />
    <title>Delete</title>
  </head>
  <body>
    <div class="login-wrapper">
      <form action="diable.php" class="form" method="get">
        <h2>Disableing User</h2>
        <div class="input-group">
          <input type="text" name="Uname" id="loginUser" required  />
          <label for="loginUser">Enter User Id</label>
        </div>
        <input type="submit" value="Show" class="submit-btn" />
      </form>
    </div>
  </body>
</html>
