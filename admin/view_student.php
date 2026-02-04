<!doctype html>
<html>
<head>
<title>Untitled Document</title>
</head>
<body>

<?php

$con=mysqli_connect("localhost", "root", "","uniparkx_db") or die("Cannot connect to 
server.".mysqli_error($con));
$id=$_POST["student_id"];
$sql="SELECT * FROM student WHERE student_id='$id'";
$result=mysqli_query($con,$sql) or die("Cannot execute sql.");
$output=mysqli_fetch_array($result,MYSQLI_BOTH);

if($id==isset($output[0]))
{
?>
 
 <p>Below are student's information details:</p>
 <br/>

  Student_id: <input name="student_id" type="text" value="<?php echo "$output[0]"; ?>" readonly="readonly"/>
 <br/><br/>

 username: <input name="usernamae" type="text" value="<?php echo "$output[1]"; ?>" 
readonly="readonly"/>
 <br/><br/>
    password: <input name="password" type="text" value="<?php echo "$output[2]"; ?>"readonly="readonly"/>
 <br/><br/>

    confirm_password: <input name="confirm_password" type="text" value="<?php echo "$output[3]"; ?>"readonly="readonly"/>   
    <br/><br/> 

    Email: <input name="email" type="text" value="<?php echo "$output[4]"; ?>"readonly="readonly"/>
     <br/><br/>
 
 apartment: <input type="text" name="apartment" value="<?php echo "$output[5]"; ?>"readonly="readonly"/>
 <br/><br/> 

  college: <input type="text" name="college" value="<?php echo "$output[6]"; ?>"readonly="readonly"/>
 <br/><br/> 

  vehicle_model: <input type="text" name="vehicle_model" value="<?php echo "$output[7]"; ?>"readonly="readonly"/>
 <br/><br/> 

  plate_number: <input type="text" name="plate_number" value="<?php echo "$output[8]"; ?>"readonly="readonly"/>
 <br/><br/> 
<?php
}

else
echo "<p>Student ID is not exist</p>";

?>
</body>
</html>