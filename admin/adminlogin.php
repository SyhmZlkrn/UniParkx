<html>
    <head>
        <title>Login Process</title>
    </head>
    <body>
    <?php
        $con=mysqli_connect("localhost","root","","uniparkx_db") or die("Cannot connect to server");
            $admin_id=$_POST["admin_id"];
            $password=$_POST["password"];

            $sql="SELECT * FROM admin WHERE admin_id='$admin_id'";

            $status=mysqli_query($con, $sql);

            if(mysqli_num_rows($status)==0){
                echo "Username does not exist";
            } else {
                $data=mysqli_fetch_array($status,MYSQLI_BOTH);
                if($data['password'] == $password){
                    session_start();
                    $_SESSION["admin_id"]=$admin_id;
                    header("Location: admin_dashboard.html");
                    exit;
                } else {
                    echo "Password is wrong";
                } 
}
?>
</body>
</html>