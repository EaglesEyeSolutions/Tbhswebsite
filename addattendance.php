<?php
session_start();
if (! isset ( $_SESSION ['user'] ) || $_SESSION ['user'] == false)
 {
                   header ( "Location: home.html" );
                   exit ();
} 
$servername = "localhost";
$username = "u322949535_eagleseye";
$password = "EaglesEyeSolutions@2023*";
$dbname = "u322949535_tbhs";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{
  die("Connection failed: " . $conn->connect_error);
}
else
{
  $section=$_SESSION["section"];
  $sub=$_SESSION["subject"];
  $period=$_SESSION['period'];
  $batch=$_SESSION["class"];
  $dat=date('y-m-d');
  $day=date('d',strtotime($dat));
    $month=date('m',strtotime($dat));
    $year=date('y',strtotime($dat));
    $month_list=[31,28,31,30,31,30,31,31,30,31,30,31];
    $month_name=["january","february","march","april","may","june","july","august","september","october","november","december"];
    $mn=$month_name[$month-1];
   $sql="select student_id,phone,student_name from student_personal where year='$batch' and section='$section' and phone <> 'Not Mentioned' ";
    $result=$conn->query($sql);
  if ($result->num_rows > 0)
   {
    while($row = $result->fetch_assoc()) 
        { 
          $id=$row["student_id"];
          $isTouch = isset($_GET[$id]);
          if($isTouch == false)
          {
               $att=1;
          }
          else
          {
          $att=$_GET[$row["student_id"]];
          if($period == 1)
          {
            require __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';
	        $sid ="AC5b18383c99e81d12065a854129d1d363";
            $token = "967a7a43474280de2f9de11c126c3ef6";
            $client = new Twilio\Rest\Client($sid, $token);

        // Use the Client to make requests to the Twilio REST API
            $client->messages->create(
        // The number you'd like to send the message to
            "+91".$row['phone'],
            [
        // A Twilio phone number you purchased at https://console.twilio.com
                "from" => "+19896595242",
        // The body of the text message you'd like to send
                'body' =>"\nImmediate Action Required: Important - Your child ".$row["student_name"] ."  was absent from school today. Kindly provide the reason for their absence promptly.\nBest Regrads:\n ALIET,VIJAYAWADA."
            ]
        );  
              
            }
          }
            $sql="INSERT INTO daily_attendance(student_id,dates,sem,subject,attend,period,section) 
          VALUES ('$id','$dat','$batch','$sub','$att','$period','$section')";
          $conn->query($sql);
          
       }
           if($day==$month_list[$month-1])
          {
          $sql="select student_id from student_personal where year='$batch' and section='$section'";
            $result=$conn->query($sql);
              if ($result->num_rows > 0)
            {
            while($row = $result->fetch_assoc()) 
               { 
                 $id1=$row["student_id"];
                 $s="select count(attend) as tot_count from daily_attendance where student_id='$id1' and dates like '%-$month-$year'";
                 $res=$conn->query($s);
                 $row = $res->fetch_assoc();
                 $tot=$row['tot_count'];
                 
                 $s="select count(attend) as att_count from daily_attendance where student_id='$id1' and dates like '%-$month-$year' and attend=1";
                 $r=$conn->query($s);
                 $row = $r->fetch_assoc();
                 $att=$row['att_count'];
                 $per=($att*100)/$tot;
                 $sq="INSERT INTO attedance(student_id,month,sem,totcls,attcls,percentage) 
               VALUES ('$id1','$mn','$sem','$tot','$att','$per') ";
               $conn->query($sq);
               }
               $deleteSql = "DELETE FROM daily_attendance WHERE dates LIKE '%$year-$month%' AND sem='$batch' AND section='$section'";
    $conn->query($deleteSql);
            }
     } 
        echo "<!DOCTYPE html>";
        echo" <html>";
        echo "<body>";
        echo "<style>
        a{
          text-decaration:None;
          color:red;

        }";
        echo "</style>";
        echo "<link rel='stylesheet' href='style2.css'/>";
    echo "<div class='login-wrapper'>";
        echo "<form  class='form' >";
        echo "Today Attendance updated successfully ";
        echo "<input type='button' value='GO BACK!' onclick='history.go(-3)'>";
        echo   "</form>";
        echo  "</div>";
        echo "</body>";
        echo "</html>";
      }


}
?>