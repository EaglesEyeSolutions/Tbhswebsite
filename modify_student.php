<!DOCTYPE html>
<html>
<head>
    <title>Modify Student Details</title>
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

            // Get the student ID from the form
            $student_id = $_POST["student_id"];

            // Fetch student details from the database based on the student ID
            $query = "SELECT * FROM student_detail WHERE student_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $student_id);
            $stmt->execute();
            $result = $stmt->get_result();

            // Display the student details in a form for editing
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ?>
                <h2>Modify Student Details</h2>
                <form action="update_student.php" method="POST">
                    <input type="hidden" name="student_id" value="<?php echo $row['student_id']; ?>">
                    <div class="form-group">
                        <label for="student_name">Student Name:</label>
                        <input type="text" class="form-control" name="student_name" value="<?php echo isset($row['student_name']) ? $row['student_name'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="class">Class:</label>
                        <input type="text" class="form-control" name="class" value="<?php echo isset($row['class']) ? $row['class'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number:</label>
                        <input type="text" class="form-control" name="phone_number" value="<?php echo isset($row['phone_number']) ? $row['phone_number'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="due">Due:</label>
                        <input type="text" class="form-control" name="due" value="<?php echo isset($row['due']) ? $row['due'] : ''; ?>">
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-primary" value="Update">
                    </div>
                </form>
                <?php
            } else {
                echo "Student not found.";
            }

            $stmt->close();
            $conn->close();
        } else {
            echo "Please enter a valid student ID.";
        }
        ?>
    </div>
    <div style="text-align: center; padding-top: 50px;">
        <a href="javascript:history.go(-1)" style="padding: 10px 20px; margin-top: 20px; text-decoration: none; background-color: #007bff; color: #fff; border-radius: 5px;">Go Back</a>
    </div>
</body>
</html>
