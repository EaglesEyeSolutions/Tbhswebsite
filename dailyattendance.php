<?php
session_start();
  if (!isset($_SESSION['user']) || $_SESSION['user'] == false) {
    header("Location: home.html");
    exit();
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Attendance</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
    }
    .container {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }
    .title {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .input-box {
      margin-bottom: 15px;
    }
    label {
      display: block;
      margin-bottom: 5px;
    }
    select, input[type="text"] {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }
    .button {
      text-align: center;
    }
    input[type="submit"] {
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #0056b3;
    }
    input[type="button"] {
      padding: 5px 10px;
      background-color: transparent;
      color: #007bff;
      border: none;
      font-size: 14px;
      cursor: pointer;
    }
    input[type="button"]:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="title">Take Attendance</div>
    <form action="dailyatt.php" method="get">
      <div class="input-box">
        <label for="class">Select class:</label>
        <select name="class" id="class">
          <option value="LKG">LKG</option>
          <option value="UKG">UKG</option>
          <option value="1">1st class</option>
          <option value="2">2nd class</option>
          <option value="3">3rd class</option>
          <option value="4">4th class</option>
          <option value="5">5th class</option>
          <option value="6">6th class</option>
          <option value="7">7th class</option>
          <option value="8">8th class</option>
          <option value="9">9th class</option>
          <option value="10">10th class</option>
          <!-- Add other options for classes here -->
        </select>
      </div>
      <div class="input-box">
        <label for="section">Select Section:</label>
        <select name="section" id="section"> 
          <option value="A">Section -A</option>
          <option value="B">Section -B</option>
          <!-- Add other options for sections here -->
        </select>
      </div>
      <div class="input-box">
        <label for="period">Select Period:</label>
        <select name="period" id="period"> 
          <option value="1">Morning</option>
          <option value="2">Afternoon</option>
        </select>
      </div>
      <div class="input-box">
        <label for="subject">Enter Subject:</label>
        <input type="text" name="subject" id="subject" placeholder="Subject">
      </div>

      <div class="button">
        <input type="submit" value="Take">
      </div>
      <br>
      <input type='button' value='Click To Go Back' onclick='history.go(-1)'>
    </form>
  </div>
</body>
</html>

