<!DOCTYPE html>
<html>
<head>
  <title>Month Transactions</title>
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

    .sum {
      text-align: right;
      margin-right: 20px;
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

      .sum {
        margin-right: 0;
      }

      .title1 {
        font-size: 18px;
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
    $dt1 = $_GET['month'];
    $dt2 = $_GET['year'];
    $sql = "SELECT * FROM trans WHERE MONTH(dates) = ? AND YEAR(dates) = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $dt1, $dt2);
    $stmt->execute();
    $result = $stmt->get_result();
    $i=1;
    if ($result->num_rows > 0) {
        echo "<div class='title'><h1>The Briliants English Medium High School</h1></div>";
        echo "<div class='title'><h1>Transaction Details</h1></div>";
        echo "<div style='text-align:center'><h3>Month: " . $dt1 . " - Year: " . $dt2 . "</h3></div>";
        echo "<div style='text-align:center;margin-top:-20px'><h3>Address: Vijayawada</h3></div>";
        echo "<div class='table-container'>";
        echo "<table>";
        echo "<tr>";
        echo "<th>S.NO</th>";
        echo "<th>Student_ID</th>";
        echo "<th>StudentName</th>";
        echo "<th>Transaction_ID</th>";
        echo "<th>Date of Transaction</th>";
        echo "<th >Payment Method</th>";
        echo "<th >UTR/CHECK Number</th>";
        echo "<th>Amount</th>";
        echo "</tr>";
        while ($row = $result->fetch_assoc()) {
                      $studentId = $row['student_id'];
                      $studentNameQuery = "SELECT student_name, class FROM student_detail WHERE student_id='$studentId'";
                      $studentNameResult = $conn->query($studentNameQuery);

                      if ($studentNameResult->num_rows > 0) {
                          $studentNameData = $studentNameResult->fetch_assoc();
                          $studentName = $studentNameData['student_name'];
                          $class = $studentNameData['class'];
                      } else {
                          $studentName = 'N/A';
                          $class = 'N/A';
                      }
            echo "<tr>";
            echo "<td>" . $i . "</td>";
            echo "<td>" . $row['student_id'] . "</td>";
            echo "<td>" . $studentName . "</td>";
            echo "<td>" . $row['trans_id'] . "</td>";
            echo "<td>" . $row['dates'] . "</td>";
            echo "<td >".$row['payment_method']."</td>";
            echo "<td >".$row['UTRrCHECK_Number']."</td>";
            echo "<td>" . $row['amount'] . "</td>";
            echo "</tr>";
            $i++;
        }
        echo "</table>";
        echo "</div>";
        $sql = "SELECT SUM(CAST(amount AS integer)) AS sum1 FROM trans WHERE MONTH(dates) = ? AND YEAR(dates) = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $dt1, $dt2);
        $stmt->execute();
        $sumResult = $stmt->get_result();
        $row = $sumResult->fetch_assoc();
        $totalAmount = $row['sum1'] ?? 0;
        echo "<div class='sum'><h3>Total-Amount: " . $totalAmount . "</h3></div>";
        echo "<div class='btn-container'>";
        echo "<button onclick='history.go(-2)' class='noprint'>Go Back</button>";
        echo "<button onclick='print()' class='noprint'>Print</button>";
        echo "</div>";
    } else {
        echo "<div class='title1' style='text-align: center;'><h1>No Transactions In Selected Month & Year</h1></div>";
    }
}
$conn->close();
?>

</body>
</html>
