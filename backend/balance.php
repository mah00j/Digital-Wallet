<?php
require 'db.php';
session_start();
header("Content-Type: application/json");

$user_id = $_SESSION['user_id'] ?? null;

if (!$user_id) {
    echo "no user id is shown, so login first";
    exit();
}

$sql = "SELECT name,email,address,phone,balance FROM user WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql);

if ($result && $row = mysqli_fetch_assoc($result)) {
    echo json_encode($row);
    
} else {
    echo "User not found";
}
?>