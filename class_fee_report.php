<!DOCTYPE html>
<html>
<head>
    <title>Class Fee Report</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS for additional styling -->
    <style>

        @media print {
            input, button,.container,#filenameInput,#label_1,#download_csv,#go{
                display: none;
            }}

        body {
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .form-group {
    margin-bottom: 10px;
  }

  label {
    display: block;
    font-weight: bold;
  }

  .form-control {
    width: 90%;
    padding: 8px;
    border: 3px solid #ccc;
    border-radius: 4px;
  }
    </style>
</head>
<body>
    <div class="container" >
        <h2>Class Fee Report</h2>
        <form action="" method="POST" >
        <div class="form-group">
  <div>
    <label for="input_class">Enter Class:</label>
  </div>
  <div>
    <input type="text" class="form-control" name="input_class" required>
  </div>
</div>

<div class="form-group">
  <div>
    <label for="input_section">Enter Section:</label>
  </div>
  <div>
    <input type="text" class="form-control" name="input_section" required>
  </div>
</div>
<div class="text-center">
                <input type="submit" class="btn btn-primary" value="Generate Report">
            </div>
        </form>
     </div>
        <?php
        session_start();
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["input_class"])) {
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

            // Get the input class from the form
            $input_class = $_POST["input_class"];
            $input_section=$_POST["input_section"];
            
            // Fetch student details from the database based on the input class
            $query = "SELECT * FROM student_detail WHERE class = ? AND section = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ss", $input_class, $input_section);
            $stmt->execute();
            $result = $stmt->get_result();


            $query1 = "SELECT fee FROM fee_structure WHERE class = ? ";
            $stmt1 = $conn->prepare($query1);
            $stmt1->bind_param("s", $input_class); // Bind the input class value
            $stmt1->execute();
            $result1 = $stmt1->get_result();
            

            if ($result->num_rows > 0) {
                $fee_row = $result1->fetch_assoc();
            $fee = $fee_row['fee'];
                ?>
                <br>
               <h3>Due Details for Class: <?php echo $input_class; ?> </h3>
               <h3>Fee for Class <?php echo $input_class; ?>: <?php echo $fee; ?></h3>
                <table>
                    <tr>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        
                        <th>Phone Number</th>
                        <th>Admission Fee Paid </th>
                        <th>TC Fee Paid</th>
                        <th>Fee</th>
                        <th>Carry Forward</th>
                        <th>Fee Paid</th>
                        <th>Due Amount</th>
                    </tr>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row['student_id']; ?></td>
                            <td><?php echo $row['student_name']; ?></td>
                            <td><?php echo $row['phone_number']; ?></td>
                            <td><?php echo $row['admission_fee']; ?></td>
                            <td><?php echo $row['tc_fee']; ?></td>
                            <td><?php echo $row['fee']; ?></td>
                            <td><?php echo $row['pre_1st_year_due']; ?></td>
                            <td><?php echo $row['fee_paid']; ?></td>
                            <td><?php echo $row['due']; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                                    <!-- Download CSV button and filename input -->
                        <div>
                            <label for="filenameInput" id="label_1">Enter filename for CSV:</label>
                            <input type="text" id="filenameInput" placeholder="Enter filename.csv">
                            <button class="btn btn-primary" onclick="downloadCSV()" id="download_csv">Download CSV</button>
                        </div>
                </table>
                <button class="btn-secondary" onclick="print()">Print Report</button>
                <?php
            } else {
                echo "<h3 align='center'>No students found in Class: " . $input_class ."\t and Section: ". $input_section."</h3>";
            }

            
            $stmt->close();
            $conn->close();
        }
        ?>
        <div style="text-align: center; padding-top: 50px;">
          <button onclick="goBack()" style="padding: 10px 20px; margin-top: 20px; text-decoration: none; background-color: #007bff; color: #fff; border-radius: 5px;">Go Back</button>
        </div>
    
        <script>
            function goBack() {
      // Check if the user session variable is set and not empty
      // Replace 'user' with the actual name of your session variable
      var userType = '<?php echo isset($_SESSION['user']) ? $_SESSION['user'] : ""; ?>';

      // Perform redirection based on the user's type
      if (userType === 'admin') {
        window.location.href = 'admin.php';
      } else if (userType === 'accountant') {
        window.location.href = 'accountant.php';
      } else {
        // If the user type is not defined or doesn't match any case, redirect to a default page
        window.location.href = 'login.php';
      }
    }

        function downloadCSV() {
            // Get the table HTML element
            var table = document.querySelector("table");

            // Get the user-entered filename
            var filenameInput = document.getElementById("filenameInput");
            var filename = filenameInput.value.trim();

            // Validate the filename
            if (!filename) {
                alert("Please enter a valid filename.");
                return;
            }

            // Ensure the filename has the .csv extension
            if (!filename.endsWith(".csv")) {
                filename += ".csv";
            }

            // Create an empty array to store the rows
            var rows = [];

            // Loop through each row in the table
            for (var i = 0; i < table.rows.length; i++) {
                var row = [];
                var cells = table.rows[i].cells;

                // Loop through each cell in the row
                for (var j = 0; j < cells.length; j++) {
                    row.push(cells[j].innerText);
                }

                // Add the row to the array
                rows.push(row.join(","));
            }

            // Combine all rows into a single CSV string
            var csvContent = rows.join("\n");

            // Create a Blob object to hold the CSV data
            var blob = new Blob([csvContent], { type: "text/csv;charset=utf-8;" });

            // Create a temporary anchor element to trigger the download
            var link = document.createElement("a");
            link.href = URL.createObjectURL(blob);
            link.download = filename;
            link.style.display = "none";
            document.body.appendChild(link);

            // Trigger the download
            link.click();

            // Clean up
            document.body.removeChild(link);
        }
    
    </script> 


    

</body>
</html>
