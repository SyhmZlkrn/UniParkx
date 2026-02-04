<html>
<head>
    <title>Register Process</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f8f9fa;">
    
    <?php
session_start();
$con = mysqli_connect("localhost", "root", "", "uniparkx_db") or die("Cannot connect to server");

$location = $_POST["location"];
$username = $_SESSION["username"];
$alertBox = "";

if ($location == "College") {
    // Just update college field
    $update_sql = "UPDATE student SET college='Yes' WHERE username='$username'";
    
    if (mysqli_query($con, $update_sql)) {
        $alertBox = "
        <div class='card shadow-lg p-4 text-center' style='max-width: 500px; margin: auto; margin-top: 10%; border-radius: 20px;'>
            <h3 class='text-success mb-3'>✅ College Application Successful</h3>
            <p class='mb-4'>You have successfully applied for College parking.</p>
            <a href='profile.php' class='btn btn-success px-4 py-2'>Go back to Profile</a>
        </div>";
    } else {
        $alertBox = "
        <div class='card shadow-lg p-4 text-center' style='max-width: 500px; margin: auto; margin-top: 10%; border-radius: 20px;'>
            <h3 class='text-danger mb-3'>❌ Update Failed</h3>
            <p class='mb-4'>There was a problem updating your application. Please try again.</p>
            <a href='profile.php' class='btn btn-danger px-4 py-2'>Go back</a>
        </div>";
    }

    echo $alertBox;
    mysqli_close($con);
    exit;
}

// Get student's current apartment
$student_result = mysqli_query($con, "SELECT apartment FROM student WHERE username='$username'");
$student_data = mysqli_fetch_assoc($student_result);
$old_location = $student_data['apartment'];

if ($old_location === $location) {
    $alertBox = "
    <div class='card shadow-lg p-4 text-center' style='max-width: 500px; margin: auto; margin-top: 10%; border-radius: 20px;'>
        <h3 class='text-info mb-3'>ℹ️ Already Applied</h3>
        <p class='mb-4'>You have already applied for <strong>$location</strong>.</p>
        <a href='profile.php' class='btn btn-primary px-4 py-2'>Go back</a>
    </div>";
    echo $alertBox;
    mysqli_close($con);
    exit;
}

// Get quota for new location
$quota_result = mysqli_query($con, "SELECT quota FROM location_quota WHERE location='$location'");
$quota_data = mysqli_fetch_assoc($quota_result);
$available_quota = $quota_data['quota'];

if ($available_quota > 0) {
    // 1. Update student apartment
    $update_student = "UPDATE student SET apartment='$location' WHERE username='$username'";

    // 2. Decrease quota for new location
    $decrease_quota = "UPDATE location_quota SET quota = quota - 1 WHERE location='$location'";

    // 3. If previously applied, increase old location quota
    $increase_old_quota = "";
    if (!empty($old_location)) {
        $increase_old_quota = "UPDATE location_quota SET quota = quota + 1 WHERE location='$old_location'";
    }

    // Execute queries
    $success = mysqli_query($con, $update_student) && mysqli_query($con, $decrease_quota);
    if ($increase_old_quota) {
        $success = $success && mysqli_query($con, $increase_old_quota);
    }

    if ($success) {
        $alertBox = "
        <div class='card shadow-lg p-4 text-center' style='max-width: 500px; margin: auto; margin-top: 10%; border-radius: 20px;'>
            <h3 class='text-success mb-3'>✅ Application Successful</h3>
            <p class='mb-4'>Your parking application for <strong>$location</strong> has been recorded successfully.</p>
            <a href='profile.php' class='btn btn-success px-4 py-2'>Go back to Profile</a>
        </div>";
    } else {
        $alertBox = "
        <div class='card shadow-lg p-4 text-center' style='max-width: 500px; margin: auto; margin-top: 10%; border-radius: 20px;'>
            <h3 class='text-danger mb-3'>❌ Update Failed</h3>
            <p class='mb-4'>There was a problem updating your application. Please try again.</p>
            <a href='profile.php' class='btn btn-danger px-4 py-2'>Go back</a>
        </div>";
    }
} else {
    $alertBox = "
    <div class='card shadow-lg p-4 text-center' style='max-width: 500px; margin: auto; margin-top: 10%; border-radius: 20px;'>
        <h3 class='text-warning mb-3'>⚠️ Parking Full</h3>
        <p class='mb-4'>Parking for <strong>$location</strong> is currently full. Please choose a different location.</p>
        <a href='profile.php' class='btn btn-warning px-4 py-2'>Back to Selection</a>
    </div>";
}

echo $alertBox;
mysqli_close($con);
?>
</body>
</html>
