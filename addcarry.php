<!DOCTYPE html>
<html>
<head>
  <title>Add Carry Forward</title>
  <!-- Add the flatpickr stylesheet -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
    }

    form {
      max-width: 800px;
      margin: 0 auto;
      display: grid;
      gap: 15px;
    }

    label {
      font-weight: bold;
    }

    input, select {
      padding: 8px;
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
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      justify-self: center;
    }

    button[type="submit"]:hover {
      background-color: #1808f6;
    }
  </style>
</head>
<body>
  <h1 style="text-align: center;">Student Detail Modification</h1>
  <form id="concessionForm" action=" " method="post">
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

    <label for="student_name">Student Name:</label>
    <input type="text" id="student_name" name="student_name" required list="studentList">
    <datalist id="studentList"></datalist>

    <label for="date_of_birth">Date of Birth:</label>
    <input type="text" id="date_of_birth" name="date_of_birth" required class="datepicker">

    <label for="student_id">Student ID:</label>
    <input type="text" id="student_id" name="student_id" readonly>

    <label for="due">Due :</label>
    <input type="text" id="due" name="due" readonly>

    <label for="due1">Due 1 year:</label>
    <input type="text" id="due1" name="due1" readonly> <!-- Display current value -->
    <input type="text" id="edited_due1" name="edited_due1" placeholder="Edit Due 1 year">





    <!-- Other form fields here -->

    <button type="submit">UPDATE</button>
  </form>

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
                    document.getElementById("due").value = studentData.fee;
                    document.getElementById("due1").value = studentData.pre_1st_year_due;
                    
                } else {
                    document.getElementById("date_of_birth").value = "";
                    document.getElementById("student_id").value = "";
                    document.getElementById("due").value = "";
                    document.getElementById("due1").value = "";
                    
                }
            }
        };

        xhr.open("GET", "get_student_data.php?student_name=" + encodeURIComponent(selectedStudent), true);
        xhr.send();
    });


    document.getElementById("concessionForm").addEventListener("submit", function (event) {
  event.preventDefault();

  var editedDue1 = document.getElementById("edited_due1").value;
  var selectedStudent = document.getElementById("student_id").value;

  var formData = new FormData();
  formData.append("edited_due1", editedDue1);
  formData.append("selected_student", selectedStudent);

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var response = JSON.parse(xhr.responseText);
      if (response.success) {
        alert("Values updated successfully!");
      } else {
        alert("Error updating values.");
      }
    }
  };

  xhr.open("POST", "update_student_carry.php", true);
  xhr.send(formData);
});


    document.addEventListener("DOMContentLoaded", function () {
      var options = studentList.getElementsByTagName("option");
      for (var i = 0; i < options.length; i++) {
        originalSuggestions.push(options[i].value);
      }
    });
  </script>


<div style="text-align: center; padding-top: 50px;">
  <a href="admin.php" style="padding: 10px 20px; margin-top: 20px; text-decoration: none; background-color: #007bff; color: #fff; border-radius: 5px;">Go Back</a>
</div>
</body>
</html>
