<?php
session_start();
include 'connect.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch balance from database
$sql = "SELECT balance FROM wallet WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$wallet = $result->fetch_assoc();
$balance = $wallet ? $wallet['balance'] : 0;

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wallet</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: 50px auto; text-align: center; }
        .balance { font-size: 1.5em; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Wallet</h1>
        <p class="balance">Your balance: $<?php echo number_format($balance, 2); ?></p>
    </div>
</body>
</html>