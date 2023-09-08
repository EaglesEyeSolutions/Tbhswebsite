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
    <?php
        session_start();
      if (! isset ( $_SESSION ['user'] ) || $_SESSION ['user'] == false)
                  {
                   header ( "Location: home.html" );
                   exit ();
                   } 
    ?>
    <nav>
      <div>
        <div class='logo' style='margin-left:10px;color:white;'>
        <h1>Student Info System</h1>
      </div>
      </div>
    <div class='menu' style="margin-left: 800px;margin-top:-30px;">

        <ul>
        <li><a href='directorsearch.php'>Search Student</a></li>
         <li><a href='aboutus.html'>About</a></li>
          <li><a href='logout.php'>Logout</a></li>
        </ul>
    </div>
  </nav>
    <div class="login-wrapper">
      <form action="fstudent.php" class="form" method="get">
        <h2>Search</h2>
        <div class="input-group">
          <input type="text" name="Uname" id="loginUser" required  />
          <label for="loginUser">Student RollNo</label>
        </div>
        
        <input type="submit" value="Show" class="submit-btn" />
      </form>
    </div>
  </body>
</html>
