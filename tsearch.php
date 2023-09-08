<!DOCTYPE html>
<html>
<head>
  <title>Today Transactions</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    @media print {
      .noprint {
        visibility: hidden;
      }
    }

    .title {
      text-align: center;
      margin: 20px;
    }

    .table-container {
      margin: 0 auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    .btn-container {
      text-align: center;
      margin-top: 20px;
    }

    .btn-container button {
      margin: 5px;
      padding: 10px 20px;
    }

    @media (max-width: 768px) {
      table {
        font-size: 12px;
      }
    }
  </style>
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user'] == false) {
    header("Location: home.html");
    exit();
}
$servername = "localhost";
$username = "u322949535_eagleseye";
$password = "EaglesEyeSolutions@2023*";
$dbname = "u322949535_tbhs";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $sid = $_GET['student_id'];
    $sql = "select * from trans where student_id='$sid'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<div class='title'><h1>Andhra Loyola Institute Of Engineering And Technology</h1></div>";
        echo "<div class='title'><h1>Transaction Details</h1></div>";
        echo "<div style='text-align:center'><h3>Student Id: " . $sid . "</h3></div>";
        echo "<div style='text-align:center;margin-top:-20px'><h3>Address: Vijayawada</h3></div>";
        echo "<div class='table-container'>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Date</th>";
        echo "<th>Transaction_Id</th>";
        echo "<th>Class</th>";
        echo "<th>PaymentMethod-FeeType</th>";
        echo "<th>Verified</th>";
        echo "<th>Amount</th>";
        echo "</tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['dates'] . "</td>";
            echo "<td>" . $row['trans_id'] . "</td>";
            echo "<td>" . $row['year'] . "</td>";
            echo "<td>" . $row['payment_method'] . "</td>";
            echo "<td>" . $row['verified'] . "</td>";
            echo "<td>" . $row['amount'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        echo "<div class='btn-container'>";
        echo "<button onclick='history.go(-2)' class='noprint'>Go Back</button>";
        echo "<button onclick='print()' class='noprint'>Print</button>";
        echo "</div>";
    }
}
$conn->close();
?>
</body>
</html>
