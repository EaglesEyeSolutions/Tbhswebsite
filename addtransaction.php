<?php
session_start();
$_SESSION['totp'] = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT); // Generate and format OTP with leading zeros
  if (!isset($_SESSION['user']) || $_SESSION['user'] == false) {
    header("Location: home.html");
    exit();
  }
  if ($_SESSION["msg"] == 1) {
    echo '<script>alert("Transaction added successfully")</script>';
    $_SESSION["msg"] = 0;
  }
  $_SESSION['transac_id'] = uniqid();
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="markscss.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transaction</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.css">

  <style>
    .datepicker {
      width: 100%;
      box-sizing: border-box;
    }
  </style>
</head>
<body>
<script>
  // Call the function to update class counts
  updateClassCounts();
</script>

  <div class="container">
    <div class="title">Transaction</div>
    <div class="content">
      <form action="addtrans.php" method="POST" id="transactionForm">
        <div class="user-details">
          <?php
          $dt = date('d-m-y');
          echo "<div class='input-box'>";
          echo "<span class='details'>Date</span>";
          echo "<input type='text' name='bname' value=" . $dt . " readonly>";
          echo "</div>";

            $classCounts = array();
          
            // Connect to your database
            $servername = "localhost";
$username = "u322949535_eagleseye";
$password = "EaglesEyeSolutions@2023*";
$dbname = "u322949535_tbhs";
            $conn = new mysqli($servername, $username, $password, $dbname);
          
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
          
            // Query to retrieve class counts
            $sql = "SELECT class, COUNT(*) as count FROM student_detail GROUP BY class";
            $result = $conn->query($sql);
          
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $classCounts[$row["class"]] = $row["count"];
              }
            }
          
            $conn->close();
          
          
          ?>
          <div class="input-box">
            <span class="details">Select Type Of Fee</span>
            <select id="Fee_Type" name="Fee_Type" >
            <option value="Fees"  selected class="details"  >Fee</option>
            <option value="Admission Fee"   class="details"  >Admission Fee</option>
            <option value="TC Fee"   class="details"  >TC Fee</option>
            </select><br>
            
          </div>

<div class="input-box">
  <label for="class">Select Class</label><br>
  <select name="class" id="class">
  <option value="">-- Select a Class --</option>
<option value="-2">LKG---(<?php echo isset($classCounts["-2"]) ? $classCounts["-2"] : '0'; ?> )</option>
<option value="-1">UKG---(<?php echo isset($classCounts["-1"]) ? $classCounts["-1"] : '0'; ?> )</option>
<option value="1">Class 1---(<?php echo isset($classCounts["1"]) ? $classCounts["1"] : '0'; ?> )</option>
<option value="2">Class 2--- (<?php echo isset($classCounts["2"]) ? $classCounts["2"] : '0'; ?> )</option>
<option value="3">Class 3--- (<?php echo isset($classCounts["3"]) ? $classCounts["3"] : '0'; ?> )</option>
<option value="4">Class 4--- (<?php echo isset($classCounts["4"]) ? $classCounts["4"] : '0'; ?> )</option>
<option value="5">Class 5--- (<?php echo isset($classCounts["5"]) ? $classCounts["5"] : '0'; ?> )</option>
<option value="6">Class 6--- (<?php echo isset($classCounts["6"]) ? $classCounts["6"] : '0'; ?> )</option>
<option value="7">Class 7--- (<?php echo isset($classCounts["7"]) ? $classCounts["7"] : '0'; ?> )</option>
<option value="8">Class 8--- (<?php echo isset($classCounts["8"]) ? $classCounts["8"] : '0'; ?> )</option>
<option value="9">Class 9--- (<?php echo isset($classCounts["9"]) ? $classCounts["9"] : '0'; ?> )</option>
<option value="10">Class 10--- (<?php echo isset($classCounts["10"]) ? $classCounts["10"] : '0'; ?> )</option>

    <!-- Add more class options as needed -->
  </select>
