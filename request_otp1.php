<?php
session_start();
function generateOTP() {
    return str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
}
// Assume you have a database connection
$db = mysqli_connect('localhost','u322949535_eagleseye','EaglesEyeSolutions@2023*','u322949535_tbhs');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get user ID from some source (e.g., query parameter, session, etc.)
$user_id = $_POST['user_id']; // Replace with your method of getting the user ID
echo $user_id;

// Retrieve user's phone number from the database based on user ID
$query = "SELECT phone FROM users WHERE username = '$user_id'";
$result = mysqli_query($db, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $userPhoneNumber = $row['phone'];

    // Generate OTP
    $otp = generateOTP(); // Generate 4-digit OTP

    $_SESSION['otp'] = $otp;

    // Send OTP using Twilio
    require __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';
    $sid ="AC5b18383c99e81d12065a854129d1d363";
    $token = "967a7a43474280de2f9de11c126c3ef6"; // Replace with your Twilio Auth Token
    $client = new Twilio\Rest\Client($sid, $token);

    $client->messages->create(
        "+91" . $userPhoneNumber,
        [
            "from" => "+19896595242", // Your Twilio phone number
            'body' => "Your OTP is: $otp"
        ]
    );

    // Redirect to the verify OTP page
    header("Location: verify_otp1.php?user_id=$user_id");
    exit;
} else {
    // Handle user not found or error
    echo "User not found or an error occurred.";
}

// Close the database connection
mysqli_close($db);

?>