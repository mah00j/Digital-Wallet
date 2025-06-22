<?php
require 'db.php';
session_start();

$amount = floatval($_POST['balance']);
$id = $_SESSION['user_id'];

if ($amount <= 0) {
    $_SESSION['error'] = "Withdrawal amount must be positive";
    header("Location: ../frontend/wallet.html");
    exit();
}

$sql = "SELECT balance FROM user WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);


if ($user['balance'] < $amount) {
    $_SESSION['error'] = "Insufficient funds for withdrawal";
    header("Location: ../frontend/wallet.html");
    exit();
}

$sql = "UPDATE user SET balance = balance - $amount WHERE id = '$id'";


$sql = "INSERT INTO transactions (user_id, type, amount) VALUES ('$id', 'withdraw', $amount)";

$_SESSION['success'] = "Withdrawal successful";
header("Location: ../frontend/wallet.html");
exit();
?>