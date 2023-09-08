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
    $db= mysqli_connect('localhost','u322949535_eagleseye','EaglesEyeSolutions@2023*','u322949535_tbhs');
    $foo = $excel->parser->getField(); 

    $count = 1;

    while(count($foo)>$count){
        $roll = $foo[$count][0];
        $subname=$foo[$count][1];
        $mark = $foo[$count][2];
        $week=$foo[$count][3];
        $query = "UPDATE tenthsliptest SET subject_name = '$subname', marks = '$mark' WHERE student_id = '$roll'";
        mysqli_query($db,$query);
        $q="insert into allsliptest(student_id,subject_name,marks,week)values('$roll','$subname','$mark','$week')";
        mysqli_query($db,$q);
        $count++;

    }
    
    
    header ( "Location: tenmsg.php" );

    
    
    
               
    
    
}
   
   
    
}
?>