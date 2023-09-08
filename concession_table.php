<!DOCTYPE html>
<html>
<head>
    <title>Concession Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        /* Responsive styles */
        @media screen and (max-width: 600px) {
            th, td {
                font-size: 12px;
            }
        }

        @media screen and (max-width: 400px) {
            th, td {
                font-size: 10px;
            }
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Concession Table</h1>
    <div style="overflow-x: auto;">
        <table>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Class</th>
                <th>Fee Exemption</th>
                <th>Comment</th>
                <th>Status</th>
            </tr>

            <?php
            // Replace your_username, your_password with your actual credentials
            $host= "localhost";
            $username = "u322949535_eagleseye";
            $password = "EaglesEyeSolutions@2023*";
            $dbname = "u322949535_tbhs";

            try {
                $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $pdo->query("SELECT * FROM concession where is_new='0' ");

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>{$row['student_id']}</td>";
                    echo "<td>{$row['student_name']}</td>";
                    echo "<td>{$row['class']}</td>";
                    echo "<td>{$row['fee_ex']}</td>";
                    echo "<td>{$row['comment']}</td>";
                    echo "<td>{$row['status']}</td>";
                    echo "</tr>";
                }
            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }
            ?>
        </table>
    </div>

    <div style="text-align: center; padding-top: 50px;">
        <a href="javascript:history.go(-1)" style="padding: 10px 20px; margin-top: 20px; text-decoration: none; background-color: #007bff; color: #fff; border-radius: 5px;">Go Back</a>
    </div>
</body>
</html>
