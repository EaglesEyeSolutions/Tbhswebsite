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

    $foo = $excel->parser->getField(); 

    $count = 1;
    $db =mysqli_connect('localhost','u322949535_eagleseye','EaglesEyeSolutions@2023*','u322949535_tbhs');
    $sem=0;
    $sec=1;
    while(count($foo)>$count){
        $roll = $foo[$count][0];
        $subname=$foo[$count][1];
        $sem = $foo[$count][2];
        $mid1 = $foo[$count][4];
        $sec=$foo[$count][3];
        $query = "UPDATE student_marks SET mid2='$mid1' WHERE student_id='$roll' and subname='$subname'";
        mysqli_query($db,$query);
        $count++;
    }
    
    $_SESSION['sem']=$sem;
    $_SESSION['sec']=$sec;
    $_SESSION['exam']='FA3';
    header ( "Location: sendmessages.php" );
    

        

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
        echo "subject add successfully";
        echo "<a href='teacher.php'> Go To Menu</a>";
        echo   "</form>";
        echo  "</div>";
        echo "</body>";
        echo "</html>";
    
    
               
    
    
}
   
   
    
}
?>