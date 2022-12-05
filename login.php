<?php

$user = $_POST['username'];
$pass = $_POST['password'];

// Database connection here

$con = new mysqli("localhost","root","","demo");
if ($con->connect_error){
    die("Failed to connect" . $con->connect_error);
}   else{
    $stmt = $con->prepare("select * from loginform where user = ?");
    $stmt->bind_param("s",$user);
    $stmt->execute();
    $stmt_result =$stmt->get_result();
    if($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();
        if($data['pass'] === $pass){
            echo "<h2>Login Successfully</h2>";
        }else{
            echo "<h2>Invalid User or Password</h2>";
        }
    }else{
        echo "<h2>Invalid User or Password</h2>";
    }
}

?>
