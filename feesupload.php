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
    $db =mysqli_connect('localhost','u322949535_eagleseye','EaglesEyeSolutions@2023*','u322949535_tbhs');
    $name=$_SESSION["name"];
    $branc=$_SESSION["branchname"];
    while(count($foo)>$count){
        $roll = $foo[$count][0];
        $studname=$foo[$count][1];
        $tid= $foo[$count][2];
        $amount = $foo[$count][3];
        $today=$foo[$count][4];
        $query = "INSERT INTO fees (student_id,student_name,trans_id,amount,Trns_date,branch,verified) ";
        $query.="VALUES ('$roll','$studname','$tid','$amount','$today','$branc','$name')";
        mysqli_query($db,$query);
        $count++;
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
        echo "Fees receipt uploaded Successfully...";
        echo"<a href='javascript:history.back(-3)'>Go Back</a>";
        echo   "</form>";
        echo  "</div>";
        echo "</body>";
        echo "</html>";
    
    
               
    
    
}
   
    
    
}
?>