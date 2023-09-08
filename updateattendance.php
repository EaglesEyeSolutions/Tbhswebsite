<?php
session_start();
if (! isset ( $_SESSION ['user'] ) || $_SESSION ['user'] == false)
                  {
                   header ( "Location: home.html" );
                   exit ();
                   } 
use SimpleExcel\SimpleExcel;

if(isset($_POST['import'])){

if(move_uploaded_file($_FILES['excel_file']['tmp_name'],$_FILES['excel_file']['name'])){
    require_once('SimpleExcel/SimpleExcel.php'); 
    
    $excel = new SimpleExcel('csv');                  
    
    $excel->parser->loadFile($_FILES['excel_file']['name']);           
    
    $foo = $excel->parser->getField(); 

    $count = 1;
    $db = mysqli_connect('localhost','u322949535_eagleseye','EaglesEyeSolutions@2023*','u322949535_tbhs'); 
    while(count($foo)>$count){
        $stu_id = $foo[$count][0];
        $sem=$foo[$count][1];
        $month= $foo[$count][2];
        $tc=$foo[$count][3];
        $ac = $foo[$count][4];
        $av = ($ac*100)/$tc;
        if(strpos($stu_id, $_SESSION["branch"]))
       {
        $query = "INSERT INTO attedance(student_id,sem,month,totcls,attcls,percentage) ";
        $query.="VALUES ('$stu_id','$sem','$month','$tc','$ac','$av')";
        mysqli_query($db,$query);
        $count++;
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
        echo "Attendance added successfully";
        echo "<a href='teacher.php'> Go To Menu</a>";
        echo   "</form>";
        echo  "</div>";
        echo "</body>";
        echo "</html>";
    
    
               
    
    
}
   
    
    
}
?>