<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
        <link rel="stylesheet" href="markscss.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>New Branch</title>
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
  <div class="container">
    <div class="title">Adding Student Batch</div>
    <div class="content">
      <form action="adbran.php" method="get">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Student Batch Id</span>
            <input type="text" placeholder="Enter student Batch like 20HP,17HP.." required name="bname">
          </div>
          <div class="input-box">
            <span class="details">Year</span>
            <input type="text" placeholder="Enter Year 2022,2020.." required name="id">
          </div>
</div>	
			   <div class="button">
          <input type="submit" value="Update">
        </div><br>
        <input type='button' value=' Click To Go Menu' onclick='history.go(-1)' style="color:blue">
      </form>
    </div>
  </div>
</body>
</html>