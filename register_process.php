<html>
<head>
    <title>Register Process</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f8f9fa;">

<?php
$con = mysqli_connect("localhost", "root", "", "uniparkx_db") or die("Cannot connect to server");

$username = $_POST["username"];
$student_id = $_POST["student_id"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];
$email = $_POST["email"];
$vehicle_model = $_POST["vehicle_model"];
$plate_number = $_POST["plate_number"];

$alertBox = "";

// Check if passwords match
if ($password !== $confirm_password) {
    $alertBox = "
    <div class='card shadow-lg p-4 text-center text-danger' style='max-width: 500px; margin: auto; margin-top: 10%; border-radius: 20px;'>
        <h3 class='mb-3'>❌ Registration Failed</h3>
        <p class='mb-4'>Passwords do not match. Please try again.</p>
        <a href='register.php' class='btn btn-danger px-4 py-2'>Back to Register</a>
    </div>";
    echo $alertBox;
    exit;
}

// Insert into database
$insert_sql = "INSERT INTO student VALUES('$username','$student_id','$password','$confirm_password','$email', '', '','$vehicle_model','$plate_number')";
$status = mysqli_query($con, $insert_sql);

if ($status) {
    $alertBox = "
    <div class='card shadow-lg p-4 text-center text-success' style='max-width: 500px; margin: auto; margin-top: 10%; border-radius: 20px;'>
        <h3 class='mb-3'>✅ Registration Successful</h3>
        <p class='mb-4'>You can now login using your credentials.</p>
        <a href='login.php' class='btn btn-success px-4 py-2'>Go to Login</a>
    </div>";
} else {
    $alertBox = "
    <div class='card shadow-lg p-4 text-center text-danger' style='max-width: 500px; margin: auto; margin-top: 10%; border-radius: 20px;'>
        <h3 class='mb-3'>❌ Registration Failed</h3>
        <p class='mb-4'>Something went wrong. Please try again or contact support.</p>
        <a href='register.php' class='btn btn-danger px-4 py-2'>Back to Register</a>
    </div>";
}

echo $alertBox;
mysqli_close($con);
?>

</body>
</html>
