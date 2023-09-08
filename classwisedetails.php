<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Student Details</h2>
    <form method="post" class="mb-3">
        <div class="form-row">
            <div class="col-md-3">
                <label for="class">Class:</label>
                <input type="text" name="class" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="section">Section:</label>
                <input type="text" name="section" class="form-control" required>
            </div>
            <div class="col-md-3 mt-4">
                <button type="submit" name="show_details" class="btn btn-primary">Show Details</button>
            </div>
        </div>
    </form>

    <?php
    $servername = "localhost";
    $username = "u322949535_eagleseye";
    $password = "EaglesEyeSolutions@2023*";
    $dbname = "u322949535_tbhs";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['show_details'])) {
        $class = $_POST['class'];
        $section = $_POST['section'];

        $query = "SELECT * FROM student_personal WHERE year = '$class' AND section = '$section'";
        $result = $conn->query($query);
        
        $totalCount = $result->num_rows;

        if ($totalCount > 0) {
            echo '<div class="table-responsive">';
            echo '<h4>Class: ' . $class . ', Section: ' . $section . '</h4>';
            echo '<p>Total Students: ' . $totalCount . '</p>';
            echo '<table class="table">';
            echo '<tr><th>Student ID</th><th>Student Name</th><th>Year</th><th>Section</th><th>Phone</th></tr>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['student_id'] . '</td>';
                echo '<td>' . $row['student_name'] . '</td>';
                echo '<td>' . $row['year'] . '</td>';
                echo '<td>' . $row['section'] . '</td>';
                echo '<td>' . $row['phone'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
            echo '</div>';
        } else {
            echo '<p>No students found for the given class and section.</p>';
        }
    }

    $conn->close();
    ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
