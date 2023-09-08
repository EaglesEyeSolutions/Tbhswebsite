<?php
// get_student_data.php

$servername = "localhost";
$username = "u322949535_eagleseye";
$password = "EaglesEyeSolutions@2023*";
$dbname = "u322949535_tbhs";

// Create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET["student_name"])) {
  $studentName = $_GET["student_name"];

  // TODO: Perform necessary sanitization and validation on $studentName before using it in the query.
  // It is recommended to use prepared statements to prevent SQL injection.

  // Query the database to get student data based on the selected student name
  $query = "SELECT DATE_FORMAT(date_of_birth, '%Y/%m/%d') AS formatted_date, student_id, phone_number, phone_number2,fee,pre_1st_year_due FROM student_detail WHERE student_name = '$studentName'";

  // Execute the query
  $result = mysqli_query($conn, $query);

  // Check if the query was successful and if there is exactly one row returned
  if ($result && mysqli_num_rows($result) === 1) {
    $data = mysqli_fetch_assoc($result);

    // Return the data as JSON
    header("Content-Type: application/json");
    echo json_encode($data);
  } else {
    // If the student name was not found or there was an error in the query, return an error JSON response
    $errorData = array("error" => "Student not found");
    header("Content-Type: application/json");
    echo json_encode($errorData);
  }

  // Close the database connection
  mysqli_close($conn);
} else {
  // If "student_name" parameter is not provided in the request, return an empty JSON response
  $emptyData = array();
  header("Content-Type: application/json");
  echo json_encode($emptyData);
}
?>




