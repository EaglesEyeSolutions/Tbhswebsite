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
    $stu_id = $_GET['Uname'];
    if ($stu_id == "lkg") {
        $stu_id = -1;
    }
    if ($stu_id == "ukg") {
        $stu_id = 0;
    }
    $sql = "SELECT * FROM student_detail WHERE class='$stu_id' ORDER BY section";
    $sql1 = "SELECT count(*) as total FROM student_detail WHERE class='$stu_id'";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();

    $result = $conn->query($sql);
    $localDate = date('Y-m-d'); // Replace with your local date
    $year = date('Y', strtotime($localDate));
    if ($result->num_rows > 0) {
        echo "<!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Student Details</title>
        </head>
        <body style='font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f7f7f7;'>
            <div style='text-align: center; padding: 20px;' class='mainsiv'>
                <div style='display: flex; justify-content: space-between; align-items: center; padding: 10px; background-color: #fff; border: 1px solid #ccc; border-radius: 5px; margin-bottom: 20px;' class='div1'>
                    <div style='background-color: #007bff; color: #fff; padding: 5px 10px; border-radius: 5px; font-size: 18px;' class='class'><h>CLASS - $stu_id</h></div>
                    <div style='background-color: #007bff; color: #fff; padding: 5px 10px; border-radius: 5px; font-size: 18px;' class='number'><h>TOTAL NUMBER OF THE STUDENTS: " . $row1["total"] . "</h></div>
                </div>
                <div style='background-color: #fff; border: 1px solid #ccc; border-radius: 5px; padding: 20px; box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);' class='divclass'>
                    <table style='width: 100%; border-collapse: collapse;' class='table'>
                        <tr>
                            <th>S.No</th>
                            <th>Student Name</th>
                            <th>Student Id</th>
                            <th>Class</th>";
                           echo "<th>".$year."-".($year+1)."</th>";
                            echo "<th>".($year-1)."-".$year."</th>";
                            
                            echo "<th>Total Due</th>
                            <th>Fee Paid</th>
                            <th>Due Present</th>
                        </tr>";
        $serialNumber = 1;
        while ($row = $result->fetch_assoc()) {
            $totalAmount = floatval($row["fee"]) + floatval($row["pre_1st_year_due"]);
            
            echo "<tr style='background-color: #fff;' class='tddd'>";
            echo "<td style='padding: 10px; text-align: center; border: 1px solid #ddd;'>".$serialNumber."</td>";
            echo "<td style='padding: 10px; text-align: center; border: 1px solid #ddd;'>". $row["student_name"] ."</td>";
            echo "<td style='padding: 10px; text-align: center; border: 1px solid #ddd;' class='thh'>" . $row["student_id"] . "</td>";
            echo "<td style='padding: 10px; text-align: center; border: 1px solid #ddd;' class='thh'>" . $row["class"] . "</td>";
            echo "<td style='padding: 10px; text-align: center; border: 1px solid #ddd;' class='thh'>" . $row["fee"] . "</td>";
            echo "<td style='padding: 10px; text-align: center; border: 1px solid #ddd;' class='thh'>" . $row["pre_1st_year_due"] . "</td>";
            echo "<td style='padding: 10px; text-align: center; border: 1px solid #ddd;' class='thh'>" . number_format($totalAmount, 2) . "</td>"; // Display total amount
            echo "<td style='padding: 10px; text-align: center; border: 1px solid #ddd;' class='thh'>" . $row["fee_paid"] . "</td>";
            echo "<td style='padding: 10px; text-align: center; border: 1px solid #ddd;' class='thh'>" . $row["due"] . "</td>";
            $serialNumber++;
            echo "</tr>";
        }
        echo "</table></div>";
        echo "</div>";
        echo "</body>";
        echo "</html>";
    } else {
        echo "No data present";
    }
}

$conn->close();
?>
