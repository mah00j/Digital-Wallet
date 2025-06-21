<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


 $sql = "INSERT INTO user (name, email, password, address, phone) VALUES ('$name', '$email', '$password', '$address', '$phone')";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: ../frontend/wallet.html");
        exit();
    } else {
        header("Location: ../backend/register.html");
        exit();
    }
}
?>