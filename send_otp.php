<?php
session_start();

// send_otp.php


$twilio_sdk_path = __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';
require_once 'twilio-php-main/src/Twilio/autoload.php'; // Update the path to the Twilio PHP SDK
use Twilio\Rest\Client;

$TWILIO_ACCOUNT_SID = "ACe997d55af980887ac53ae7f8c0f7f56d";
$TWILIO_AUTH_TOKEN = "261e669e6bdad92de3dc4c4e1a5dc1d3";
$TWILIO_PHONE_NUMBER = "+19403503979";
$twilio = new Client($TWILIO_ACCOUNT_SID, $TWILIO_AUTH_TOKEN);



$phone_number = $_GET['phone_number'];




$formatted_phone_number = $phone_number;
        try {
            $lookup = $twilio->lookups->v1->phoneNumbers($phone_number)
                ->fetch(['countryCode' => 'IN']);
            $formatted_phone_number = $lookup->phoneNumber;
           
        } catch (Exception $e) {
            // Log the validation error
            error_log("Twilio Phone Number Validation Error: " . $e->getMessage());
        }
        $phone_number = $formatted_phone_number;
        try {
            $twilio->messages->create(
              $phone_number,
              [
                'from' => $TWILIO_PHONE_NUMBER,
                'body' => "Your OTP: {$_SESSION['totp']}",
              ]
            );
            
            // Store the OTP (e.g., in a session or database)
             
          
            echo json_encode(['success' => true]);
          } catch (Exception $e) {
            echo json_encode(['success' => false]);
          }

        

?>
