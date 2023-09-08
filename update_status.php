<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

$servername = "localhost";
$username = "u322949535_eagleseye";
$password = "EaglesEyeSolutions@2023*";
$dbname = "u322949535_tbhs";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_POST["id"];
    $newStatus = $_POST["status"];

    // Update the status in the concession table where student_name matches and is_new is 1
    $updateQuery = "UPDATE concession SET status='$newStatus', is_new='0' WHERE student_name='$id' AND is_new='1'";

    if ($conn->query($updateQuery) === TRUE) {
        echo "Status updated successfully!";


        if ($newStatus==='Accept'){
        
        // Retrieve the fee_ex from the concession table based on the given student_id and status 'Accept'
        $feeExQuery = "SELECT fee_ex, student_id FROM concession WHERE student_name = '$id' AND status='Accept' ORDER BY timestamp DESC LIMIT 1";

        $feeExResult = $conn->query($feeExQuery);

        if ($feeExResult->num_rows > 0) {
            $row = $feeExResult->fetch_assoc();
            $feeEx = (int) $row['fee_ex']; // Convert to integer
            $studentId = $row['student_id'];

            // Update the due in the student_detail table by subtracting the fee_ex
            $updateDueQuery = "UPDATE student_detail SET due = due - $feeEx WHERE student_id = $studentId";

            if ($conn->query($updateDueQuery) === TRUE) {
                echo "Fee_ex: $feeEx retrieved from concession table and due updated successfully for student ID: $studentId";
            } else {
                echo "Error updating due for student ID: $studentId";
            }
        } else {
            echo "No records found in the concession table with status 'Accept' for student ID: $id";
        }}
    } else {
        echo "Error updating status: " . $conn->error;
    }

    $conn->close();
}
?>
