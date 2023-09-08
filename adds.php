<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user'] == false) {
    header("Location: home.html");
    exit();
}

$servername = "localhost";
$username = "u322949535_eagleseye";
$password = "EaglesEyeSolutions@2023*";
$dbname = "u322949535_tbhs";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $id = $_GET["rollno"];
    $name = $_GET["name"];
    $phone = $_GET["pphone"];
    $add = $_GET["addr"];
    $df = $_GET["dob"];
    $year = $_GET["year"];
    $se = $_GET["section"];
    $adhar = $_GET['addhar'];
    $gover = $_GET["Gvs"];
    $fa = $_GET["fa"];
    $ma = $_GET["ma"];
    $caste = $_GET["cast"];
    $scast = $_GET["scast"];
    $aph = $_GET["tp"];

    $sql = "INSERT INTO student_personal(student_id, student_name, year, phone, address, dob, section, Student_Aadhar, government, father_aadhar, mother_aadhar, caste, subcaste, alterphone)
	    VALUES ('$id', '$name', '$year', '$phone', '$add', '$df', '$se', '$adhar', '$gover', '$fa', '$ma', '$caste', '$scast', '$aph')";
    if ($conn->query($sql)) {
        // Handle image upload
        if (isset($_FILES['studentImage']) && $_FILES['studentImage']['error'] === UPLOAD_ERR_OK) {
            $targetDir = 'images/'; // Directory to store uploaded images
            $targetFile = $targetDir . basename($_FILES['studentImage']['name']);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Check if the image file is a valid image format
            if (in_array($imageFileType, ['jpg', 'jpeg', 'png'])) {
                if (move_uploaded_file($_FILES['studentImage']['tmp_name'], $targetFile)) {
                    // Image uploaded successfully
                    echo "Image uploaded successfully.";
                } else {
                    echo "Error uploading image.";
                }
            } else {
                echo "Invalid image format. Only JPEG, JPG, and PNG formats are allowed.";
            }
        }

        echo "<!DOCTYPE html>";
        echo "<html>";
        echo "<body>";
        echo "<style>
        a{
        	text-decoration: none;
        	color: red;
        }";
        echo "</style>";
        echo "<link rel='stylesheet' href='style2.css'/>";
        echo "<div class='login-wrapper'>";
        echo "<form  class='form' >";
        echo "Student added successfully. Add marks using the link below:<br>";
        echo "<a href='adsub.php'>Add marks</a>";
        echo   "</form>";
        echo  "</div>";
        echo "</body>";
        echo "</html>";
    } else {
        echo "Error: Student already exists";
        echo $conn->error;
    }
}

$conn->close();
?>
