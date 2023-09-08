<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Add New Student</h4>
                    </div>
                    <div class="card-body">
                        <form action="adds.php" method="get">
                            <div class="form-group">
                                <label>Student DiceID</label>
                                <input type="text" class="form-control" placeholder="Enter Student Rollno" required name="rollno">
                            </div>
                            <div class="form-group">
                                <label>Student Name</label>
                                <input type="text" class="form-control" placeholder="Enter Student Name" required name="name">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" placeholder="Enter Address" required name="addr">
                            </div>
                            <div class="form-group">
                                <label>Student AadharNo</label>
                                <input type="text" class="form-control" placeholder="Enter Student AadharNo" required name="addhar">
                            </div>
                            <div class="form-group">
                                <label>Parents PhoneNo</label>
                                <input type="text" class="form-control" placeholder="Enter Parent PhoneNo" required name="pphone">
                            </div>
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="text" class="form-control" placeholder="dd/mm/yy" required name="dob">
                            </div>
                            <div class="form-group">
                                <label>Class</label>
                                <input type="text" class="form-control" placeholder="Enter Class" required name="year">
                            </div>
                            <div class="form-group">
                                <label>Section</label>
                                <input type="text" class="form-control" placeholder="Enter Section" required name="section">
                            </div>
                            <div class="form-group">
                                <label>Father Aadhar</label>
                                <input type="text" class="form-control" placeholder="Enter Father Aadhar" required name="fa">
                            </div>
                            <div class="form-group">
                                <label>Mother Aadhar</label>
                                <input type="text" class="form-control" placeholder="Enter Mother Aadhar" required name="ma">
                            </div>
                            <div class="form-group">
                                <label>Caste</label>
                                <input type="text" class="form-control" placeholder="Enter Caste" required name="cast">
                            </div>
                            <div class="form-group">
                                <label>SubCaste</label>
                                <input type="text" class="form-control" placeholder="Enter SubCaste" required name="scast">
                            </div>
                            <div class="form-group">
                                <label>Alternative Phone</label>
                                <input type="text" class="form-control" placeholder="Enter Alternative Phone" required name="tp">
                            </div>
                            <div class="form-group">
                                <label>Government Scheme</label>
                                <input type="text" class="form-control" placeholder="Eligible Yes Or No" required name="Gvs">
                            </div>
                            <div class="form-group">
    <label>Student Image</label>
    <input type="file" class="form-control-file" name="studentImage" accept=".jpg, .jpeg, .png" required>
</div>
                            <button type="submit" class="btn btn-primary">Add</button>
                            <br>
                            <a href="teacher.php" class="mt-3">Go To Menu</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Include Bootstrap JS and jQuery (at the end of the body) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
