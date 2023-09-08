<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="sty.css" />
     <link rel="stylesheet" href="markscss.css">
     <title>Search</title>
  <!-- Add the flatpickr stylesheet -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    h1 {
      margin-bottom: 20px;
    }

    form {
      max-width: 400px;
      margin: 0 auto;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input, select, button {
      width: 100%;
      padding: 8px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .datepicker {
      width: 100%;
      box-sizing: border-box;
    }

    button[type="submit"] {
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
    }

    button[type="submit"]:hover {
      background-color: #1808f6;
    }
  </style>
</head>
<body>
  
  <div class="container">
  
    <div class="title">Student Transactions Search</div>
    <div class="content">
  <form id="concessionForm" action="tsearch.php" method="get">
  <div class="user-details">
    <label for="class">Select Class:</label>
    <select id="class" name="class">
      <option value="">-- Select a Class --</option>
      <option value="-2">LKG</option>
      <option value="-1">UKG</option>
      <option value="1">Class 1</option>
      <option value="2">Class 2</option>
      <option value="3">Class 3</option>
      <option value="4">Class 4</option>
      <option value="5">Class 5</option>
      <option value="6">Class 6</option>
      <option value="7">Class 7</option>
      <option value="8">Class 8</option>
      <option value="9">Class 9</option>
      <option value="10">Class 10</option>
      <!-- Add more class options as needed -->
    </select>
    
    <label for="student_name" >Student Name:</label>
    <input  type="text" id="student_name" name="student_name" required list="studentList">
    <datalist id="studentList"></datalist>

    <label for="date_of_birth">Date of Birth:</label>
    <input type="text" id="date_of_birth" name="date_of_birth" required class="datepicker">

    <label for="student_id">Student ID:</label>
    <input type="text" id="student_id" name="student_id" readonly>


    <!-- Other form fields here -->

    <button type="submit">Select</button>
    <div style="text-align: center; padding-top: 50px;">
            <a href="javascript:history.go(-1)" style="padding: 10px 20px; margin-top: 20px; text-decoration: none; background-color: #007bff; color: #fff; border-radius: 5px;">Go Back</a>
        </div>
  </form>

  </div></div></div></div>

  <!-- Add the flatpickr script -->
  <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.js"></script>
  <script>
    var originalSuggestions = [];
    var lastSelectedClass = "";
    var lastSelectedStudent = "";

    function fetchStudentSuggestions() {
      var classSelection = document.getElementById("class").value;
      var studentNameInput = document.getElementById("student_name");
      var studentList = document.getElementById("studentList");
      studentList.innerHTML = "";

      if (classSelection !== "") {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
            var data = JSON.parse(xhr.responseText);
            if (data && data.length > 0) {
              originalSuggestions = data;
              lastSelectedClass = classSelection;

              data.forEach(function (suggestion) {
                var option = document.createElement("option");
                option.value = suggestion;
                studentList.appendChild(option);
              });
            }
          }
        };

        xhr.open("GET", "get_student_suggestions.php?class=" + encodeURIComponent(classSelection), true);
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
