<?php
// concession_handler.php
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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Retrieve form data
  $class = $_POST["class"];
  $studentName = $_POST["student_name"];
  $studentID = $_POST["student_id"];
  $fee_ex = $_POST["fee_ex"];
  $comment = $_POST["comment"];

    

  // TODO: Perform necessary validation and sanitization on the form data before using it in the query.
  // It is recommended to use prepared statements to prevent SQL injection.

  // Check if the student_id is already present with is_new = 1
  $queryCheck = "SELECT COUNT(*) as count FROM concession WHERE student_id = '$studentID' AND is_new = 1";
  $resultCheck = mysqli_query($conn, $queryCheck);
  $rowCheck = mysqli_fetch_assoc($resultCheck);
  $count = $rowCheck['count'];

  if ($count === '0'|| !isset($_POST["student_id"]) ) {
    // Student ID is not already present with is_new = 1, so insert the data
    
    $query = "INSERT INTO concession (class, student_name, student_id, comment, fee_ex, is_new)
              VALUES ('$class', '$studentName', '$studentID', '$comment', '$fee_ex', 1)";

    if (mysqli_query($conn, $query)) {
      // Data successfully inserted

      // Notify other users on the admin.php page
      // The following code assumes that you have a notification mechanism in place for admin.php.
      // It could be WebSocket, AJAX polling, or Server-Sent Events (SSE).

      // Replace "YOUR_NOTIFICATION_MESSAGE" with the desired message you want to display on admin.php
      $notificationMessage = "New concession request: Student Name: $studentName, Class: $class, Student ID: $studentID, Fee Expectation: $fee_ex, Comment: $comment";

      // Send the notification to admin.php using AJAX or WebSocket
      // For example, using AJAX:
      echo '<script>
              var xhr = new XMLHttpRequest();
              xhr.open("POST", "concession_handler.php", true);
              xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhr.send("message='.urlencode($notificationMessage).'");
            </script>';

      // For WebSocket or other real-time notification mechanisms, you would handle the notification differently.
    } else {
      // Error in inserting data
      echo "Error: " . mysqli_error($conn);
    }
  } else {
    // Student ID is already present with is_new = 1, do not insert a new record
    // You can add any logic here if you want to handle this case differently
    echo "Student ID is already present with is_new = 1. No new record inserted.";
  }

  // Close the database connection
  mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>My PHP Page</title>
    <!-- Add any necessary CSS or meta tags here -->
</head>
<body>
    <div style="text-align: center; padding-top: 50px;">
        <a href="javascript:history.go(-1)" style="padding: 10px 20px; margin-top: 20px; text-decoration: none; background-color: #007bff; color: #fff; border-radius: 5px;">Go Back</a>
    </div>
</body>
</html>


