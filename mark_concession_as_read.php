<?php
// mark_concession_as_read.php
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

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["concession_id"])) {
  $concessionId = $_POST["concession_id"];

  // Update the is_new flag to 0 for the specified concession
  $query = "UPDATE concession SET is_new = 0 WHERE id = '$concessionId'";
  mysqli_query($conn, $query);
}

// Close the database connection
mysqli_close($conn);
?>
