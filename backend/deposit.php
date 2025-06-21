<?php
require 'db.php';
session_start();

$amount = floatval($_POST['balance']);
$id = $_SESSION['user_id'];

if ($id !== null && $amount > 0) {

$sql = "UPDATE user SET balance = balance + $amount WHERE id = '$id'";
if (!mysqli_query($conn, $sql)) {
        die("Error adding to balance: " . mysqli_error($conn));
    }

$sql = "INSERT INTO transactions (user_id, type, amount) VALUES ($id, 'deposit', $amount)";
mysqli_query($conn, $sql);

header("Location: ../frontend/wallet.html");
exit();
} else {
    echo "Invalid user ID or amount.";
    header("Location: ../frontend/wallet.html");
    exit();
}
?>
