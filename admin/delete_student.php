<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Student</title>
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
            // Connect to database
            $con = mysqli_connect("localhost", "root", "", "uniparkx_db") or die("Cannot connect to server." . mysqli_error($con));

            // Get POST data
            $student_id = $_POST['student_id'];

            // Delete student record
            $sql_delete = "DELETE FROM student WHERE student_id='$student_id'";
            $result = mysqli_query($con, $sql_delete) or die("Error in SQL: " . mysqli_error($con));

            if ($result) {
                echo "<p style='font-size: 18px; color: green;'>Student record deleted successfully. Student ID: $student_id</p>";
                echo "<a href='admin_dashboard.html' style='display:inline-block;padding:12px 18px;background-color:#007BFF;color:white;text-decoration:none;border-radius:5px;margin-top:10px;'>Go back to Admin Dashboard</a>";
            } else {
                echo "<p style='font-size: 18px; color: red;'>Error deleting record.</p>";
                echo "<a href='admin_dashboard.html' style='display:inline-block;padding:12px 18px;background-color:#FF6347;color:white;text-decoration:none;border-radius:5px;margin-top:10px;'>Go back to Admin Dashboard</a>";
            }

            // Close connection
            mysqli_close($con);
            ?>
        </div>
    </div>

</body>
</html>
