<?php 

    function generateOTP($length) {
        $otp = '';
        for ($i = 0; $i < $length; $i++) {
            $otp .= mt_rand(0, 9);
        }
        return $otp;
    }

    $otp = generateOTP(4);

    session_start();

$name1 = $_GET['name'];
$username1 = $_GET['uname'];
$password1 = $_GET['password'];
$phone1 = $_GET['phonenumber'];
$role1 = $_GET['role'];
$id=$_GET['id'];

$_SESSION['name'] = $name1;
$_SESSION['username'] = $username1;
$_SESSION['password'] = $password1;
$_SESSION['phone'] = $phone1;
$_SESSION['role'] = $role1;
$_SESSION['otp']=$otp;
$_SESSION['id']=$id;
    // Update the path below to your autoload.php,
    // see https://getcomposer.org/doc/01-basic-usage.md
   require __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';

// Your Account SID and Auth Token from console.twilio.com
    $sid ="AC5b18383c99e81d12065a854129d1d363";
    $token = "967a7a43474280de2f9de11c126c3ef6";
    $client = new Twilio\Rest\Client($sid, $token);

// Use the Client to make requests to the Twilio REST API
    $client->messages->create(
    // The number you'd like to send the message to
    "+91".$phone1,
    [
        // A Twilio phone number you purchased at https://console.twilio.com
       "from" => "+19896595242",
        // The body of the text message you'd like to send
        'body' => $otp
    ]
);   
    

?>

<!DOCTYPE html>
<html>
<head>
    <title>OTP Input</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            height: 280px;
        }
        .card-header {
            background-color: #6c757d;
            color: #fff;
            text-align: center;
            padding: 15px;
            border-radius: 10px 10px 0 0;
        }
        .form-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        .form-group input {
            width: 20%;
            text-align: center;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn-primary {
            background-color: #6c757d;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
        }
        .btn-primary:hover {
            background-color: #5a6268;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Auto focus on the first input field
            $('#otp1').focus();
            
            // Move cursor to next input on keyup
            $('.otp-input').on('keyup', function() {
                var maxLength = parseInt($(this).attr('maxlength'), 10);
                var currentLength = $(this).val().length;

                if (currentLength === maxLength) {
                    $(this).next('.otp-input').focus();
                }
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Enter OTP</h5>
                </div>
                <div class="card-body">
                    <form action="registration.php" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control otp-input" id="otp1" name="otp1" maxlength="1" required>
                            <input type="text" class="form-control otp-input" id="otp2" name="otp2" maxlength="1" required>
                            <input type="text" class="form-control otp-input" id="otp3" name="otp3" maxlength="1" required>
                            <input type="text" class="form-control otp-input" id="otp4" name="otp4" maxlength="1" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
