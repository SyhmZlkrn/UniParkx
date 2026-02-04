<html>
    <head>
        <title>Login Process</title>
    </head>
    <body>
    <?php
        $con=mysqli_connect("localhost","root","","uniparkx_db") or die("Cannot connect to server");
            $username=$_POST["username"];
            $password=$_POST["password"];

            $sql="SELECT * FROM student WHERE username='$username'";

            $status=mysqli_query($con, $sql);

            if(mysqli_num_rows($status)==0){
                echo "Username does not exist";
            } else {
                $data=mysqli_fetch_array($status,MYSQLI_BOTH);
                if($data['password'] == $password){
                    session_start();
                    $_SESSION["username"]=$username;
                    header("Location: profile.php");
                    exit;
                } else {
                    echo "Password is wrong";
                } 
}
?>
</body>
</html>