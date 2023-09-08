<?php
$servername = "localhost";
$username = "u322949535_eagleseye";
$password = "EaglesEyeSolutions@2023*";
$dbname = "u322949535_tbhs";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the student ID from the URL parameter
$student_id = $_GET['id'];

// Retrieve student details from the database
$query = "SELECT * FROM student_personal WHERE student_id = $student_id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Student Details</h1>
        <form action="update_student_personal.php" method="post">
            <input type="hidden" name="student_id" value="<?php echo $row['student_id']; ?>">
            
            <div class="form-group">
                <label for="student_name">Name:</label>
                <input type="text" class="form-control" id="student_name" name="student_name" value="<?php echo $row['student_name']; ?>">
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="year">Year:</label>
                    <input type="text" class="form-control" id="year" name="year" value="<?php echo $row['year']; ?>">
                </div>
                
                <div class="form-group col-md-6">
                    <label for="section">Section:</label>
                    <input type="text" class="form-control" id="section" name="section" value="<?php echo $row['section']; ?>">
                </div>
            </div>
            
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['phone']; ?>">
            </div>
            
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address']; ?>">
            </div>
            
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="text" class="form-control" id="dob" name="dob" value="<?php echo $row['dob']; ?>">
            </div>
            
            <div class="form-group">
                <label for="Student_Aadhar">Student Aadhar:</label>
                <input type="text" class="form-control" id="Student_Aadhar" name="Student_Aadhar" value="<?php echo $row['Student_Aadhar']; ?>">
            </div>
            
            <div class="form-group">
                <label for="government">Government:</label>
                <input type="text" class="form-control" id="government" name="government" value="<?php echo $row['government']; ?>">
            </div>
            
            <div class="form-group">
                <label for="father_aadhar">Father's Aadhar:</label>
                <input type="text" class="form-control" id="father_aadhar" name="father_aadhar" value="<?php echo $row['father_aadhar']; ?>">
            </div>
            
            <div class="form-group">
                <label for="mother_aadhar">Mother's Aadhar:</label>
                <input type="text" class="form-control" id="mother_aadhar" name="mother_aadhar" value="<?php echo $row['mother_aadhar']; ?>">
            </div>
            
            <div class="form-group">
                <label for="caste">Caste:</label>
                <input type="text" class="form-control" id="caste" name="caste" value="<?php echo $row['caste']; ?>">
            </div>
            
            <div class="form-group">
                <label for="subcaste">Subcaste:</label>
                <input type="text" class="form-control" id="subcaste" name="subcaste" value="<?php echo $row['subcaste']; ?>">
            </div>
            
            <div class="form-group">
                <label for="alterphone">Alternate Phone:</label>
                <input type="text" class="form-control" id="alterphone" name="alterphone" value="<?php echo $row['alterphone']; ?>">
            </div>
            
            <!-- Continue adding similar form fields for other columns -->
            
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>

    <!-- Include Bootstrap JS (Optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

