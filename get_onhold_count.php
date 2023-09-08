<?php
// Connect to the database using your credentials
$servername = "localhost";
$username = "u322949535_eagleseye";
$password = "EaglesEyeSolutions@2023*";
$dbname = "u322949535_tbhs";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query the database to get the count of onhold requests
$query = "SELECT COUNT(*) as count FROM concession WHERE status = 'On Hold'";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $onholdCount = $row["count"];
} else {
    $onholdCount = 0;
}

// Close the database connection
$conn->close();

// Return the count as a JSON response
echo json_encode(["count" => $onholdCount]);
?>
