<?php
// Establish a database connection
$servername = "localhost";
$username = "u322949535_eagleseye";
$password = "EaglesEyeSolutions@2023*";
$dbname = "u322949535_tbhs";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have POST data containing edited_due1, edited_due2, and selected_student
$editedDue1 = $_POST['edited_due1'];

$selectedStudent = $_POST['selected_student'];

// Prepare and execute a statement
$stmt = $conn->prepare("UPDATE student_detail SET due = due - pre_1st_year_due + ?,pre_1st_year_due = ? WHERE student_id = ?");
$stmt->bind_param("ddd", $editedDue1, $editedDue1, $selectedStudent);

$stmt->execute();

// Close statement and connection
$stmt->close();
$conn->close();

// Return a response indicating success
$response = array("success" => true);
echo json_encode($response);
?>
