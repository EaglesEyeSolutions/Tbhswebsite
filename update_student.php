<!DOCTYPE html>
<html>
<head>
    <title>Update Student Details</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS for additional styling -->
    <style>
        body {
            padding: 20px;
        }
        .container {
            max-width: 500px;
            margin: auto;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["student_id"])) {
            // Database connection parameters
          
$servername = "localhost";
$username = "u322949535_eagleseye";
$password = "EaglesEyeSolutions@2023*";
$dbname = "u322949535_tbhs";

            // Create a connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Get the updated details from the form
            $student_id = $_POST["student_id"];
            $student_name = isset($_POST["student_name"]) ? $_POST["student_name"] : null;
            $class = isset($_POST["class"]) ? $_POST["class"] : null;
            $phone_number = isset($_POST["phone_number"]) ? $_POST["phone_number"] : null;
            $due = isset($_POST["due"]) ? $_POST["due"] : null;

            // Update the student details in the database
            $query = "UPDATE student_detail SET student_name = ?, class = ?, phone_number = ?, due = ? WHERE student_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssssi", $student_name, $class, $phone_number, $due, $student_id);

            if ($stmt->execute()) {
                echo "<h2 class='text-center'>Student details updated successfully.</h2>";
            } else {
                echo "<h2 class='text-center'>Error updating student details: " . $stmt->error . "</h2>";
            }

            $stmt->close();
            $conn->close();
        } else {
            echo "<h2 class='text-center'>Please enter a valid student ID.</h2>";
        }
        ?>
    </div>
    <div style="text-align: center; padding-top: 50px;">
        <a href="mdfy_stu.html" style="padding: 10px 20px; margin-top: 20px; text-decoration: none; background-color: #007bff; color: #fff; border-radius: 5px;">Go Back</a>
    </div>

</body>
</html>
