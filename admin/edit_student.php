<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Students</title>
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

        <?php
        $con = mysqli_connect("localhost", "root", "", "uniparkx_db") or die("Cannot connect to server." . mysqli_error($con));

        $idCustomer = $_POST["student_id"];

        $sql = "SELECT * FROM student WHERE student_id = '$idCustomer'";
        $result = mysqli_query($con, $sql) or die("Cannot execute SQL.");

        $row = mysqli_fetch_array($result, MYSQLI_BOTH);
        ?>

        <!-- Form Container -->
        <div class="form-container">
            <form name="form1" method="post" action="edit2_student.php">

                <label>Username:</label>
                <input name="username" type="text" value="<?php echo $row[0]; ?>" class="input-field">
                <br/><br/>

                <label>Student ID:</label>
                <input name="student_id" type="text" value="<?php echo $row[1]; ?>" readonly="readonly" class="input-field">
                <br/><br/>

                <label>Password:</label>
                <input name="password" type="text" value="<?php echo $row[2]; ?>" class="input-field">
                <br/><br/>

                <label>Confirm Password:</label>
                <input name="confirm_password" type="text" value="<?php echo $row[3]; ?>" class="input-field">
                <br/><br/>

                <label>Email:</label>
                <input name="email" type="text" value="<?php echo $row[4]; ?>" class="input-field">
                <br/><br/>

                <label>Apartment:</label>
                <input name="apartment" type="text" value="<?php echo $row[5]; ?>" class="input-field">
                <br/><br/>

                <label>College:</label>
                <input name="college" type="text" value="<?php echo $row[6]; ?>" class="input-field">
                <br/><br/>

                <label>Vehicle Model:</label>
                <input name="vehicle_model" type="text" value="<?php echo $row[7]; ?>" class="input-field">
                <br/><br/>

                <label>Plate Number:</label>
                <input name="plate_number" type="text" value="<?php echo $row[8]; ?>" class="input-field">
                <br/><br/>

                <div class="form-buttons">
                    <input type="submit" id="update2" value="Update" class="btn">
                    <input type="reset" name="Submit2" value="Reset" class="btn">
                </div>

            </form>
        </div>

    </div>

</body>
</html>
