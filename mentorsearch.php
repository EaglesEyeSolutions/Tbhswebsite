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
    <link rel="stylesheet" href="style2.css" />
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
        <form action="show.php" class="form" method="get">
            <h2 class="form-title">Search Student DiceId</h2>
            <div class="mb-3">
                <input type="text" name="mname" id="loginUser" class="form-control" placeholder="Student Name" required />
            </div>
            <div class="text-center">
                <input type="submit" value="Show" class="submit-btn" />
                <a href="javascript:void(0);" class="go-back-link" onclick="history.go(-1);">Go Back</a>
            </div>
        </form>
    </div>
</body>
</html>
