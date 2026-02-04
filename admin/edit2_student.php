<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Student Information</title>
    <link rel="stylesheet" type="text/css" href="../admin/css/style2.css">
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2><a href="admin_dashboard.html" style="color: white; text-decoration: none;">Admin Panel</a></h2>
        <a href="viewoption_student.html">View</a>
        <a href="add_student.html">Add Student</a>
        <a href="edit_student.html">Edit Student</a>
        <a href="delete_student.html">Delete Student</a>
        <a href="admin_dashboard.html">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="form-container">
            <?php
            $con = mysqli_connect("localhost", "root", "", "uniparkx_db") or die("Cannot connect to server." . mysqli_error($con));

            $username = $_POST["username"];
            $student_id = $_POST["student_id"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confirm_password = $_POST["confirm_password"];
            $apartment = $_POST["apartment"];
            $college = $_POST["college"];
            $vehicle_model = $_POST["vehicle_model"];
            $plate_number = $_POST["plate_number"];

            $update_sql = "UPDATE student SET username = '$username', student_id = '$student_id', email = '$email', password = '$password', confirm_password = '$confirm_password', apartment = '$apartment' , college = '$college', vehicle_model = '$vehicle_model' , plate_number = '$plate_number' WHERE student_id = '$student_id'";
            $sql_result = mysqli_query($con, $update_sql);

            if ($sql_result) {
                echo "<p style='font-size: 18px; color: green;'>Successfully updated the data.</p>";
                echo "<a href='admin_dashboard.html' style='display:inline-block;padding:12px 18px;background-color:#007BFF;color:white;text-decoration:none;border-radius:5px;margin-top:10px;'>Go back to Admin Dashboard</a>";
            } else {
                echo "<p style='font-size: 18px; color: red;'>Error in updating the data.</p>";
                echo "<a href='admin_dashboard.html' style='display:inline-block;padding:12px 18px;background-color:#FF6347;color:white;text-decoration:none;border-radius:5px;margin-top:10px;'>Go back to Admin Dashboard</a>";
            }
            ?>
        </div>
    </div>

</body>
</html>
