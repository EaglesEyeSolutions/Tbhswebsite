<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>YouTube Video Gallery</title>
  <!-- Add Bootstrap CSS link -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-4">
    <h2>YouTube Video Gallery</h2>
    <!-- Add video links here -->
    <ul class="list-group mt-3" id="videoList">
      <li class="list-group-item"><a href="#" data-video="VIDEO_ID_1">Event Name</a></li>
      <li class="list-group-item"><a href="#" data-video="VIDEO_ID_2">Event Name</a></li>
      <!-- Add more video links if needed -->
    </ul>

    <!-- Video iframe container -->
    <div class="embed-responsive embed-responsive-16by9 mt-4" id="videoContainer">
      <!-- The iframe will be added here -->
    </div>
  </div>

  <!-- Add Bootstrap and jQuery scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    // JavaScript code
    $(document).ready(function() {
      // Function to change the video in the iframe
      function changeVideo(videoId) {
        var iframe = '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/' + videoId + '?rel=0" allowfullscreen></iframe>';
        $('#videoContainer').html(iframe);
      }

      // Initial video when the page loads
      var initialVideoId = 'VIDEO_ID_1'; // Replace this with the video ID you want to show initially
      changeVideo(initialVideoId);

      // Handle clicks on video links
      $('#videoList a').click(function(event) {
        event.preventDefault();
        var videoId = $(this).data('video');
        changeVideo(videoId);
      });
    });
  </script>
</body>

</html>
