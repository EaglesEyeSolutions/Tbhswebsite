<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Un-Verified Transactions</title>
  <style>
    /* Common styles for all screen sizes */
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      border: 1px solid black;
      padding: 8px;
      text-align: center;
    }

    th {
      background-color: #f2f2f2;
    }

    .editable {
      cursor: pointer;
    }

    .status-modal {
      position: absolute;
      z-index: 2;
      background-color: #fefefe;
      padding: 20px;
      border: 1px solid #888;
    }

    .status-modal button {
      margin-top: 10px;
    }

    /* Responsive styles for smaller screens */
    @media only screen and (max-width: 768px) {
      table {
        font-size: 12px;
      }

      th, td {
        padding: 6px;
      }

      .status-modal {
        width: 90%;
        left: 5%;
        right: 5%;
        top: 30%;
        transform: translateY(-50%);
      }
    }
  </style>
</head>
<body>
  <h1>Un-Verified Transactions</h1>
  <?php
$servername = "localhost";
$username = "u322949535_eagleseye";
$password = "EaglesEyeSolutions@2023*";
$dbname = "u322949535_tbhs";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $query = "SELECT * FROM trans where verified='NO' ";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
      echo "<div style='overflow-x:auto;'>";
      echo "<table>";
      echo "<tr><th>Transaction ID</th><th>Class</th><th>Student ID</th><th>Payment Method</th><th>Amount</th><th>UTR/CHECK Number</th><th>Status</th><th>Verified</th></tr>";
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["trans_id"] . "</td>";
        echo "<td>" . $row["year"] . "</td>";
        echo "<td>" . $row["student_id"] . "</td>";
        echo "<td>" . $row["payment_method"] . "</td>";
        echo "<td>" . $row["amount"] . "</td>";
        echo "<td>" . $row["UTRrCHECK_Number"] . "</td>";
        echo "<td class='status-cell' data-id='" . $row["student_id"] . "'>" . $row["verified"] . "</td>";
        echo '<td><a class="button" href="update_verify_transactions.php?id=' . $row['trans_id'] . '">Edit</a></td>';
        echo "</tr>";
      }
      echo "</table>";
      echo "</div>";
    } else {
      echo "No concessions found.";
    }
    mysqli_close($conn);

    function redirectToPage($page) {
      echo "<script>window.location.href = '$page';</script>";
      exit(); // Stop further script execution
  }
  
  // Call the function when the button is clicked
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