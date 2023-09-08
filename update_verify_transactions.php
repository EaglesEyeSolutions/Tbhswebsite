<?php
session_start();
?>
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

    select, input[type="submit"] {
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

    /* Center-align details */
    .details {
      text-align: center;
      margin-bottom: 20px;
    }
    .promotional-alert {
    background-color: #007bff;
    color: white;
    text-align: center;
    padding: 10px;
}
  </style>
</head>
<body>
  <h1>Edit Concession Status</h1>
  <?php
    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])) {


     
     
$servername = "localhost";
$username = "u322949535_eagleseye";
$password = "EaglesEyeSolutions@2023*";
$dbname = "u322949535_tbhs";
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
        echo "No matching transaction found for the given ID: " . $id . "<br>";

        die("Connection failed: " . $conn->connect_error);
      }
     
      $id = $_GET["id"];

      // Retrieve concession details for the given student_id
      $concessionQuery = "SELECT * FROM trans WHERE trans_id='$id' ";
      $Result = $conn->query($concessionQuery);
      if ($Result->num_rows > 0) {


        $Row = $Result->fetch_assoc();
        $dates = $Row["dates"];
        $class = $Row["year"];
        $UTRrCHECK_Number = $Row["UTRrCHECK_Number"];
        $amount = $Row["amount"];
        $verified = $Row["verified"];
      } 
      
      
      else {
        echo "No concession found for the given student ID: " . $id;
        exit;
      }

      $conn->close();
    }
    else if ($_SERVER["REQUEST_METHOD"] === "POST") {
      // Check if the updateStatus button is clicked
      if (isset($_POST["updateStatus"])) {
        $verifiedStatus = $_POST["verified"];
        $transactionID = $_POST["id"];
    
        $servername = "localhost";
$username = "id21063604_eaglesuser";
$password = "+Wb7%OtnX!92ZNJq";
$dbname = "id21063604_eagleseyesolution";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
    
        // Update the 'verified' field in the database
        $updateQuery = "UPDATE trans SET verified='$verifiedStatus' WHERE trans_id='$transactionID'";
        if ($conn->query($updateQuery) === TRUE) {
        $promotionalMessage = "Status Updated successfully!!";
        echo "<div class='promotional-alert'>";
           echo $promotionalMessage; 
        echo "</div>";

        } else {
          echo "Error updating status: " . $conn->error;
        }
    
        $conn->close();
      }
    }
    
    
    else {
      echo "Invalid request.".$_GET['id'];
      exit;
    }
    
  ?>

  <!-- Center-aligned details -->
  <div class="details">
  <p>Transaction id: <?php if(isset($id)) echo $id; ?></p>
  <p>Class: <?php if(isset($class)) echo $class; ?></p>
  <p>UTR/CHECK Number: <?php if(isset($UTRrCHECK_Number)) echo $UTRrCHECK_Number; ?></p>
  <p>Amount: <?php if(isset($amount)) echo $amount; ?></p>
</div>

<!-- Editable Fee Exemption text box -->
<form method="post">
  <label for="verified">Select Status:</label>
  <select id="verified" name="verified">
    <option value="ACCEPT">Accept</option>
    <option value="REJECTED">Reject</option>
  </select>
  <input type="hidden" name="id" value="<?php if(isset($id)) echo $id; ?>">
  <input type="hidden" name="transaction_id" value="<?php if(isset($id)) echo $id; ?>"> <!-- Add a hidden input field for transaction ID -->
  <input type="submit" name="updateStatus" value="Update Status">
</form>




    

  <div class="back-button">
    <a href="verify_transactions.php">Go Back</a>
  </div>
</body>
</html>
