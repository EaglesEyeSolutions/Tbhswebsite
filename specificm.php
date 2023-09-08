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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style2.css" />
    <link rel="stylesheet" href="style1.css" />
    <title>Search</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .login-wrapper {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-title {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-control {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            transition: border-color 0.3s ease-in-out;
        }
        .form-control:focus {
            outline: none;
            border-color: #80bdff;
        }
        .submit-btn {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #ffffff;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }
        .submit-btn:hover {
            background-color: #0056b3;
        }
        .go-back-link {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: red;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <form action="spm.php" class="form" method="get">
            <h2 class="form-title">Search</h2>
            <div class="mb-3">
                <input type="text" name="Uname" id="loginUser" class="form-control" value="Student Name" required />
            </div>
            <div class="mb-3">
                <label for="sem" class="form-label">Select Semester</label>
                <select class="form-control" id="sem" name="sem">
                    <option value="1">1<sup>st</sup> class</option>
                    <option value="2">2<sup>nd</sup> class</option>
                    <option value="3">3<sup>rd</sup> class</option>
                    <option value="4">4<sup>th</sup> class</option>
                    <option value="5">5<sup>th</sup> class</option>
                    <option value="6">6<sup>th</sup> class</option>
                    <option value="7">7<sup>th</sup> class</option>
                    <option value="8">8<sup>th</sup> class</option>
                    <option value="9">9<sup>th</sup> class</option>
                    <option value="10">10<sup>th</sup> class</option>
                </select>
            </div>
            <div class="text-center">
                <input type="submit" value="Show" class="submit-btn" />
                <a href="teacher.php" class="go-back-link">Go Back</a>
            </div>
        </form>
    </div>
</body>
</html>
