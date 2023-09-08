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
      padding: 0 1rem; /* Increase the padding by 1rem (16px) on both sides */
      height: 56px; /* Increase the height by 2px (default height is 54px) */
    }

    .navbar-dark .navbar-nav .nav-link {
      color: #ffffff; /* Change the color to white */
      font-size: 18px; /* Increase the font size to 18px */
    }

    @media screen and (max-width: 576px) {
      .navbar-dark .navbar-nav .nav-link {
        color: #000000; /* Change the color to black at responsiveness */
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
      font-size: 5rem; /* Increase the font size of h1 to 5rem */
      color: #000000; /* Change the color of h1 to white */
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
          <li class="nav-item"><a class="nav-link" href="teachersearch.php">Search Student</a></li>
          <li class="nav-item"><a class="nav-link" href="aboutus.html">About</a></li>
          <li class="nav-item"><a class="nav-link" href="dailyattendance.php">Take Today Attendance</a></li>
          <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-4">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1 class="h3">School Name</h1> <!-- Used "h3" class to reduce font size -->
      </div>
    </div>
  </div>

  <!-- Include Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
