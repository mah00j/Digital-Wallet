<?php
session_start();
require 'db.php';

header("Content-Type: application/json");

$user_id = $_SESSION['user_id'] ?? null;

$sql = "SELECT type, amount, created_at as date FROM transactions WHERE user_id = '$user_id' ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $transactions = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $transactions[] = $row;
    }
    echo json_encode($transactions);
} else {
    echo json_encode(["error" => "No transactions found"]);
}

mysqli_close($conn);
?>