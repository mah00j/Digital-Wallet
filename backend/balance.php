<?php
require 'db.php';
session_start();
$user_id = $_SESSION['user_id'] ?? null;

if (!$user_id) {
    echo "Login required";
    exit();
}

$sql = "SELECT balance FROM user WHERE id = $user_id";
$result = mysqli_query($conn, $sql);

if ($result && $row = mysqli_fetch_assoc($result)) {
    echo "$" . number_format($row['balance'], 2);
} else {
    echo "$0.00";
}
?>