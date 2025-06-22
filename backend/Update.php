<?php
session_start();
require "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION["user_id"] ?? null;
     if ($id) {
         $result = mysqli_query($conn, "SELECT * FROM user WHERE id = '$id'");
        $user = mysqli_fetch_assoc($result);

        $name = $_POST["name"] ?: $user["name"];
        $email = $_POST["email"] ?: $user["email"];
        $address = $_POST["address"] ?: $user["address"];
        $phone = $_POST["phone"] ?: $user["phone"];


$sql = "UPDATE user SET name = '$name', email = '$email', address = '$address', phone = '$phone' WHERE id = '$id'";

            if (mysqli_query($conn, $sql)) {
                echo "profile updated successfully";
                header("Location: ../frontend/wallet.html");
                exit();

            } else {
                echo "error updating profile";
                header("Location: ../frontend/wallet.html");
                exit();

            }
}
}
?>