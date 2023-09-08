<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS for increased font size */
        body {
            font-size: 18px;
        }
        
        /* Custom CSS for responsive padding */
        .container {
            padding: 20px;
        }
        
        /* Custom CSS for button margin */
        .btn-go-back {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $db = mysqli_connect('localhost','u322949535_eagleseye','EaglesEyeSolutions@2023*','u322949535_tbhs');
            $student_id = $_POST['student_id'];
            $student_name = $_POST['student_name'];
            $year = $_POST['year'];
            $section = $_POST['section'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $dob = $_POST['dob'];
            $Student_Aadhar = $_POST['Student_Aadhar'];
            $government = $_POST['government'];
            $father_aadhar = $_POST['father_aadhar'];
            $mother_aadhar = $_POST['mother_aadhar'];
            $caste = $_POST['caste'];
            $subcaste = $_POST['subcaste'];
            $alterphone = $_POST['alterphone'];
            
            // Update student details in the database
            $query = "UPDATE student_personal SET 
                      student_name = '$student_name', 
                      year = '$year', 
                      section = '$section', 
                      phone = '$phone', 
                      address = '$address', 
                      dob = '$dob', 
                      Student_Aadhar = '$Student_Aadhar', 
                      government = '$government', 
                      father_aadhar = '$father_aadhar', 
                      mother_aadhar = '$mother_aadhar', 
                      caste = '$caste', 
                      subcaste = '$subcaste', 
                      alterphone = '$alterphone'
                      -- Include other columns here
                      WHERE student_id = $student_id";
            
            if (mysqli_query($db, $query)) {
                echo '<div class="alert alert-success" role="alert">
                      Student details updated successfully.
                      </div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">
                      Error updating student details: ' . mysqli_error($db) . '
                      </div>';
            }

            // Close the database connection
            mysqli_close($db);
        }
        ?>
        <a href="editpersonal.php?id=<?php echo $student_id; ?>" class="btn btn-secondary btn-go-back">Go Back</a>
    </div>

    <!-- Include Bootstrap JS (Optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
