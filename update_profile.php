<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirect to login page if user is not logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

// Database connection
$con = mysqli_connect("localhost", "root", "", "uniparkx_db") or die("Cannot connect to server");

// Fetch the latest user data from the database
$username = $_SESSION['username'];
$sql = "SELECT username, student_id, email, vehicle_model, plate_number, apartment, college FROM student WHERE username = '$username'";
$result = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    // Update session variables with the latest data
    $_SESSION['username'] = $row['username'];
    $_SESSION['student_id'] = $row['student_id'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['vehicle_model'] = $row['vehicle_model'];
    $_SESSION['plate_number'] = $row['plate_number'];
    $_SESSION['apartment'] = $row['apartment'];
    $_SESSION['college'] = $row['college'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="register.css">
    <style>
        .container {
            margin-top: 80px; /* Adjust this value to move the form down */
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ecf0f1;">
        <a class="navbar-brand ms-3" style="font-family: Arial;" href="#">UniParkX</a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto me-3">
                <a class="nav-item nav-link" href="profile.php">Home</a>
            </div>
        </div>
    </nav>

    <!-- Profile Content -->
    <div class="container">
        <h2 class="text-center mb-4">Update Profile</h2>
        <form action="update_profile_processing.php" method="post">
            <div class="mb-3">
                <label class="form-label">Student ID</label>
                <input type="text" name="student_id" class="form-control" value="<?php echo $_SESSION['student_id']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $_SESSION['email']; ?>" required>
            </div>            <div class="mb-3">

                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $_SESSION['password']; ?>" required>
            </div>

                <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $_SESSION['confirm_password']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Vehicle Model</label>
                <input type="text" name="vehicle_model" class="form-control" value="<?php echo $_SESSION['vehicle_model']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Plate Number</label>
                <input type="text" name="plate_number" class="form-control" value="<?php echo $_SESSION['plate_number']; ?>" required>
            </div>
                        <div class="mb-3">
                <label class="form-label">Apartment</label>
                <input type="text" name="apartment" class="form-control" value="<?php echo $_SESSION['apartment']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">College</label>
                <input type="text" name="college" class="form-control" value="<?php echo $_SESSION['college']; ?>" readonly>
            </div>
            <button type="submit" style="background-color: #200250;">Update Profile</button>
        </form>

        <div class="text-center mt-3">
        <a href="profilepage.php" class="btn btn-danger mt-3 text-white">Cancel</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
