<?php
require 'db.php';
session_start();

$amount = floatval($_POST['balance']);
$id = $_SESSION['user_id'];
if ($amount <= 0) {
    $_SESSION['error'] = "Withdrawal amount must be +ve.";
    header("Location: ../frontend/wallet.html");
    exit();
}
$sql = "UPDATE user SET balance = balance - $amount WHERE id = '$id' AND balance >= $amount";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Error updating balance: " . mysqli_error($conn));
}


if ($user['balance'] < $amount) {
    $_SESSION['error'] = "Insufficient funds for withdrawal";
    header("Location: ../frontend/wallet.html");
    exit();
}

// Record transaction
$sql = "INSERT INTO transactions (user_id, type, amount) VALUES ($id, 'withdraw', $amount)";
mysqli_query($conn, $sql);

header("Location: ../frontend/wallet.html");
exit();
?>
