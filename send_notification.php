<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>SMS Notification Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .status {
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
            border: 1px solid #cccccc;
            border-radius: 4px;
        }

        .success {
            color: #009900;
        }

        .error {
            color: #ff0000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>SMS Notification Status</h1>
        <div class="status">
          
            <?php

            
            if (! isset ( $_SESSION ['user'] ) || $_SESSION ['user'] == false)
                        {
             header ( "Location: home.html" );
             exit ();
            } 


            // Send SMS notifications using Twilio
            $twilio_sdk_path = __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';
            require_once 'twilio-php-main/src/Twilio/autoload.php'; // Update the path to the Twilio PHP SDK            
            use Twilio\Rest\Client;


            // Replace these with your Twilio credentials
            $TWILIO_ACCOUNT_SID = "AC5b18383c99e81d12065a854129d1d363";
            $TWILIO_AUTH_TOKEN = "967a7a43474280de2f9de11c126c3ef6";
            $TWILIO_PHONE_NUMBER = "+19896595242";

            // Replace these with your database credentials
            $DB_HOST = "localhost";
            $DB_USER = "u322949535_eagleseye";
            $DB_PASSWORD = "EaglesEyeSolutions@2023*";
            $DB_NAME = "u322949535_tbhs";
            
          

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $option = $_POST["option"];

                // Connect to the database
                $db_connection = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
                if (!$db_connection) {
                    die("Error connecting to the database: " . mysqli_connect_error());
                }

                // Query the student_detail table based on the option
                if ($option == 1) {
                    $query = "SELECT phone_number FROM student_detail;";
                } elseif ($option == 2) {
                    $class_id = $_POST["class_id"];
                    $query = "SELECT phone_number FROM student_detail WHERE class = $class_id;";
                }

                $result = mysqli_query($db_connection, $query);
                if (!$result) {
                    die("Error querying the database: " . mysqli_error($db_connection));
                }

                

                $twilio_client = new Client($TWILIO_ACCOUNT_SID, $TWILIO_AUTH_TOKEN);
                $message = "Dear student, your fee is due. Please make the payment as soon as possible.";

                while ($row = mysqli_fetch_assoc($result)) {
                    $phone_number = '+91'.$row["phone_number"];

                    try {
                        $twilio_client->messages->create(
                            $phone_number,
                            [
                                'from' => $TWILIO_PHONE_NUMBER,
                                'body' =>  "Dear student, your fee is due. Please make the payment as soon as possible."
                            ]
                        );
                        echo "SMS sent to $phone_number<br>";
                    } catch (Exception $e) {
                        echo "Error sending SMS to $phone_number: " . $e->getMessage() . "<br>";
                    }
                }

                mysqli_close($db_connection);
            }
            ?>

    
<div style="text-align: center; padding-top: 50px;">
            <a href="javascript:history.go(-1)" style="padding: 10px 20px; margin-top: 20px; text-decoration: none; background-color: #007bff; color: #fff; border-radius: 5px;">Go Back</a>
        </div>
        
        
        
</body>
</html>
