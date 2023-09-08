<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Forgot Password</h1>
        <form action="request_otp.php" method="post">
            <div class="form-group">
                <label for="user_id">Enter User ID:</label>
                <input type="text" class="form-control" id="user_id" name="user_id" required>
            </div>
            <button type="submit" name="request_otp" class="btn btn-primary">Send OTP</button>
        </form>
    </div>

    <!-- Include Bootstrap JS (Optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
