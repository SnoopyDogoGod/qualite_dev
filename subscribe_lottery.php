<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['userId'])) {
    header("Location: index.php");
    exit();
}

$userId = $_SESSION['userId'];
$updateQuery = $pdo->prepare("UPDATE user SET isLotterySubscribed = 1 WHERE userId = :userId");
$updateQuery->execute([':userId' => $userId]);

header("Location: lottery.php");
exit();
?>
