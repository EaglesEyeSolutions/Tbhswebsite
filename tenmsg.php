<?php
session_start();
        require __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';
        $db = mysqli_connect('localhost','u322949535_eagleseye','EaglesEyeSolutions@2023*','u322949535_tbhs');
        $sql = "SELECT * FROM tenthsliptest";
        $result = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_assoc($result)) 
    {
       
        // Sending SMS alert to parents
        $sid = "AC5b18383c99e81d12065a854129d1d363";
        $token = "967a7a43474280de2f9de11c126c3ef6";
         $client =new Twilio\Rest\Client($sid, $token);

         $client->messages->create(
        // The number you'd like to send the message to
            "+91".$row['phone_number'],
            [
        // A Twilio phone number you purchased at https://console.twilio.com
                "from" => "+19896595242",
        // The body of the text message you'd like to send
                'body' => "Dear Parent/Guardian,\nWe hope this message finds you well. We wanted to bring to your attention the Slip Test  performance of your child, " . $row['student_name'] . "\n " . $row['subject_name'] . ":" . $row['marks'] . "\nBest Regards:\nALIET"
            ]
        );     
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
        echo "subject add successfully";
        echo "<a href='teacher.php'> Go To Menu</a>";
        echo   "</form>";
        echo  "</div>";
        echo "</body>";
        echo "</html>";
?>