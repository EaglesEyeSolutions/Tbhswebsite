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

    $stu_id = $_GET['sid'];
    $sql = "SELECT * FROM student_personal WHERE student_id='$stu_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<!DOCTYPE html>";
            echo "<html>";
            echo "<head>";
            echo "<title>Student Information</title>";
            echo "</head>";
            echo "<style type='text/css'>
                @media print {
                 #printbtn {
                    display :  none;
                }
                #backbutton {
                    display :  none;
                }
               }
               </style>";
            echo "<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap' rel='stylesheet'>";
            echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>";
            echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>";
            echo "<link rel='stylesheet' type='text/css' href='display.css'>";
            echo "<body>";

            // Display Student Profile
            echo "<div class='student-profile py-4'>";
            echo "<div class='container'>";
            echo "<div class='row'>";
            echo "<div class='col-lg-4'>";
            echo "<div class='card shadow-sm'>";
            echo "<div class='card-header bg-transparent text-center'>";
            echo "<img class='profile_img' src='images/aliet.jpeg' alt='student dp'>";
            echo "<h3>".$row['student_name']."</h3>";
            echo "</div>";
            echo "<div class='card-body'>";
            echo "<p class='mb-0'><strong class='pr-1'>DICE ID:</strong>".$row['student_id']."</p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "<div class='col-lg-8'>";
            echo "<div class='card shadow-sm'>";
            echo "<div class='card-header bg-transparent border-0'>";
            echo "<h3 class='mb-0'><i class='far fa-clone pr-1'></i>General Information</h3>";
            echo "</div>";
            echo "<div class='card-body pt-0'>";
            echo "<table class='table table-bordered'>";
            echo "<tr>";
            echo "<th width='30%''>RollNo</th>";
            echo "<td width='2%''>:</td>";
            echo "<td>".$row['student_id']."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th width='30%'>Date of Birth</th>";
            echo "<td width='2%'>:</td>";
            echo "<td>".$row['dob']."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th width='30%'>Student Aadhar</th>";
            echo "<td width='2%'>:</td>";
            echo "<td>".$row['Student_Aadhar']."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th width='30%'>Parent PhoneNo</th>";
            echo "<td width='2%'>:</td>";
            echo "<td>".$row['phone']."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th width='30%'>Address</th>";
            echo "<td width='2%'>:</td>";
            echo "<td>".$row['address']."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th width='30%'>father Name</th>";
            echo "<td width='2%'>:</td>";
            echo "<td>".$row['father_name']."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th width='30%'>Mother Name</th>";
            echo "<td width='2%'>:</td>";
            echo "<td>".$row['mother_name']."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th width='30%'>Father Aadhar</th>";
            echo "<td width='2%'>:</td>";
            echo "<td>".$row['father_aadhar']."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th width='30%'>Mother Aadhar</th>";
            echo "<td width='2%'>:</td>";
            echo "<td>".$row['mother_aadhar']."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th width='30%'>Caste</th>";
            echo "<td width='2%'>:</td>";
            echo "<td>".$row['caste']."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th width='30%'>Sub Caste</th>";
            echo "<td width='2%'>:</td>";
            echo "<td>".$row['subcaste']."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th width='30%'>Alternative Phone</th>";
            echo "<td width='2%'>:</td>";
            echo "<td>".$row['alterphone']."</td>";
            echo "</tr>";
            echo "</table>";
            echo "</div>";
            echo "</div>";
            echo "<div style='height: 26px'></div>";

           // Display Payment Details
echo "<div class='card shadow-sm'>";
echo "<div class='card-header bg-transparent border-0'>";
echo "<h3 class='mb-0'><i class='far fa-clone pr-1'></i>Payment Details</h3>";
echo "</div>";

$paymentSql = "SELECT * FROM student_detail WHERE student_id='$stu_id'";
$paymentResult = $conn->query($paymentSql);

