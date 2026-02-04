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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-container {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">UniParkX</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="profile.php">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Centered Profile Content -->
    <div class="d-flex justify-content-center mt-5">
        <div class="profile-container text-center">
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
            <p>Student ID: <?php echo htmlspecialchars($_SESSION['student_id']); ?></p>
            <p>Email: <?php echo htmlspecialchars($_SESSION['email']); ?></p>
            <p>Vehicle Model: <?php echo htmlspecialchars($_SESSION['vehicle_model']); ?></p>
            <p>Plate Number: <?php echo htmlspecialchars($_SESSION['plate_number']); ?></p>
            <p>Apartment: <?php echo htmlspecialchars($_SESSION['apartment']); ?></p>
            <p>College: <?php echo htmlspecialchars($_SESSION['college']); ?></p>
            <a href="update_profile.php" class="btn btn-primary mt-3">Update Profile</a>
            <a href="profile.php" class="btn btn-danger mt-3">Back</a>
        </div>
    </div>



    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
