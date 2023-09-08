<?php
session_start();
$servername = "localhost";
$username = "u322949535_eagleseye";
$password = "EaglesEyeSolutions@2023*";
$dbname = "u322949535_tbhs";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{
  die("Connection failed: " . $conn->connect_error);
}
else
{
      // Check if 'Uname' and 'Pass' are set in the $_GET array
      if (isset($_GET['Uname']) && isset($_GET['Pass'])) {
        $userid = $_GET['Uname'];
        $passwrd = $_GET['Pass'];
      



        $sql = "SELECT * FROM users WHERE username = '$userid'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) 
        {

           $row = $result->fetch_assoc();
           
           if ($row['password'] == $passwrd)
           {
                if ((strtolower($row['role']) == "accountant") && $row['status'] == 1)
                {
                    $_SESSION["user"] = "accountant";
                    $_SESSION["msg"] = 0;
                    header("Location:accountant.php");
                      /*function generateOTP() {
                            return str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
                        }
                        // Assume you have a database connection
                        $db = mysqli_connect('localhost','u322949535_eagleseye','EaglesEyeSolutions@2023*','u322949535_tbhs');
                        
                        if (!$db) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        
                        // Get user ID from some source (e.g., query parameter, session, etc.)
                        // Retrieve user's phone number from the database based on user ID
                        $query = "SELECT phone FROM users WHERE username = '$userid'";
                        $result = mysqli_query($db, $query);
                        
                        if ($result && mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            $userPhoneNumber = $row['phone'];
                        
                            // Generate OTP
                            $otp = generateOTP(); // Generate 4-digit OTP
                        
                            $_SESSION['otp'] = $otp;
                        
                            // Send OTP using Twilio
                            require __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';
                            $sid ="AC3d5c9aa7b18117f3af07eaf402f76b4a";
                            $token = "7d07fcee3b3c667f11f2acfe2f8d4612"; // Replace with your Twilio Auth Token
                            $client = new Twilio\Rest\Client($sid, $token);
                        
                            $client->messages->create(
                                "+91" . $userPhoneNumber,
                                [
                                    "from" => "+17622285481", // Your Twilio phone number
                                    'body' => "Your OTP is: $otp"
                                ]
                            );
                        
                            // Redirect to the verify OTP page
                            header("Location: verify_otp2.php?user_id=$user_id");
                            exit;
                    } */
                    
                    // Close the database connection
                  $_SESSION["user"] = "accountant";
                  $_SESSION["msg"] = 0;
                  header("location: accountant.php");
                  exit;
                }
                elseif ((strtolower($row['role']) == "admin") && $row['status'] == 1)
                {
                  $_SESSION["user"] = "admin";
                  $_SESSION["msg"] = 0;
                  header("location: admin.php");
                  exit;
                }
            }
        }    
      }
      else{
      echo "Error::access denied due to incorrect password or id ";}
}

$conn->close();
?>
