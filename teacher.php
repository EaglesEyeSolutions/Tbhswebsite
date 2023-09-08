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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style1.css">

    <title>MENTORING</title>
    <style>
        .navbar-brand {
            font-family: Serif;
        }

        .navbar-light .navbar-nav .nav-link {
            font-family: Serif;
        }

        .textbox {
            text-align: center;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .btn {
            font-family: Serif;
        }

        .campus {
            text-align: center;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .campus img {
            width: 100%;
            height: auto;
        }

        .ctn {
            text-align: center;
            margin-bottom: 50px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <section class="header">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="color: #fff;">
                <div class="container">
                    <a class="navbar-brand" href="#">Student System</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="addst.php">
                                    <i class="fas fa-plus"></i> Add Student
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="admin.php">Finance System</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="attendanceDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Attendance
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="attendanceDropdown">
                                    <li><a class="dropdown-item" href="dailyattendance.php">Take Today Attendance</a></li>
                                    <li><a class="dropdown-item" href="attendance.php">Upload Excel Sheet</a></li>
                                    <li><a class="dropdown-item" href="dashboard.php">Attendance Report</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Search Student
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="searchDropdown">
                                    <li><a class="dropdown-item" href="search.php">All Details</a></li>
                                    <li><a class="dropdown-item" href="personal.php">Personal Details</a></li>
                                    <li><a class="dropdown-item" href="mentorsearch.php">Search By Name</a></li>
                                    <li><a class="dropdown-item" href="specificm.php">Specific Year marks</a></li>
                                    <li><a class="dropdown-item" href="classwisedetails.php">ClassWise Details</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="marksDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Marks
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="marksDropdown">
                                    <li><a class="dropdown-item" href="excelstpern.php">Upload excel Student Personal
                                            sheet</a></li>
                                    <li><a class="dropdown-item" href="editpersonal.php">Update Student Personal
                                            sheet</a></li>
                                    <li><a class="dropdown-item" href="uploadexcel1.php">Upload FA1 Marks Excel </a></li>
                                    <li><a class="dropdown-item" href="mid1.php">UPLoad FA2 marks</a></li>
                                    <li><a class="dropdown-item" href="mid2.php">UPLoad FA3 marks</a></li>
                                    <li><a class="dropdown-item" href="external.php">UPLoad FA4 marks</a></li>
                                    <li><a class="dropdown-item" href="adsub.php">UPLoad SA1 marks</a></li>
                                    <li><a class="dropdown-item" href="uploadsa2.php">UPLoad SA2 marks</a></li>
                                    <li><a class="dropdown-item" href="uploadsa3.php">UPLoad SA3 marks</a></li>
                                    <li><a class="dropdown-item" href="tenthslip.php">Upload Tenth slipTest Marks</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </section>
        <section class="campus">
            <h1>Our School</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, ipsa.</p>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <img src="images/imgg1.jpg" alt="">
                </div>
                <div class="col-md-4">
                    <img src="images/img9.jpg" alt="">
                </div>
                <div class="col-md-4">
                    <img src="images/imgg1.jpg" alt="">
                </div>
            </div>
        </section>
        <section class="ctn">
            <a href="aboutus.html" class="btn">About us</a>
        </section>
    </div>
</body>

</html>
