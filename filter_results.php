<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["input_class"]) && isset($_POST["input_section"]) && isset($_POST["filter_amount_range"])) {
    // Database connection parameters
   $servername = "localhost";
            $username = "u322949535_eagleseye";
            $password = "EaglesEyeSolutions@2023*";
            $dbname = "u322949535_tbhs";

    // Get the input class, section, and filter range from the AJAX request
    $input_class = $_POST["input_class"];
    $input_section = $_POST["input_section"];
    $filter_amount_range = $_POST["filter_amount_range"];

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL query with the filter
    $query = "SELECT * FROM student_detail WHERE class = ? AND section = ? AND fee_paid <= ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $input_class, $input_section, $filter_amount_range);

    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo '<div class="container">';
        echo '<table>';
        echo '<tr><th>Student ID</th><th>Student Name</th><th>Phone Number</th><th>Fee</th><th>Fee Paid</th><th>Due Amount</th></tr>';
        
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['student_id'] . '</td>';
            echo '<td>' . $row['student_name'] . '</td>';
            echo '<td>' . $row['phone_number'] . '</td>';
            echo '<td>' . $row['fee'] . '</td>';
            echo '<td>' . $row['fee_paid'] . '</td>';
            echo '<td>' . $row['due'] . '</td>';
            echo '</tr>';
        }
        
        echo '</table>';
        echo '</div>';
    } else {
        echo '<p>No records found for the given class, section, and fee amount range.</p>';
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
