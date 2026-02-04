<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View All Students</title>
    <link rel="stylesheet" type="text/css" href="../admin/css/style.css">
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
        <div class="table-container">
            <table>
                <caption>All Registered Students</caption>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Student ID</th>
                        <th>Password</th>
                        <th>Confirm Password</th>
                        <th>Email</th>
                        <th>Apartment</th>
                        <th>College</th>
                        <th>Vehicle Model</th>
                        <th>Plate Number</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $con = mysqli_connect("localhost", "root", "", "uniparkx_db") or die("Cannot connect to server." . mysqli_error($con));
                    $sql = "SELECT * FROM student";
                    $result = mysqli_query($con, $sql) or die("Cannot execute SQL.");

                    while ($output = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$output['username']}</td>
                                <td>{$output['student_id']}</td>
                                <td>{$output['password']}</td>
                                <td>{$output['confirm_password']}</td>
                                <td>{$output['email']}</td>
                                <td>{$output['apartment']}</td>
                                <td>{$output['college']}</td>
                                <td>{$output['vehicle_model']}</td>
                                <td>{$output['plate_number']}</td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
