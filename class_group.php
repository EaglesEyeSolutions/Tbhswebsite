<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Class and Section Fee Summary</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <h1>Class and Section Fee Summary</h1>

    <?php
$servername = "localhost";
$username = "u322949535_eagleseye";
$password = "EaglesEyeSolutions@2023*";
$dbname = "u322949535_tbhs";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT class, section, SUM(fee_paid) AS total_fee_paid, sum(fee) as feee, SUM(due) AS due_amount 
              FROM student_detail 
              GROUP BY class, section
              ORDER BY due_amount DESC";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>Class</th><th>Section</th><th>Total Fee Paid</th><th>Fee</th><th>Due Amount</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["class"] . "</td>";
            echo "<td>" . $row["section"] . "</td>";
            echo "<td>" . $row["total_fee_paid"] . "</td>";
            echo "<td>" . $row["feee"] . "</td>";
            echo "<td>" . $row["due_amount"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No records found.";
    }

    mysqli_close($conn);

    function redirectToPage($page) {
        echo "<script>window.location.href = '$page';</script>";
        exit(); // Stop further script execution
    }

    if (isset($_POST['goBackButton'])) {
     
        $userType = $_SESSION["user"];
        echo $userType;

        if ($userType == "admin") {
            redirectToPage("admin.php");
        } else if ($userType == "accountant") {
            redirectToPage("accountant.php");
        }
   
    else{
      redirectToPage("login.html"); // If the conditions above aren't met, or if session user is not set, redirect to login
      //redirectToPage("accountant.php");}
    }
    
}
?>

<form method="post">
      <button type="submit" name="goBackButton">Go Back</button>
  </form>

</body>
</html>
