<!DOCTYPE html>
<html>
<head>
    <title>Custom Date Transactions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .sum {
            margin-top: 20px;
        }

        button {
            font-size: 16px;
            padding: 8px 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .text-center {
            text-align: center;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    <div class="container">
        <?php
        session_start();

        if (!isset($_SESSION['user']) || $_SESSION['user'] == false) {
            header("Location: home.html");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["custom_date"])) {
            $customDate = date('Y-m-d', strtotime($_GET['custom_date']));

            $servername = "localhost";
            $username = "u322949535_eagleseye";
            $password = "EaglesEyeSolutions@2023*";
            $dbname = "u322949535_tbhs";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } else {
                $sql = "SELECT * FROM trans WHERE dates='$customDate' ";
                $result = $conn->query($sql);
                $numRows = $result->num_rows; // Get the number of retrieved rows

                if ($result->num_rows > 0) {
                    echo "<h1 class='text-center'>Transaction Details for $customDate</h1>";

                    $sqlSum = "SELECT SUM(amount) AS sum1 FROM trans WHERE dates='$customDate'";
                    $resultSum = $conn->query($sqlSum);
                    $rowSum = $resultSum->fetch_assoc();
                
                    echo "<div style='text-align: right; margin-right: 70px; font-size: 25px;'>Total Amount: <b>".$rowSum['sum1']."</b></div>";
                    echo "<div style='text-align: right; margin-right: 60px; font-size: 25px;'>No.of Transactions:<b> ".$numRows."</b></div>";

                    echo "<table id='transactionTable'>";
                    echo "<tr>";
                    echo "<th>S.No</th>";
                    echo "<th>Transaction Id</th>";
                    echo "<th>Student Id</th>";
                    echo "<th><a href='#' class='sort-link' data-sort='student-name'>Student Name</a></th>";
                    echo "<th><a href='#' class='sort-link' data-sort='class'>Student Class</a></th>";
                    echo "<th>Payment Method</th>";
                    echo "<th>UTR/CHECK Number</th>";
                    echo "<th><a href='#' class='sort-link' data-sort='amount'>Amount</a></th>";
                    echo "</tr>";



                    $serialNumber = 1;
                    while ($row = $result->fetch_assoc()) {
                      $studentId = $row['student_id'];
                      $studentNameQuery = "SELECT student_name, class FROM student_detail WHERE student_id='$studentId'";
                      $studentNameResult = $conn->query($studentNameQuery);

                      if ($studentNameResult->num_rows > 0) {
                          $studentNameData = $studentNameResult->fetch_assoc();
                          $studentName = $studentNameData['student_name'];
                          $class = $studentNameData['class'];
                      } else {
                          $studentName = 'N/A';
                          $class = 'N/A';
                      }

                      echo"<tbody class='data-body'>";



                      echo "<tr>";
                      echo "<td>".$serialNumber."</td>";
                      echo "<td>".$row['trans_id']."</td>";
                      echo "<td>".$studentId."</td>";
                      echo "<td data-column='student-name'>".$studentName."</td>";
                      echo "<td data-column='class'>".$class."</td>";
                      echo "<td>".$row['payment_method']."</td>";
                      echo "<td>".$row['UTRrCHECK_Number']."</td>";
                      echo "<td data-column='amount'>".$row['amount']."</td>";
                      echo "</tr>";

                      
                        echo "</tr>";
                        $serialNumber++; // Increment serial number
                        echo"</tbody>";
                    }

                    echo "</table>";

                    echo "<div class='text-center'>";
                    echo "<button onclick='history.go(-1)'>Go Back</button>";
                    echo "<button onclick='print()'>Print</button>";
                    echo "</div>";
                } else {
                    echo "<h1 class='text-center'>No Transactions for the selected date: $customDate</h1>";
                    echo "<div class='text-center'>";
                    echo "<a href='javascript:history.go(-1)'>Go Back</a>";
                    echo "</div>";
                }
            }

            $conn->close();
        } else {
            // Display the HTML form
            echo "<h1 class='text-center'>Enter Custom Date</h1>";
            echo "<form method='GET' action='' class='text-center'>";
            echo "<label for='custom_date' style='font-size: 25px;'>Select Date:</label>";
            echo "<input type='date' id='custom_date' name='custom_date' required style='font-size: 16px; padding: 6px;'>";
            echo "<button type='submit' style='font-size: 16px; padding: 8px 12px;'>Get Transactions</button>";
            echo "</form>";
        }
        ?>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const table = document.getElementById("transactionTable");
        const sortLinks = table.querySelectorAll(".sort-link");

        sortLinks.forEach(sortLink => {
            sortLink.addEventListener("click", event => {
                event.preventDefault();
                const column = sortLink.getAttribute("data-sort");
                const rows = Array.from(table.querySelectorAll("tbody tr"));

                rows.sort((rowA, rowB) => {
                    const valueA = rowA.querySelector(`td[data-column="${column}"]`).textContent;
                    const valueB = rowB.querySelector(`td[data-column="${column}"]`).textContent;
                    return column === "amount" ? parseFloat(valueA) - parseFloat(valueB) : valueA.localeCompare(valueB);
                });

                rows.forEach(row => row.remove());
                rows.forEach(row => table.querySelector("tbody").appendChild(row));
            });
        });
    });
</script>
</body>
</html>
