<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user'] == false) {
    header("Location: home.html");
    exit();
}

$servername = "localhost";
$username = "u322949535_eagleseye";
$password = "EaglesEyeSolutions@2023*";
$dbname = "u322949535_tbhs";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $nm=$_POST["student_name"];
    $id = $_POST["student_id"];
    $am = $_POST["amount"];
    $dt = date('y-m-d');
    $class = $_POST["class"];
    $fe=$_POST["Fee_Type"];
    

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the form has been submitted

    // Retrieve the selected payment option
    if (isset($_POST["paymentOption"])) {
        $selectedPaymentOption = $_POST["paymentOption"];

        // Depending on the selected option, you can access the corresponding data.
        // For example, if "UPI" is selected, you can access the UTR number as follows:
        if ($selectedPaymentOption === "Cash" ) {
            $utrrcheckNumber = '-';
            $verified='ACCEPT';
            // Now you can use $utrNumber as needed in this PHP page or pass it to the next page.
        }
        if ($selectedPaymentOption === "UPI" && isset($_POST["utrNumber"])) {
            $utrrcheckNumber = $_POST["utrNumber"];
            $verified='NO';
            // Now you can use $utrNumber as needed in this PHP page or pass it to the next page.
        }

        // Similarly, you can access the check number if "Check" is selected:
        if ($selectedPaymentOption === "Check" && isset($_POST["checkNumber"])) {
            $utrrcheckNumber = $_POST["checkNumber"];
            $verified='NO';
            // Now you can use $checkNumber as needed in this PHP page or pass it to the next page.
        }

        // You can also access other form fields in a similar manner if needed.
    }
    
    
}


    $sql = "SELECT * FROM trans WHERE trans_id = '{$_SESSION['transac_id']}'";
    $result = $conn->query($sql);

    // Check if the query returned any rows
    if ($result->num_rows == 0) {
        $sql = "INSERT INTO trans (student_id, amount, dates, year, trans_id,payment_method,UTRrCHECK_Number,verified)
                VALUES ('$id', '$am', '$dt', '$class', '{$_SESSION['transac_id']}','$selectedPaymentOption-$fe','$utrrcheckNumber','$verified')";
    } else {
        header("Location: addtransaction.php");
        exit();
    }

    if ($conn->query($sql)) {
        // Deduct the paid amount from the student's due in the student_detail table
        $updateDueQuery = "UPDATE student_detail SET due = due - fee_paid WHERE student_id = '$id'";
        $conn->query($updateDueQuery);
    }
}
        


    /*    // Send SMS notifications using Twilio
        $twilio_sdk_path = __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';
        require_once 'twilio-php-main/src/Twilio/autoload.php'; // Update the path to the Twilio PHP SDK            
        use Twilio\Rest\Client;


        // Replace these with your Twilio credentials
        $TWILIO_ACCOUNT_SID = "AC5b18383c99e81d12065a854129d1d363";
        $TWILIO_AUTH_TOKEN = "967a7a43474280de2f9de11c126c3ef6";
        $TWILIO_PHONE_NUMBER = "+19896595242";

            // Query the student_detail table based on the option
            
                $student_id = $_POST["student_id"];
                $query = "SELECT phone_number FROM student_detail WHERE student_id  = $student_id;";
           

            $result = mysqli_query($conn, $query);
            if (!$result) {
                die("Error querying the database: " . mysqli_error($conn));
            }


            $twilio_client = new Client($TWILIO_ACCOUNT_SID, $TWILIO_AUTH_TOKEN);
            $message = "Dear Parent, Thank you for paying the school fee. You have paid $am /-";

            if ($selectedPaymentOption === 'Cash') {
                $message .= " in cash";
            } elseif ($selectedPaymentOption === 'UPI') {
                $message .= " through UPI with UTR Number: $utrrcheckNumber";
            } elseif ($selectedPaymentOption === 'Check') {
                $message .= " through a check with Check Number: $utrrcheckNumber";
            }
            
            $message .= " for the student with ID: $student_id.";
            
            while ($row = mysqli_fetch_assoc($result)) 
            {
                $phone_number = '+91'.$row["phone_number"];

                try {
                    $twilio_client->messages->create(
                        $phone_number,
                        [
                            'from' => $TWILIO_PHONE_NUMBER,
                            'body' =>  $message
                        ]
                    );
                    echo "SMS sent to $phone_number<br>";
                } catch (Exception $e) {
                    echo "Error sending SMS to $phone_number: " . $e->getMessage() . "<br>";
                }
            }
            */
            mysqli_close($conn);
              
?>



<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .receipt {
            width: 400px;
            border: 2px solid black;
            padding: 20px;
            margin: 50px auto;
            text-align: center;
        }

        .receipt h3 {
            margin: 0;
            text-decoration: underline;
        }

        .receipt p {
            margin: 5px 0;
        }

        .school-title {
            font-size: 24px;
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 10px;
        }

        @media print {
            .noprint {
                visibility: hidden;
            }
        }
    </style>
</head>
<body>
    <div class="receipt">
        <div class="school-title">The Brilliant High School</div>
        <h3>Transaction ID: <?php echo $_SESSION['transac_id']; ?></h3>
        <p>Student ID: <?php echo $id; ?></p>
        <p>Date: <?php echo $dt; ?></p>
        <p>Amount: <?php echo $am; ?>/-</p>
        <p>Class: <?php echo $class; ?></p>
        <p>Payment Method: <?php echo $selectedPaymentOption . ' for ' . $fe; ?></p>
        <?php if ($selectedPaymentOption === 'UPI') { ?>
            <p>UTR Number: <?php echo $utrrcheckNumber; ?></p>
        <?php } elseif ($selectedPaymentOption === 'Check') { ?>
            <p>Check Number: <?php echo $utrrcheckNumber; ?></p>
        <?php } ?>
        <p>Signature of Accountant: _______________________</p>
    </div>
    <button value="Print" style="width: 80px; color: black; background-color: skyblue; margin-left: 150px; margin-top: 30px; height: 30px" onclick="print()" class="noprint">Print</button>
    <button onclick="goBack()" style="padding: 10px 20px; margin-top: 20px; text-decoration: none; background-color: #007bff; color: #fff; border-radius: 5px;" class="noprint">Go Back</button>


  

    <script>
        function goBack() {
            // Check if the user session variable is set and not empty
            // Replace 'user' with the actual name of your session variable
            var userType = '<?php echo isset($_SESSION['user']) ? $_SESSION['user'] : ""; ?>';

            // Perform redirection based on the user's type
            if (userType === 'admin') {
                window.location.href = 'addtransaction.php';
            } else if (userType === 'accountant') {
                window.location.href = 'addtransaction.php';
            } else {
                // If the user type is not defined or doesn't match any case, redirect to a default page
                window.location.href = 'login.html';
            }
        }
    </script>
</body>
</html>