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
    <link rel="stylesheet" href="style2.css" />
    <title>UPLOAD</title>
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
        .mt-3 {
            margin-top: 1rem;
        }
        .submit-btn {
            width: 100%; /* Make the button width 100% */
            padding: 12px; /* Increase padding for better appearance */
            font-size: 18px; /* Increase font size */
        }
        .form-control {
            padding: 12px; /* Increase padding for input fields */
            font-size: 18px; /* Increase font size for input fields */
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <form method="post" action="addtenthslip.php" enctype="multipart/form-data" class="form">
            <h2 class="text-center">Add Marks</h2>
            <div class="mb-3">
                <label for="excel_file">Select CSV File To Upload</label>
                <input type="file" name="excel_file" accept=".csv" class="form-control">
            </div>
            <div class="text-center">
                <input type="submit" name="import" value="Upload" class="submit-btn btn btn-primary" /><br>
                <a href="javascript:void(0);" class="mt-3" onclick="history.go(-1);">Go To Menu</a>
            </div>
        </form>
    </div>
</body>
</html>
