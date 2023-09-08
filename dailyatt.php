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
    $sec = $_GET["section"];
    $_SESSION['period'] = $_GET["period"];
    $_SESSION["section"] = $_GET["section"];
    $_SESSION["class"] = $_GET["class"];
    $_SESSION["subject"] = $_GET["subject"];
    $sc = $_SESSION["section"];
    $d = date('y-m-d');
    $s = $_SESSION["class"];
    $p = $_SESSION['period'];
    $sql = "SELECT student_id, rollno,student_name FROM student_personal WHERE year='$s' AND section='$sec' order by rollno";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<!DOCTYPE html>";
        echo "<html>";
        echo "<head>";
        echo "<title>Table layout</title>";
        echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "</head>";
        echo "<body>";
        echo "<div class='container'>";
        echo "<h1 class='text-center' style='color:blue;'>Take Attendance:</h1>";
        echo "<marquee direction='left' style='color:red;'>-------------If Student Absent click The Check-Box----------------</marquee>";
        echo "<form action='addattendance.php' method='get' class='border border-dark p-4 mx-auto' style='max-width: 600px;'>"; // Adjust max-width as needed

        while ($row = $result->fetch_assoc()) {
            echo "<div class='form-check d-flex justify-content-between align-items-center'>";
            echo "<input type='checkbox' name='" . $row['student_id'] . "' id='" . $row['student_id'] . "' class='form-check-input'>";
            echo "<label for='" . $row['student_name'] . "' class='form-check-label'>" . $row['student_name'] . "</label>";
            echo "<label for='" . $row['rollno'] . "' class='form-check-label'>" . $row['rollno'] . "</label>";
            echo "</div>";
        }

        echo "<div class='text-center mt-3'>";
        echo "<input type='submit' value='Submit' class='btn btn-primary'>";
        echo "</div>";
        echo "</form>";
        echo "</div>";
        echo "<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>";
        echo "</body>";
        echo "</html>";
    }
}
?>
