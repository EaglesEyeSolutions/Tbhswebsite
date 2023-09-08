<?php
session_start();
      if (! isset ( $_SESSION ['user'] ) || $_SESSION ['user'] == false)
                  {
                   header ( "Location: home.html" );
                   exit ();
                   } 
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   
    
    <title>Main Page</title>
    <style>
    .center {
      text-align: center;
      margin-top: 150px;
      font-size: 30px; /* Increase the font size for the Andhra Loyola text */
      color:#ffff;
    }

    .btns {
      margin-top: 20px;
      font-size: 20px; /* Increase the font size for the "Add New Transaction" link */
      
    }
    .navbar-toggler-icon {
    color: white;
  }
  </style>
  </head>
  <body background='images/admin.jpg' style='
                   width: 100%;
                   height: 70vh;
                   background-size: cover;
                   background-position: center;
                  ' >
    
        <nav class="navbar navbar-expand-lg navbar-light" style="color: #fff;background-color: black;height:70px">
            <div class="container">
              <div >
           
        </div>
          <div><h1>Admin</h1></div>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                
                  <li class="nav-item"  style="margin-left: 250px">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-family: Serif;color:white">Reports</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="font-family: Serif">
                      <li><a class="dropdown-item" href="ttrans.php">Date Wise Transaction</a></li>
                      <li><a class="dropdown-item" href="class_fee_report.php">Classes Fee Reports</a></li>
                      <li><a class="dropdown-item" href="monthreport.php">Month Transaction</a></li>
                      <li><a class="dropdown-item" href="class_group.php">All Classes Report</a></li>
                      <!-- //<li><a class="dropdown-item" href="specific.php">Specific Dates Transactions</a></li>-->
                    </ul>  


                    <li class="nav-item"  style="margin-left: 10px">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-family: Serif;color:white">Modify</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="font-family: Serif">
                      <li><a class="dropdown-item" href="mdfy_school_fee.php">Modify School Fee Structure</a></li>
                      <li><a class="dropdown-item" href="mdfy_stu.html">Modify Student Fee or Details</a></li>
                      <li><a class="dropdown-item" href="add_student_detail.php">Add Student</a></li>
                      <li><a class="dropdown-item" href="remove_student.php">Remove Student</a></li>
                      <li><a class="dropdown-item" href="feedisplayy.php">Carry Forword</a></li>
                      <li><a class="dropdown-item" href="addcarry.php">Add Carry Forword</a></li>
                    </ul>  <li class="nav-item"  style="margin-left: 5px">



                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-family: Serif;color:white">Send Notification</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="font-family: Serif">
                      <li><a class="dropdown-item" href="notification_system.html">Send Fee Notification</a></li>
                      <li><a class="dropdown-item" href="custom_msgs.html">Send Custom Message</a></li>
                    </ul> 





                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-family: Serif;color:white">Transaction</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="font-family: Serif">
                    <li>
                    <a class="dropdown-item" href="addtransaction.php"  >Add Transaction</a>
                    </li> 
                    <li><a class="dropdown-item" href="search1.php">Search Transaction</a></li>
                    <li><a class="dropdown-item" href="verify_transactions.php">Un-Verified Transactions</a></li>
                    </ul> 


                  

                 

                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-family: Serif;color:white">Concession</a>
                    <ul class="dropdown-menu" id="concessionDropdown" aria-labelledby="navbarDropdown" style="font-family: Serif">
                      <li><a class="dropdown-item" class="notification-dot" id="onhold_notification" href="concessions.php">Onhold Requests</a></li>
                      <li><a class="dropdown-item" href="concession_table.php">Responded Requests</a></li>
                    </ul> 
                        
                  

                 <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="logout.php" style="font-family: Serif;color:white">Logout</a>
                  </li>  
              
              </div>
              
            </div>
              <i class="bi bi-list mobile-nav-toggle"></i>
          </nav>
    
          <div class="center">
    <div class="title">ANDHRA LOYOLA INSTITUTE OF ENGINEERING AND TECHNOLOGY</div>
    <div class="btns">
      <button style="margin-left: 40px;"><a href="reg.html" style="text-decoration: none">Add New Operator</a></button>
    </div>
  </div>
              <!-- JavaScript code for handling notifications -->
  <script>

    // Function to display the notification message
    function showNotification(message) {
      // Create a notification div
      var notificationDiv = document.createElement("div");
      notificationDiv.className = "notification";
      notificationDiv.textContent = message;

      // Append the notification div to the body
      document.body.appendChild(notificationDiv);

      // Set a timeout to remove the notification after a few seconds (adjust as needed)
      setTimeout(function () {
        notificationDiv.remove();
      }, 5000); // Notification will be removed after 5 seconds (5000 milliseconds)
    }

    // Function to update the status
  function updateStatus() {
    if (selectedCell) {
      const dropdown = document.querySelector('.status-dropdown');
      const newStatus = dropdown.value;
      const id = selectedCell.dataset.id;

      // Perform an AJAX request to update the status in the database
      const xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          // If the update is successful, update the cell content with the new status
          selectedCell.textContent = newStatus;
          // Hide the statusModal after updating
          hideModal();
        }
      };
      xhr.open('POST', 'update_status.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.send('id=' + encodeURIComponent(id) + '&status=' + encodeURIComponent(newStatus));
    }
  }

  
    // Function to check for new notifications
    function checkForNewConcessions() {
    // Send an AJAX request to fetch new concessions from the database
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var newConcessions = JSON.parse(xhr.responseText);
        if (newConcessions && newConcessions.length > 0) {
          // Display the notifications for new concessions
          newConcessions.forEach(function (concession) {
            // Customize the format of the notification as needed
            var notificationMessage = "New Concession Request: " + concession.student_name + " (Class: " + concession.class + ")";
            // You can use the showNotification() function from the previous code or any other method to display notifications to users.
            console.log(notificationMessage);

            // Mark the concession as read by setting the is_new flag to 0
            markConcessionAsRead(concession.id);
          });
        }
      }
    };

    xhr.open("GET", "get_new_concessions.php", true);
    xhr.send();
  }


    function markConcessionAsRead(concessionId) {
    // Send an AJAX request to update the is_new flag to 0 for the specified concession
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "mark_concession_as_read.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("concession_id=" + encodeURIComponent(concessionId));
  }

    // Start checking for new notifications
    function fetchOnholdCount() {
        fetch('get_onhold_count.php')
            .then(response => response.json())
            .then(data => {
                const onholdNotification = document.getElementById('onhold_notification');
                const onholdCount = data.count;
                if (onholdCount > 0) {
                    onholdNotification.textContent = 'Onhold Requests (' + onholdCount + ')';
                } else {
                    onholdNotification.textContent = 'Onhold Requests';
                }
            })
            .catch(error => console.error('Error fetching data:', error));
    }

  </script>
  </body>
</html>


