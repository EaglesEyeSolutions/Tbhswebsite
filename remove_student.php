<!DOCTYPE html>
<html>
<head>
    <title>Remove Student Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
        }

        h2 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .message {
            margin-top: 20px;
            text-align: center;
        }

        /* Responsive Styles */
        @media (max-width: 600px) {
            form {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <h2>Remove Student Details</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="student_id">Enter Student ID:</label>
        <input type="text" name="student_id" required>
        <input type="submit" value="Remove" style="padding: 10px 20px; margin-top: 10px; text-decoration: none; background-color: #007bff; color: #fff; border-radius: 5px;">
    </form>

    <?php
    
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the student_id from the form
        $student_id = $_POST["student_id"];

        // Your database connection credentials
    $servername = "localhost";
$username = "u322949535_eagleseye";
$password = "EaglesEyeSolutions@2023*";
$dbname = "u322949535_tbhs";

        // Create a connection to the database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if any dues are present for the student
        $due_query = "SELECT due FROM student_detail WHERE student_id = '$student_id'";
        $result = $conn->query($due_query);

        echo '<div style="text-align: center;">';

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $dueAmount = $row["due"];
            
            echo "Dues present for this student: " . $dueAmount ."/-". "<br>";
            echo "<br>"."Are you sure you want to remove the student? ";
            
            echo '<form action="' . $_SERVER['PHP_SELF'] . '" method="post">';
            echo '<input type="hidden" name="student_id" value="' . $student_id . '">';
            echo '<input type="submit" name="confirm" value="Yes">';
            echo'<br>';
            echo '<input type="submit" name="cancel" value="No">';
            echo '</form>';
            
        } else {
            echo "No dues found for the student.<br>";
            echo "Are you sure you want to remove the student? ";
            echo '<form action="' . $_SERVER['PHP_SELF'] . '" method="post">';
            echo '<input type="hidden" name="student_id" value="' . $student_id . '">';
            echo '<input type="submit" name="confirm" value="Yes">';
            
            echo '<input type="submit" name="cancel" value="No">';
            echo '</form>';
        }

        // Handle the user's confirmation or cancellation
        if (isset($_POST['confirm'])) {
            // Prepare and execute the SQL query to remove the student details
            $sql = "DELETE FROM student_detail WHERE student_id = '$student_id'";

            if ($conn->query($sql) === TRUE) {
                echo "Student details removed successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } elseif (isset($_POST['cancel'])) {
            echo "Removal canceled.";
        }

        echo '</div>';

        // Close the database connection
        $conn->close();
    }
    ?>

<div style="text-align: center; padding-top: 50px;">
        <a href="javascript:history.go(-1)" style="padding: 10px 20px; margin-top: 20px; text-decoration: none; background-color: #007bff; color: #fff; border-radius: 5px;">Go Back</a>
    </div>

</body>
</html>
