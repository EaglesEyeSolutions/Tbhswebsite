<?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the form data
        $student_id = $_POST["student_id"];
        $student_name = $_POST["student_name"];
        $class = $_POST["class"];
        $phone_number = $_POST["phone_number"];
        $dob = $_POST["date_of_birth"];
        $sec= $_POST["section"];

        // Your database connection credentials 
        $host = "localhost";
        $username = "u322949535_eagleseye";
        $password = "EaglesEyeSolutions@2023*";
        $dbname = "u322949535_tbhs";

        // Create a connection to the database
        $conn = new mysqli($host, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if the student_id already exists in the database
        $check_query = "SELECT * FROM student_detail WHERE student_id = '$student_id'";
        $result = $conn->query($check_query);

        if ($result->num_rows > 0) {
            echo "Error: Student ID already exists in the database.";
        } else {
            // Prepare and execute the SQL query to insert data into the table
            $sql = "INSERT INTO student_detail (student_id, student_name, class, phone_number, date_of_birth,section)
                    VALUES ('$student_id', '$student_name', '$class', '$phone_number', '$dob','$sec')";

            if ($conn->query($sql) === TRUE) {
                echo "Student details added successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        

        // Close the database connection
        $conn->close();
    }
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.css">

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
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .datepicker {
      width: 100%;
      box-sizing: border-box;
    }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
        }

        /* Responsive Styles */
        @media (max-width: 600px) {
            form {
                max-width: 100%;
            }

            input[type="text"] {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <h2>Student Registration Form</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="student_id">Student ID:</label>
        <input type="text" name="student_id" required>

        <label for="student_name">Student Name:</label>
        <input type="text" name="student_name" required>

        <label for="class">Class:</label>
        <input type="text" name="class" required>

        <label for="section">Select a section:<select id="section"name="section">
                <option value="A">A</option>
                <option value="B">B</option>
            </select></label>
            
            

        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" required>

        <label for="date_of_birth">Date of Birth:</label>
    <input type="text" id="date_of_birth" name="date_of_birth" required class="datepicker">

        <input type="submit" value="Submit" style="padding: 10px 20px; margin-top: 20px; text-decoration: none; background-color: #007bff; color: #fff; border-radius: 5px;">
    </form>

    

<div style="text-align: center; padding-top: 50px;">
        <a href="admin.php" style="padding: 10px 20px; margin-top: 20px; text-decoration: none; background-color: #007bff; color: #fff; border-radius: 5px;">Go Back</a>
    </div>

        
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.js"></script>
        <script>
    flatpickr(".datepicker", {
      dateFormat: "Y/m/d",
    });
    </script>

</body>
</html>
