<?php


if(isset($_POST['import'])){

if(move_uploaded_file($_FILES['pdf_file']['tmp_name'],$_FILES['pdf_file']['name']))
{
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
        echo "File Uploaded  successfully";
        echo "<a href='teacher.html'> Go To Menu</a>";
        echo   "</form>";
        echo  "</div>";
        echo "</body>";
        echo "</html>";
}

}
?>