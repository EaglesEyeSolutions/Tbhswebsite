<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user'] == false) {
    header("Location: home.html");
    exit();
}

use SimpleExcel\SimpleExcel;

if (isset($_POST['import'])) {
    require_once('SimpleExcel/SimpleExcel.php');

    $uploadedFilePath = $_FILES['excel_file']['tmp_name'];
    $destinationPath = $_FILES['excel_file']['name'];

    if (move_uploaded_file($uploadedFilePath, $destinationPath)) {
        $excel = new SimpleExcel('csv');
        $excel->parser->loadFile($destinationPath);
        $data = $excel->parser->getField();

        $db = mysqli_connect('localhost', 'u322949535_eagleseye', 'EaglesEyeSolutions@2023*', 'u322949535_tbhs');

        foreach ($data as $row) {
            $stu_id = $row[0];
            $y1 = $row[1];
            $y2 = $row[2];
            $y3 = $row[3];

            
                $query = "UPDATE student_detail SET pre_1st_year_due = '$y1', pre_2nd_year_due = '$y2', pre_3rd_year_due = '$y3' WHERE student_id = '$stu_id'";
                mysqli_query($db, $query);
            
        }

        // Display success message
        echo "<!DOCTYPE html>
              <html>
              <head>
                  <title>Import Successful</title>
                  <link rel='stylesheet' href='style2.css'>
                  <style>
                      a {
                          text-decoration: none;
                          color: red;
                      }
                  </style>
              </head>
              <body>
                  <div class='login-wrapper'>
                      <form class='form'>
                          Dues added successfully<br>
                          <a href='admin.php'>Go To Menu</a>
                      </form>
                  </div>
              </body>
              </html>";
    }
}
?>
