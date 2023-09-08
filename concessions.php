<!DOCTYPE html>
<html>
<head>
  <title>Concessions</title>
  <style>
    /* Common styles for all screen sizes */
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      border: 1px solid black;
      padding: 8px;
      text-align: center;
    }

    th {
      background-color: #f2f2f2;
    }

    .editable {
      cursor: pointer;
    }

    .status-modal {
      position: absolute;
      z-index: 2;
      background-color: #fefefe;
      padding: 20px;
      border: 1px solid #888;
    }

    .status-modal button {
      margin-top: 10px;
    }

    /* Responsive styles for smaller screens */
    @media only screen and (max-width: 768px) {
      table {
        font-size: 12px;
      }

      th, td {
        padding: 6px;
      }

      .status-modal {
        width: 90%;
        left: 5%;
        right: 5%;
        top: 30%;
        transform: translateY(-50%);
      }
    }
  </style>
</head>
<body>
  <h1>Concessions</h1>
  <?php
    $servername = "localhost";
$username = "u322949535_eagleseye";
$password = "EaglesEyeSolutions@2023*";
$dbname = "u322949535_tbhs";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $query = "SELECT * FROM concession where is_new='1' and status='On Hold'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
      echo "<div style='overflow-x:auto;'>";
      echo "<table>";
      echo "<tr><th>Student Name</th><th>Class</th><th>Student ID</th><th>Fee Exemption</th><th>Comment</th><th>Status</th><th>Modification</th></tr>";
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["student_name"] . "</td>";
        echo "<td>" . $row["class"] . "</td>";
        echo "<td>" . $row["student_id"] . "</td>";
        echo "<td>" . $row["fee_ex"] . "</td>";
        echo "<td>" . $row["comment"] . "</td>";
        echo "<td class='status-cell' data-id='" . $row["student_id"] . "'>" . $row["status"] . "</td>";
        echo '<td><a class="button" href="edit_concession.php?id=' . $row['student_id'] . '">Edit</a></td>';
        echo "</tr>";
      }
      echo "</table>";
      echo "</div>";
    } else {
      echo "No concessions found.";
    }
   
    mysqli_close($conn);
  ?>

  <div class="status-modal" style="display: none;">
    <select class="status-dropdown">
      <option>On Hold</option>
      <option>Accept</option>
      <option>Reject</option>
    </select>
    <button onclick="updateStatus()">Update Status</button>
    <button onclick="hideModal()">Cancel</button>
  </div>

  <script>
    var selectedCell;
    var modalPositionAdjust = { x: 0, y: 20 };

    function showModal(event) {
      selectedCell = event.target.parentElement.parentElement.querySelector(".status-cell");
      var statusModal = document.querySelector(".status-modal");
      var buttonRect = event.target.getBoundingClientRect();
      var modalX = buttonRect.left + modalPositionAdjust.x;
      var modalY = buttonRect.bottom + modalPositionAdjust.y;
      statusModal.style.left = modalX + "px";
      statusModal.style.top = modalY + "px";
      var currentStatus = selectedCell.textContent;
      var dropdown = statusModal.querySelector(".status-dropdown");
      dropdown.value = currentStatus;

      statusModal.style.display = "block";
    }

    function hideModal() {
      var statusModal = document.querySelector(".status-modal");
      statusModal.style.display = "none";
    }

    function updateStatus() {
      if (selectedCell) {
        const dropdown = document.querySelector(".status-dropdown");
        const newStatus = dropdown.value;
        const id = selectedCell.dataset.id;

        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
            selectedCell.textContent = newStatus;
            hideModal();
          }
        };
        xhr.open("POST", "update_status.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("id=" + encodeURIComponent(id) + "&status=" + encodeURIComponent(newStatus));
      }
    }

    var statusCells = document.querySelectorAll(".status-cell");
    statusCells.forEach((cell) => {
      cell.addEventListener("click", function () {
        showModal(event);
      });
    });
  </script>

  <div style="text-align: center; padding-top: 50px;">
    <a href="admin.php" style="padding: 10px 20px; margin-top: 20px; text-decoration: none; background-color: #007bff; color: #fff; border-radius: 5px;">Go Back</a>
  </div>
</body>
</html>
