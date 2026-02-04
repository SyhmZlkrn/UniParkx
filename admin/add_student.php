<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Added</title>
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
            $conn = new mysqli("localhost", "root", "", "uniparkx_db"); 

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Get POST data
            $username = $_POST['username'];
            $student_id = $_POST['student_id'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password']; 
            $email = $_POST['email'];
            $apartment = $_POST['apartment'];
            $college = $_POST['college'];
            $vehicle_model = $_POST['vehicle_model'];
            $plate_number = $_POST['plate_number'];

            // Insert into database
            $sql = "INSERT INTO student (username, student_id, password, confirm_password, email, apartment, college, vehicle_model, plate_number) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssssss", $username, $student_id,  $password, $confirm_password, $email, $apartment, $college, $vehicle_model, $plate_number);

            if ($stmt->execute()) {
                echo "<p style='font-size: 18px; color: green;'>Student record added successfully!</p>";
                echo "<a href='admin_dashboard.html' style='display:inline-block;padding:12px 18px;background-color:#007BFF;color:white;text-decoration:none;border-radius:5px;margin-top:10px;'>Go back to Admin Dashboard</a>";
            } else {
                echo "<p style='font-size: 18px; color: red;'>Error: " . $stmt->error . "</p>";
                echo "<a href='admin_dashboard.html' style='display:inline-block;padding:12px 18px;background-color:#FF6347;color:white;text-decoration:none;border-radius:5px;margin-top:10px;'>Go back to Admin Dashboard</a>";
            }

            $stmt->close();
            $conn->close();
            ?>
        </div>
    </div>

</body>
</html>