</div>



          <div class="input-box">
            <span class="details">Student Name</span>
            <input type="text" placeholder="Enter Student Name" required name="student_name" id="student_name" list="studentList">
            <datalist id="studentList"></datalist>
          </div> 

          <div class="input-box">
            <span class="details">Student Id</span>
            <input type="text" placeholder="Enter Student Id" required name="student_id" id="student_id" readonly>
          </div>

          <div class="input-box">
            <label for="date_of_birth">Date of Birth:</label>
            <input type="text" placeholder="Date of Birth" id="date_of_birth" name="date_of_birth"  class="datepicker">
          </div>
          <div class="input-box">
            <span class="details">Amount</span>
            <input type="text" placeholder="Enter Amount" required name="amount">
          </div><br>
           

         <!-- <div class="input-box">
            <span class="details">Select Phone Number</span>
            <select id="phone_number_select" name="phone_number" >
            <option value="" disabled selected class="details"  >Select a Phone Number</option>
            </select><br>
            <button type="button" onclick="sendOTP()">Verify Number</button>
          </div>
          <script>
            var otpCooldown = false;
            function sendOTP() {
    if (otpCooldown) {
        alert("Please wait before sending OTP again.");
        return;
    }

    var phoneNumberSelect = document.getElementById("phone_number_select");
    var selectedPhoneNumber = phoneNumberSelect.value;

    if (selectedPhoneNumber) {
        otpCooldown = true; // Set cooldown state

        var url = "send_otp.php?phone_number=" + encodeURIComponent(selectedPhoneNumber);

        // Use fetch() to make a GET request
        fetch(url)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("OTP sent successfully. Enter OTP to verify.");
                } else {
                    alert("Failed to send OTP. Please try again later.");
                }
                otpCooldown = false; // Reset cooldown state after a delay
                setTimeout(() => {
                    // Allow the user to resend OTP after a certain duration
                    alert("You can now resend OTP.");
                }, 30000); // 30 seconds cooldown duration
            })
            .catch(error => {
                console.error("Error sending OTP:", error);
                otpCooldown = false; // Reset cooldown state on error
            });
    } else {
        alert("Please select a phone number.");
    }
}


          </script>

          <div class="input-box">
            <span class="details">Enter OTP</span>
            <input type="text" placeholder="Enter OTP" required name="otp" id="otp">
            <br>
            <button type="button" onclick="verifyOTP()">Verify OTP</button>
          </div>
        <script>
          function verifyOTP() {
          
          var enteredOTP = document.getElementById("otp").value;
          var storedOTP = "<?php echo $_SESSION['totp']; ?>";

          if (enteredOTP === storedOTP) {
            document.getElementById("updateButton").disabled = false; // Enable the button
            alert("OTP verified successfully. You can now click the Update button.");
          
            
          } else {
            alert("Incorrect OTP. Please try again. enteredOTP: " + enteredOTP + ", storedOTP: " + storedOTP);
          }
        }
        </script>   -->


          <label>
            <input type="checkbox" name="paymentOption" value="Cash" id="cash" onclick="handleCheckboxClick('cash')"> Cash
        </label>
        <br>
        <label>
            <input type="checkbox" name="paymentOption" value="UPI" id="upi" onclick="handleCheckboxClick('upi')"> UPI
        </label>
        <br>
        <label>
            <input type="checkbox" name="paymentOption" value="Check" id="check" onclick="handleCheckboxClick('check')"> Check
        </label>
        <br>
        <div id="utr" style="display: none;">
            <label>UTR Number:</label>
            <input type="text" name="utrNumber" required>
        </div>
        <div id="checkNumber" style="display: none;">
            <label>Check Number:</label>
            <input type="text" name="checkNumber" required>
        </div>
        
        <!-- Update the JavaScript code for checkbox handling -->
<script>
    function showInputField() {
        const upiCheckbox = document.getElementById("upi");
        const checkCheckbox = document.getElementById("check");
        const utrInput = document.getElementById("utr");
        const checkInput = document.getElementById("checkNumber");

        if (upiCheckbox.checked) {
            utrInput.style.display = "block";
            checkInput.style.display = "none";
        } else if (checkCheckbox.checked) {
            utrInput.style.display = "none";
            checkInput.style.display = "block";
        } else {
            utrInput.style.display = "none";
            checkInput.style.display = "none";
        }

        // Ensure that hidden fields are not required
        const requiredFields = document.querySelectorAll("#utr input, #checkNumber input");
        requiredFields.forEach(field => {
            field.required = false;
        });
    }

    function handleCheckboxClick(checkboxId) {
        const checkboxes = document.getElementsByName("paymentOption");
        checkboxes.forEach(checkbox => {
            if (checkbox.id !== checkboxId) {
                checkbox.checked = false;
            }
        });
        showInputField();
    }
