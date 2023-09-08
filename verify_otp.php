<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["verify_otp"])) {
    $user_id = $_POST['user_id'];
    $entered_otp = $_POST['entered_otp'];

    if (isset($_SESSION['otp']) && $entered_otp === $_SESSION['otp']) {
        // OTP verified successfully, proceed to password reset form
        header("Location: reset_password.php?user_id=$user_id");
        exit;
    } else {
        // Invalid OTP, display an error message
        $error_message = "Invalid OTP. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Verify OTP</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Verify OTP</h1>
        <?php if (isset($error_message)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php } ?>
        <form action="" method="post">
            <input type="hidden" name="user_id" value="<?php echo $_GET['user_id']; ?>">
            <div class="form-group">
                <label for="entered_otp">Enter OTP:</label>
                <input type="text" class="form-control" id="entered_otp" name="entered_otp" required>
            </div>
            <button type="submit" name="verify_otp" class="btn btn-primary">Verify OTP</button>
        </form>
    </div>

    <!-- Include Bootstrap JS (Optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
