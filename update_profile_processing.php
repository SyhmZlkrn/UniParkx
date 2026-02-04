<!DOCTYPE html> 
<head> 
    <meta char="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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

<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Database connection
$con = mysqli_connect("localhost", "root", "", "uniparkx_db") or die("Connection failed: " . mysqli_connect_error());

// Sanitize input
$username = mysqli_real_escape_string($con, $_SESSION['username']);
$student_id = mysqli_real_escape_string($con, $_POST['student_id']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);
$vehicle_model = mysqli_real_escape_string($con, $_POST['vehicle_model']);
$plate_number = mysqli_real_escape_string($con, $_POST['plate_number']);


// Input validation
if (!empty($student_id) && !empty($email) && !empty($vehicle_model) && !empty($plate_number)) {

    // Update query
    $sql = "UPDATE student 
            SET student_id = '$student_id',
                email = '$email',
                password = '$password',
                confirm_password = '$confirm_password',
                vehicle_model = '$vehicle_model',
                plate_number = '$plate_number'
            WHERE username = '$username'";

    if (mysqli_query($con, $sql)) {
        // Update session values too
        $_SESSION['student_id'] = $student_id;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['confirm_passsword'] = $confirm_passsword;
        $_SESSION['vehicle_model'] = $vehicle_model;
        $_SESSION['plate_number'] = $plate_number;

        header("Location: profile.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }

} else {
    echo "All fields are required. <a href='update_profile.php'>Back</a>";
}

mysqli_close($con);
?>
</body>
</html>
