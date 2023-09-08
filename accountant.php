<?php
session_start();
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main Page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background: url('images/admin.jpg') no-repeat center center fixed;
      background-size: cover;
      height: 100vh;
      overflow: hidden;
    }

    .navbar {
      color: #fff;
      background-color: black;
      height: 70px;
    }

    .navbar-brand img {
      width: 70px;
      height: 70px;
      border-radius: 70% 70% 70% 70%;
      margin-left: -90px;
    }

    .navbar-brand h1 {
      margin-left: 10px;
    }

    .title {
      font-size: 46px;
      color: white;
      text-align: center;
    }

    .btns {
      text-align: center;
      margin-top: 20px;
    }

    .btns a {
      text-decoration: none;
    }
    .dropdown-menu{
        font-size:20px;
    }
    
  </style>
</head>
<body>
  

  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="#">
        <h1 style="color:white">Operator</h1>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-expanded="false" style="color:white;font-size:20px">Reports</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="font-family: Serif">
              <li><a class="dropdown-item" href="ttrans.php">Date Wise Transaction </a></li>
              <li><a class="dropdown-item" href="class_fee_report.php">Classes Fee Reports</a></li>
              <li><a class="dropdown-item" href="monthreport.php">Month Transaction</a></li>
              <li><a class="dropdown-item" href="class_group.php">All Classes Report</a></li>
              <!-- <li><a class="dropdown-item" href="specific.php">Specific Dates Transactions</a></li> -->
            </ul>
          </li>
           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-expanded="false" style="color:white;font-size:20px">Carry-Forward</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="font-family: Serif">
             
              <li><a class="dropdown-item" href="feedisplayy.php">Carry Forword</a></li>
                      <li><a class="dropdown-item" href="addcarry.php">Add Carry Forword</a></li>
              <!-- <li><a class="dropdown-item" href="specific.php">Specific Dates Transactions</a></li> -->
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-expanded="false" style="color:white;font-size:20px">Transactions</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="font-family: Serif">
            <li><a class="dropdown-item" href="addtransaction.php"  >Add Transaction</a></li>
            <li><a class="dropdown-item" href="search1.php">Search Transaction</a></li>
            <li><a class="dropdown-item" href="verify_transactions.php">Un-Verified Transactions</a></li>
              <!-- <li><a class="dropdown-item" href="specific.php">Specific Dates Transactions</a></li> -->
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="request_concession.html" style="color:white;font-size:20px">Request Concession</a>
          </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="logout.php" style="color:white;font-size:20px">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid d-flex flex-column justify-content-center align-items-center h-100">
    <div class="title">The Brilliants E.M High School</div>
    <div class="btns">
      <button class="btn btn-primary"><a href="addtransaction.php" style="text-decoration:none;color:white">Add New</a></button>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
