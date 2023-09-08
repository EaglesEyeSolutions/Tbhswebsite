<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Fee Structure</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #cccccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            margin-top: 10px;
            background-color: #0066cc;
            color: #ffffff;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0052a3;
        }
        a {
            color: #0066cc;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST")  {
            // Get data from the form
            $class = $_POST['class'];
            $fee = $_POST['fee'];
    
    
    
           
            if (! isset ( $_SESSION ['user'] ) || $_SESSION ['user'] == false)
            {
                header ( "Location: home.html" );
                exit ();
            } 
            $servername = "localhost";
$username = "u322949535_eagleseye";
$password = "EaglesEyeSolutions@2023*";
$dbname = "u322949535_tbhs";
            $conn = new mysqli($servername, $username, $password, $dbname);
    
            // Check connection
            if (mysqli_connect_errno()) {
                die("Connection failed: " . mysqli_connect_error());
            }
    
            // Update data in the fee_structure table
            $query = "UPDATE fee_structure SET fee='$fee' WHERE class='$class'";
            $result = mysqli_query($conn, $query);
    
            if ($result) {
                echo "Fee structure updated successfully!";
            } else {
                echo "Error updating fee structure: " . mysqli_error($conn);
            }
    
            mysqli_close($conn);
        } else {
            // Get the class from the URL parameter
            if (isset($_GET['id'])) {
                $class = $_GET['id'];
    
                // Retrieve existing fee from the database
           $servername = "localhost";
$username = "u322949535_eagleseye";
$password = "EaglesEyeSolutions@2023*";
$dbname = "u322949535_tbhs";
            $conn = new mysqli($servername, $username, $password, $dbname);
                $conn = mysqli_connect($servername, $username, $password, $dbname);
    
                if (mysqli_connect_errno()) {
                    die("Connection failed: " . mysqli_connect_error());
                }
    
                $query = "SELECT fee FROM fee_structure WHERE class='$class'";
                $result = mysqli_query($conn, $query);
    
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);
                    $fee = $row['fee'];
                } else {
                    echo "Class not found!";
                    exit();
                }
    
                mysqli_close($conn);
            } else {
                echo "Class not specified!";
                exit();
            }
        }
        ?>
    

        <h2>Edit Fee for Class <?php echo $class; ?></h2>
        <form method="post">
            <label for="fee">Fee:</label>
            <input type="number" step="0.01" min="0" name="fee" id="fee" value="<?php echo $fee; ?>" required>
            <input type="hidden" name="class" value="<?php echo $class; ?>">
            <input type="submit" value="Update">
            <br>
            <br>
            
        </form>
    </div>
    <div style="text-align: center; padding-top: 50px;">
        <a href="javascript:history.go(-1)" style="padding: 10px 20px; margin-top: 20px; text-decoration: none; background-color: #007bff; color: #fff; border-radius: 5px;">Go Back</a>
    </div>
</body>
</html>