if ($paymentResult->num_rows > 0) {
    echo "<div>";
    echo "<table class='table table-bordered' style='margin-bottom: 0'>";
    echo "<tr>";
    echo "<th style='width: 30%'>Fee</th><th style='width: 30%'>Fee Paid</th><th style='width: 40%'>Due</th>";
    echo "</tr>";

    while ($paymentRow = $paymentResult->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $paymentRow['fee'] . "</td>";
        echo "<td>" . $paymentRow['fee_paid'] . "</td>";
        echo "<td>" . $paymentRow['due'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "</div>";

    // See More link to view all transactions
    echo "<p class='mt-2'><a href='#' id='seeMoreLink'>See More</a></p>";
} else {
    echo "<p>No payment details available.</p>";
}

echo "</div>"; // Closing payment card


echo "<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>";
echo "<script>";
echo "$(document).ready(function() {
    $('#seeMoreLink').click(function(e) {
        e.preventDefault();
        $('#transactionTable').toggle();
    });
});";
echo "</script>";

            echo "<div style='height: 20px'></div>";

            // Display Marks Information
            echo "<div class='card shadow-sm'>";
            echo "<div class='card-header bg-transparent border-0'>";
            echo "<h3 class='mb-0'><i class='far fa-clone pr-1'></i>Marks Information</h3>";
            echo "</div>";

            $marksSql = "SELECT * FROM student_marks WHERE student_id='$stu_id'";
            $marksResult = $conn->query($marksSql);

            if ($marksResult->num_rows > 0) {
                echo "<div>";
                echo "<table border='2px'>";
                echo "<tr>";
                echo "<th>Subject</th><th>Class</th><th>FA1</th><th>FA2</th><th>FA3</th><th>FA4</th><th>SA1</th><th>SA2</th><th>SA3</th>";
                echo "</tr>";

                while ($marksRow = $marksResult->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$marksRow['subname']."</td>";
                    echo "<td>".$marksRow['year']."</td>";
                    echo "<td>".$marksRow['mid1']."</td>";
                    echo "<td>".$marksRow['onlinemid1']."</td>";
                    echo "<td>".$marksRow['mid2']."</td>";
                    echo "<td>".$marksRow['onlinemid2']."</td>";
                    echo "<td>".$marksRow['external']."</td>";
                    echo "<td>".$marksRow['credit']."</td>";
                    echo "<td>".$marksRow['internal']."</td>";
                    echo "</tr>";
                }

                echo "</table>";
                echo "</div>";
            } else {
                echo "<p>No marks information available.</p>";
            }

            echo "</div>"; // Closing marks card
            echo "<div style='height: 20px'></div>";

            // Display Attendance Information
            echo "<div class='card shadow-sm'>";
            echo "<div class='card-header bg-transparent border-0'>";
            echo "<h3 class='mb-0'><i class='far fa-clone pr-1'></i>Attendance</h3>";
            echo "</div>";

            $attendanceSql = "SELECT * FROM attendance WHERE student_id='$stu_id'";
            $attendanceResult = $conn->query($attendanceSql);

            if ($attendanceResult->num_rows > 0) {
                echo "<div>";
                echo "<table border='2px'>";
                echo "<tr>";
                echo "<th>Student ID</th><th>Semester</th><th>Month</th><th>Total Classes</th><th>Attended Classes</th><th>Percentage</th>";
                echo "</tr>";

                while ($attendanceRow = $attendanceResult->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $attendanceRow['student_id'] . "</td>";
                    echo "<td>" . $attendanceRow['sem'] . "</td>";
                    echo "<td>" . $attendanceRow['month'] . "</td>";
                    echo "<td>" . $attendanceRow['totcls'] . "</td>";
                    echo "<td>" . $attendanceRow['attcls'] . "</td>";
                    echo "<td>" . $attendanceRow['percentage'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
                echo "</div>";
            } else {
                echo "<p>No attendance information available.</p>";
            }

            echo "</div>"; // Closing attendance card
            echo "<div style='height: 20px'></div>";
            // Display Transaction Table (Initially Hidden)
echo "<div id='transactionTable' style='display: none'>";
echo "<h4 class='mt-3'>All Transactions</h4>";

$transactionSql = "SELECT * FROM trans WHERE student_id='$stu_id'";
$transactionResult = $conn->query($transactionSql);

if ($transactionResult->num_rows > 0) {
    echo "<table class='table table-bordered'>";
    echo "<tr>";
    echo "<th>Transaction ID</th><th>Amount</th><th>Date</th>";
    echo "</tr>";

    while ($transactionRow = $transactionResult->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $transactionRow['trans_id'] . "</td>";
        echo "<td>" . $transactionRow['amount'] . "</td>";
        echo "<td>" . $transactionRow['dates'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No transaction data available.</p>";
}

echo "</div>";

// ... (rest of the code)


            echo "<br>";
            echo "<input type='button' value='Go back!' onclick='history.back()' id='backbutton'>";
            echo "<input type='button' value='Print' id='printbtn' onclick='print()' style='margin-left: 50px'>";
            echo "</body>";
            echo "</html>";
        }
    } else {
        echo "Student Not Found!!!!!";
    }

    $conn->close();
}
?>
