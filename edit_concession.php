<!DOCTYPE html>
<html>
<head>
  <title>Edit Concession Status</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
      padding: 20px;
    }

    h1 {
      text-align: center;
    }

    form {
      max-width: 400px;
      margin: 0 auto;
    }

    label {
      display: block;
      margin-bottom: 8px;
    }

    input[type="text"], select, input[type="submit"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type="submit"] {
      background-color: #007bff;
      color: white;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }

    .back-button {
      text-align: center;
      margin-top: 20px;
    }

    .back-button a {
      display: inline-block;
      padding: 10px 20px;
      text-decoration: none;
      background-color: #007bff;
      color: #fff;
      border-radius: 5px;
    }

    .back-button a:hover {
      background-color: #0056b3;
    }
    .center-align {
  text-align: center;
}

  </style>
</head>
<body>
  <h1>Edit Concession Status</h1>
  <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
      $servername = "localhost";
        $username = "u322949535_eagleseye";
        $password = "EaglesEyeSolutions@2023*";
        $dbname = "u322949535_tbhs";
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $id = $_POST["id"];
      $newStatus = $_POST["status"];
      $newFeeExemption = $_POST["fee_exemption"];

      // Update the status and fee_exemption in the concession table where student_id matches and is_new is 1
      $updateQuery = "UPDATE concession SET status='$newStatus', fee_ex='$newFeeExemption', is_new='0' WHERE student_id='$id' AND is_new='1'";

      if ($conn->query($updateQuery) === TRUE) {
        echo "Status and Fee Exemption updated successfully!";
      } else {
        echo "Error updating status and fee exemption: " . $conn->error;
      }

      $conn->close();
      header("Location: concessions.php");
    } 
    
    elseif ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])) {
        $servername = "localhost";
        $username = "u322949535_eagleseye";
        $password = "EaglesEyeSolutions@2023*";
        $dbname = "u322949535_tbhs";
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $id = $_GET["id"];

      // Retrieve concession details for the given student_id
      $concessionQuery = "SELECT * FROM concession WHERE student_id='$id' AND is_new='1'";
      $concessionResult = $conn->query($concessionQuery);
      if ($concessionResult->num_rows > 0) {
        $concessionRow = $concessionResult->fetch_assoc();
        $studentName = $concessionRow["student_name"];
        $class = $concessionRow["class"];
        $feeExemption = $concessionRow["fee_ex"];
        $comment = $concessionRow["comment"];
        $status = $concessionRow["status"];
      } else {
        echo "No concession found for the given student ID: " . $id;
        exit;
      }

      $conn->close();
    } else {
      echo "Invalid request.";
      exit;
    }
  ?>

  <!-- Display other concession details -->
  <div class="center-align">
  <p>Student Name: <?php if(isset($studentName)) echo $studentName; ?></p>
  <p>Class: <?php if(isset($class)) echo $class; ?></p>
</div>


  <!-- Editable Fee Exemption text box -->
  <form method="post">
    <label for="fee_exemption">Fee Exemption:</label>
    <input type="text" id="fee_exemption" name="fee_exemption" value="<?php if(isset($feeExemption)) echo $feeExemption; ?>"><br>

    <label for="status">Select Status:</label>
    <select id="status" name="status">
      <option value="Accept" <?php if(isset($status) && $status === "Accept") echo "selected"; ?>>Accept</option>
      <option value="Reject" <?php if(isset($status) && $status === "Reject") echo "selected"; ?>>Reject</option>
    </select>
    <input type="hidden" name="id" value="<?php if(isset($id)) echo $id; ?>">
    <input type="submit" value="Update Status and Fee Exemption">
  </form>

  <div class="back-button">
    <a href="concessions.php">Go Back</a>
  </div>
</body>
</html>
