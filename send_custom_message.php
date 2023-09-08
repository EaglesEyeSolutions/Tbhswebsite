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

        .return-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #0000ee;
        }

        .return-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>SMS Notification Status</h1>
        <div class="status">
            <?php
if (!isset($_SESSION['user']) || $_SESSION['user'] == false) {
    header("Location: home.html");
    exit();
}

// Send SMS notifications using Twilio
$twilio_sdk_path = __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';
require_once 'twilio-php-main/src/Twilio/autoload.php'; // Update the path to the Twilio PHP SDK
use Twilio\Rest\Client;

$TWILIO_ACCOUNT_SID = "AC5b18383c99e81d12065a854129d1d363";
$TWILIO_AUTH_TOKEN = "967a7a43474280de2f9de11c126c3ef6";
$TWILIO_PHONE_NUMBER = "+19896595242";

            $DB_HOST = "localhost";
            $DB_USER = "u322949535_eagleseye";
            $DB_PASSWORD = "EaglesEyeSolutions@2023*";
            $DB_NAME = "u322949535_tbhs";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form data is present
    if (!isset($_POST["message"]) || empty($_POST["message"]) || !isset($_POST["classes"]) || empty($_POST["classes"])) {
        echo "Error: Message and at least one class must be selected.";
        exit;
    }

    // Get the custom message
    $custom_message = $_POST["message"];
    

    // Connect to the database
    $db_connection = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
    if (!$db_connection) {
        die("Error connecting to the database: " . mysqli_connect_error());
    }

    // Prepare the phone numbers query with prepared statement
    $class_ids = $_POST["classes"];

    

    $placeholders = implode(',', array_fill(0, count($class_ids), '?'));

    
    

    $query = "SELECT phone_number FROM student_detail WHERE class IN ($placeholders);";

    $stmt = mysqli_prepare($db_connection, $query);

    

    if (!$stmt) {
        die("Error preparing the query: " . mysqli_error($db_connection));
    }

    

    // Bind class IDs as parameters using a loop to pass by reference
    $param_types = str_repeat('i', count($class_ids));
    $bind_params = array_merge(array($stmt, $param_types), $class_ids);
    for ($i = 0; $i < count($class_ids); $i++) {
        $bind_params[$i + 2] = &$bind_params[$i + 2]; // Pass by reference
    }
    call_user_func_array('mysqli_stmt_bind_param', $bind_params);



    $result = mysqli_stmt_execute($stmt);
    if (!$result) {
        die("Error executing the query: " . mysqli_error($db_connection));
    }



    $twilio_client = new Client($TWILIO_ACCOUNT_SID, $TWILIO_AUTH_TOKEN);
    $message = $custom_message;

    // Fetch phone numbers and send SMS
    $phone_numbers = array();
    $stmt->bind_result($phone_number);

    

    while ($stmt->fetch()) {

        

        // Ensure the phone number is in E.164 format (e.g., +919876543210)
        $formatted_phone_number = $phone_number;
        try {
            $lookup = $twilio_client->lookups->v1->phoneNumbers($phone_number)
                ->fetch(['countryCode' => 'IN']);
            $formatted_phone_number = $lookup->phoneNumber;
           
        } catch (Exception $e) {
            // Log the validation error
            error_log("Twilio Phone Number Validation Error: " . $e->getMessage());
        }
    
    
        $phone_numbers[] = $formatted_phone_number;
    }
    
    

    
    
    $stmt->close();

    if (!empty($phone_numbers)) {
        
    
        foreach ($phone_numbers as $phone_number) {
        
        
            try {
                $twilio_client->messages->create(
                    $phone_number,
                    [
                        
                        'from' => $TWILIO_PHONE_NUMBER,
                        'body' => $message
                    ]
                    
                );
                
                //echo "SMS sent to $phone_number<br>";
            } catch (Exception $e) {
                echo "Error sending SMS to $phone_number: " . $e->getMessage() . "<br>";
            }
        }
    } else {
        echo "No phone numbers found."; // Add an appropriate message for your users
    }
    

    

    mysqli_close($db_connection);
}
?>

    
        </div>
        <a href="custom_msgs.html" class="return-link">Return to Home</a>
    </div>
</body>
</html>
