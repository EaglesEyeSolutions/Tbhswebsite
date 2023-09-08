<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reset_password"])) {
    $user_id = $_POST['user_id'];
    $new_password = $_POST['new_password'];

     $db=mysqli_connect('localhost','u322949535_eagleseye','EaglesEyeSolutions@2023*','u322949535_tbhs');
     $query = "UPDATE users SET password = '$new_password' WHERE username = '$user_id'";
     $result = mysqli_query($db, $query);

   
     if ($result) {
         $success_message = "Password updated successfully.";
     } else {
         $error_message = "Error updating password: " . mysqli_error($db);
     }

    unset($_SESSION['otp']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Reset Password</h1>
        <?php if (isset($success_message)) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success_message; ?>
            </div>
            <a href="login1.html" class="btn btn-primary">Login</a>
        <?php } elseif (isset($error_message)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php } else { ?>
            <form action="" method="post">
                <input type="hidden" name="user_id" value="<?php echo $_GET['user_id']; ?>">
                <div class="form-group">
                    <label for="new_password">New Password:</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                </div>
                <button type="submit" name="reset_password" class="btn btn-primary">Reset Password</button>
            </form>
        <?php } ?>
    </div>

    <!-- Include Bootstrap JS (Optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

