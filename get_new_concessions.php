<?php
// get_new_concessions.php

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

// Fetch new concessions from the database
$query = "SELECT * FROM concession WHERE is_new = 1";
$result = mysqli_query($conn, $query);

$newConcessions = array();

if ($result && mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $newConcessions[] = $row;
  }
}

// Return the new concessions as JSON
header("Content-Type: application/json");
echo json_encode($newConcessions);

// Close the database connection
mysqli_close($conn);
?>
