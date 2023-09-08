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
        <h1>Admin</h1>
      </div>
      </div>
    <div class='menu' style="margin-left: 200px;margin-top:-30px;">

        <ul>
        <li><a href='fsearch.php'>Search Student</a></li>
        <li><a href='user.php'>User</a></li>
        <li><a href='addbranch.php'>Add New Branch</a></li>
         <li><a href='remove.php'>Remove  Student Batch</a></li>
         <li><a href='addstaff.php'>Add Staff</a></li>
         <li><a href='subjectallocation.php'>Add Staff Subject</a></li>
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
         <input type='button' value=' Click To Go Menu' onclick='history.go(-1)' style="color:blue">
      </form>
    </div>
  </body>
</html>
