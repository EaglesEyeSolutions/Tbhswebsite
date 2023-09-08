<?php
session_start();

$servername = "localhost";
$username = "u322949535_eagleseye";
$password = "EaglesEyeSolutions@2023*";
$dbname = "u322949535_tbhs";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['Uname']) && isset($_GET['Pass'])) {
    $userid = $_GET['Uname'];
    $passwrd = $_GET['Pass'];

    $sql = "SELECT * FROM user WHERE username = '$userid'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Check if the user is blocked
        if ($row['login_attempts'] >= 6) 
        {
            $_SESSION['error_message'] = "This account is blocked due to multiple unsuccessful login attempts.";
        }
        else
        {
            if ($row['password'] == $passwrd) 
            {
               

                    // ... Your existing code for redirecting to admin.php
                       if((strtolower($row['role'])=="hod") && $row['status']==1)
                {
                    $sqlResetAttempts = "UPDATE user SET login_attempts = 0 WHERE username = '$userid'";
                    $conn->query($sqlResetAttempts);
                  $_SESSION["user"]="hod";
                	header("location:teacher.php");
                }
                elseif((strtolower($row['role'])=="teacher"  ||  strtolower($row['role'])=="faculty") && $row['status']==1)
                {
                    $sqlResetAttempts = "UPDATE user SET login_attempts = 0 WHERE username = '$userid'";
                    $conn->query($sqlResetAttempts);
                  $_SESSION["user"]="teacher";
                  header("location:faculty.php");

                }
                elseif((strtolower($row['role'])=="admin" ) && $row['status']==1)
                {
                    $sqlResetAttempts = "UPDATE user SET login_attempts = 0 WHERE username = '$userid'";
                    $conn->query($sqlResetAttempts);
                  $_SESSION["user"]="admin";
                  header("location:admin.php");

                }
                elseif((strtolower($row['role'])=="director" ) && $row['status']==1)
                {
                    $sqlResetAttempts = "UPDATE user SET login_attempts = 0 WHERE username = '$userid'";
                    $conn->query($sqlResetAttempts);
                  $_SESSION["user"]="director";
                  header("location:director.php");

                }
                elseif((strtolower($row['role'])=="student"  ) && $row['status']==1)
                {
                    $sqlResetAttempts = "UPDATE users SET login_attempts = 0 WHERE username = '$userid'";
                    $conn->query($sqlResetAttempts);
                  $_SESSION["user"]="student";
                  $_SESSION["stu_id"]=$row['id'];
                  $_SESSION["id"]=$row['id'];
                  header("location:student.php");

                }
                
            } else {
                // Incorrect password, increment login_attempts
                $loginAttempts = $row['login_attempts'] + 1;

                // Update login_attempts in the database
                $sqlUpdateAttempts = "UPDATE user SET login_attempts = $loginAttempts WHERE username = '$userid'";
                $conn->query($sqlUpdateAttempts);

                $_SESSION['error_message'] = "Incorrect username or password. You have " . (5 - $loginAttempts) . " attempts left.";
                header("Location: login.html?error=" . urlencode($_SESSION['error_message']));
                exit();
            }
        }
    } 
    else
    {
        $_SESSION['error_message'] = "User not found.";
        // Redirect back to the login page with error message in the URL
    }
    
    
} else {
    $_SESSION['error_message'] = "Access denied due to missing username or password.";
    echo "At redirect link";
    // Redirect back to the login page with error message in the URL
    /*header("Location: login.html?error=" . urlencode($_SESSION['error_message']));
    exit();*/
}

$conn->close();
?>
