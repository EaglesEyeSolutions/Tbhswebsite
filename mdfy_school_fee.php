<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Fee Structure Modification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            border-collapse: collapse;
            width: 60%;
            margin: 20px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        a {
            color: #0066cc;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .button {
            display: inline-block;
            background-color: #0066cc;
            color: #ffffff;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #0052a3;
        }
        .container {
            width: 100%;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Fee Structure</h2>
        <table>
            <tr>
                <th>Class</th>
                <th>Fee</th>
                <th>Modify</th>
            </tr>
            <?php
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

            // Fetch data from the fee_structure table
            $query = "SELECT * FROM fee_structure";
            $result = mysqli_query($conn, $query);

            // Display data in the table
            while ($row = mysqli_fetch_assoc($result)) {
                if($row['class']=='-1'){
                echo "<tr>";
                echo "<td>UKG</td>";
                echo "<td>" . $row['fee'] . "</td>";
                echo '<td><a class="button" href="school_fee_edit.php?id=' . $row['class'] . '">Edit</a></td>';
                echo "</tr>";
                }
                elseif($row['class']=='-2'){
                echo "<tr>";
                echo "<td>LKG</td>";
                echo "<td>" . $row['fee'] . "</td>";
                echo '<td><a class="button" href="school_fee_edit.php?id=' . $row['class'] . '">Edit</a></td>';
                echo "</tr>";
                }
                else{
                echo "<tr>";
                echo "<td>" . $row['class'] . "</td>";
                echo "<td>" . $row['fee'] . "</td>";
                echo '<td><a class="button" href="school_fee_edit.php?id=' . $row['class'] . '">Edit</a></td>';
                echo "</tr>";
                }
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </table>
        
    </div>
    <div style="text-align: center; padding-top: 50px;">
        <a href="javascript:history.go(-1)" style="padding: 10px 20px; margin-top: 20px; text-decoration: none; background-color: #007bff; color: #fff; border-radius: 5px;">Go Back</a>
    </div>
</body>
</html>
