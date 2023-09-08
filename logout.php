<?php
session_start();

session_destroy();
header("location:index.html");
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
        echo "Logout Successfully..........";
        echo "<a href='login.html'> Login here</a>";
        echo   "</form>";
        echo  "</div>";
        echo "</body>";
        echo "</html>";
 ?>