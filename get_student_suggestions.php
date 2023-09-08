<?php
// get_student_suggestions.php

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

if (isset($_GET["class"])) {
  $class = $_GET["class"];

  // TODO: Perform necessary sanitization and validation on $class before using it in the query.
  // It is recommended to use prepared statements to prevent SQL injection.

  // Query the database to get student suggestions based on the selected class
  $query = "SELECT student_name FROM student_detail WHERE class = '$class'";

  // Execute the query and fetch the data
  $result = mysqli_query($conn, $query);

  // Prepare an array to store the student names
  $data = array();

  // Fetch the student names from the result set
  while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row["student_name"];
  }

  // Return the data as JSON
  header("Content-Type: application/json");
  echo json_encode($data);

  // Close the database connection
  mysqli_close($conn);
} else {
  // If "class" parameter is not provided in the request, return an empty response or an error message.
  // Handle this as per your application's requirement.
}
?>

