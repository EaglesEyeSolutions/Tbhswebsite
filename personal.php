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
    <link rel="stylesheet" href="sty.css" />
    <title>Search</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
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
        .submit-btn {
            width: 100%;
            padding: 12px;
            font-size: 18px;
        }
        .form-control {
            padding: 12px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <form action="studpersonal.php" class="form" method="get">
            <h2 class="text-center">Search</h2>
            <div class="mb-3">
                <label for="loginUser" class="form-label">Student Roll no</label>
                <input type="text" name="Uname" id="loginUser" class="form-control" placeholder="Student Roll no" required />
            </div>
            <div class="text-center">
                <input type="submit" value="Show" class="submit-btn btn btn-primary" />
                <a href="javascript:void(0);" class="btn btn-link mt-3" onclick="history.go(-1);" style="color: red;">Go Back</a>
            </div>
        </form>
    </div>
</body>
</html>