</script>


            <br></br>
          <div class="button">
            <input type="reset" value="Reset" style="height: 30px;width:120px;">
          </div>
        </div>

        <div class="button">
          <input type="submit" value="Update" id="updateButton" >
        </div>
        

        <div style="text-align: center; padding-top: 50px;">
          <button onclick="goBack()" style="padding: 10px 20px; margin-top: 20px; text-decoration: none; background-color: #007bff; color: #fff; border-radius: 5px;">Go Back</button>
        </div>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.js"></script>

  <script>
    

    function goBack() {
      // Check if the user session variable is set and not empty
      // Replace 'user' with the actual name of your session variable
      var userType = '<?php echo isset($_SESSION['user']) ? $_SESSION['user'] : ""; ?>';

      // Perform redirection based on the user's type
      if (userType === 'admin') {
        window.location.href = 'admin.php';
      } else if (userType === 'accountant') {
        window.location.href = 'accountant.php';
      } else {
        // If the user type is not defined or doesn't match any case, redirect to a default page
        window.location.href = 'login.php';
      }
    }

    var originalSuggestions = [];
    var lastSelectedClass = "";
    var lastSelectedStudent = "";

 function fetchStudentSuggestions() {
  var selectedClass = document.getElementById("class").value;
  var studentNameInput = document.getElementById("student_name");
  var studentList = document.getElementById("studentList");
  studentList.innerHTML = "";

  if (selectedClass !== "") {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var data = JSON.parse(xhr.responseText);
        if (data && data.length > 0) {
          originalSuggestions = data;
          lastSelectedClass = selectedClass;

          data.forEach(function (suggestion) {
            var option = document.createElement("option");
            option.value = suggestion;
            studentList.appendChild(option);
          });
        }
      }
    };

    xhr.open("GET", "get_student_suggestions.php?class=" + encodeURIComponent(selectedClass), true);
    xhr.send();
  }
}
document.getElementById("class").addEventListener("change", function () {
      fetchStudentSuggestions();
    });

    flatpickr(".datepicker", {
      dateFormat: "Y/m/d",
    });



   var studentNameInput = document.getElementById("student_name");

    studentNameInput.addEventListener("input", function () {
      var classSelection = document.getElementById("class").value;
      var input = this.value.toLowerCase();
      var filteredStudents = [];
      var studentList = document.getElementById("studentList");

      if (classSelection === lastSelectedClass) {
        for (var i = 0; i < originalSuggestions.length; i++) {
          var optionValue = originalSuggestions[i].toLowerCase();
          if (optionValue.indexOf(input) !== -1) {
            filteredStudents.push(originalSuggestions[i]);
          }
        }
      }

      studentList.innerHTML = "";

      filteredStudents.forEach(function (suggestion) {
        var option = document.createElement("option");
        option.value = suggestion;
        studentList.appendChild(option);
      });
    });

    studentNameInput.addEventListener("blur", function () {
      var input = this.value.toLowerCase();

      if (lastSelectedStudent !== "" && lastSelectedStudent.toLowerCase() !== input) {
        studentNameInput.value = "";
      }
    });

    
studentNameInput.addEventListener("input", function () {
  var selectedStudent = this.value;
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var studentData = JSON.parse(xhr.responseText);
      if (studentData && !studentData.error) {
        document.getElementById("date_of_birth").value = studentData.formatted_date;
        document.getElementById("student_id").value = studentData.student_id;

        // Update phone numbers
        var phoneNumberSelect = document.getElementById("phone_number_select");
        phoneNumberSelect.innerHTML = ""; // Clear previous options

        if (studentData.phone_number) {
          var phoneNumberOption1 = document.createElement("option");
          phoneNumberOption1.value = studentData.phone_number;
          phoneNumberOption1.textContent = studentData.phone_number;
          phoneNumberSelect.appendChild(phoneNumberOption1);
        }

        if (studentData.phone_number2) {
          var phoneNumberOption2 = document.createElement("option");
          phoneNumberOption2.value = studentData.phone_number2;
          phoneNumberOption2.textContent = studentData.phone_number2;
          phoneNumberSelect.appendChild(phoneNumberOption2);
        }
      } else {
        document.getElementById("date_of_birth").value = "";
        document.getElementById("student_id").value = "";
      }
    }
  };

  xhr.open("GET", "get_student_data.php?student_name=" + encodeURIComponent(selectedStudent), true);
  xhr.send();
});


    document.addEventListener("DOMContentLoaded", function () {
      var options = studentList.getElementsByTagName("option");
      for (var i = 0; i < options.length; i++) {
        originalSuggestions.push(options[i].value);
      }
    });
  </script>
</body>

</html>
