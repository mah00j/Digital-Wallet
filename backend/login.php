<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password']; 

    $sql = "SELECT id, password FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $db_password = $user['password'];  
        $id = $user['id'];


        $_SESSION['user_id'] = $id; 
        

        header("Location: ./../frontend/wallet.html");
        exit();
    } else {
        echo "User not found";
        header("Location: ./../frontend/login.html");
        exit();
    }
}
?>
