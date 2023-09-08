<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style3.css">
  <style>
    /* Add custom styles here */
    .navbar {
      padding: 0 1rem;
      height: 56px;
    }

    .navbar-dark .navbar-nav .nav-link {
      color: #ffffff;
      font-size: 18px;
    }

    @media screen and (max-width: 576px) {
      .navbar-dark .navbar-nav .nav-link {
        color: #000000;
      }
    }

    body {
      background-image: url('images/img10.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100%;
    }

    h1 {
      font-size: 5rem;
      color: #000000;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <!-- Add your logo or text here -->
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="mentorsearch.php">Search Student</a></li>
          <li class="nav-item"><a class="nav-link" href="classwisedetails.php">Class Wise Details</a></li>
          <li class="nav-item"><a class="nav-link" href="aboutus.html">About</a></li>
          <li class="nav-item"><a class="nav-link" href="dailyattendance.php">Take Today Attendance</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">More</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="excelstpern.php">Upload Student Personal</a>
              <a class="dropdown-item" href="uploadexcel1.php">Upload FA1</a>
              <a class="dropdown-item" href="mid1.php">Upload FA2</a>
              <a class="dropdown-item" href="mid2.php">Upload FA3</a>
              <a class="dropdown-item" href="external.php">Upload FA4</a>
              <a class="dropdown-item" href="adsub.php">Upload SA1</a>
              <a class="dropdown-item" href="uploadsa2.php">Upload SA2</a>
              <a class="dropdown-item" href="uploadsa3.php">Upload SA3</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="tenthslip.php">Upload Tenthslip Test</a>
            </div>
          </li>
          <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-4">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1 class="h3">The Briliants E.M High School</h1>
      </div>
    </div>
  </div>

  <!-- Include Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
