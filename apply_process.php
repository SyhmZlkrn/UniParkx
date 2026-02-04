<!DOCTYPE html> 
<head> 
    <meta char="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

  <!-- Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <link rel="stylesheet" href="register.css">
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ecf0f1;">
    <a class="navbar-brand ms-3" style=font-family:arial href="#">UniParkX</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ms-auto me-3">
        <a class="nav-item nav-link" href="index.html">Home</a>
         </div>
        </div>
    </nav>
</head>
<body>
<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "uniparkx_db") or die("Cannot connect to server");

$username = $_SESSION['username'];  // logged in student's username
$vehicle_model = $_POST['vehicle_model'];
$plate_number = $_POST['plate_number'];

// Get student_id from username
$result = mysqli_query($con, "SELECT student_id FROM student WHERE username='$username'");
$row = mysqli_fetch_assoc($result);
$student_id = $row['student_id'];

// Check if the parking location is full
$parking_check_query = "SELECT parking_quota, 
                               (SELECT COUNT(*) FROM parking WHERE location = '$location') AS registered_users 
                        FROM parking_location 
                        WHERE location = '$location'";

$parking_check_result = mysqli_query($con, $parking_check_query);

if ($parking_check_result) {
    $parking_data = mysqli_fetch_assoc($parking_check_result);
    $parking_quota = $parking_data['parking_quota'];
    $registered_users = $parking_data['registered_users'];

    // Check if the parking is full
    if ($registered_users >= $parking_quota) {
        echo "<p style='color: red;'>Registration failed. The parking is full. <a href='apply.php'>Back</a></p>";
        exit;
    }
} else {
    echo "<p style='color: red;'>Error fetching parking data: " . mysqli_error($con) . "</p>";
    exit;
}


// Insert into parking table
$insert_sql = "INSERT INTO parking (student_id, username, vehicle_model, plate_number) 
               VALUES ('$student_id', '$username', '$vehicle_model', '$plate_number')";
$status = mysqli_query($con, $insert_sql);

// ✅ Update student table too
$update_student_sql = "UPDATE student 
                       SET vehicle_model = '$vehicle_model', plate_number = '$plate_number'
                       WHERE student_id = '$student_id'";
mysqli_query($con, $update_student_sql);

if ($status) {
    echo "<p style='color: green; font-size:12px;'>Vehicle registered successfully! You can now go back to <a href='profile.php'>Home</a>.</p>";
} else {
    echo "<p style='color: red;'>Error: " . mysqli_error($con) . "</p>";
}
?>


</body>
</html>