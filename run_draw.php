<?php
session_start();
include 'db_connection.php';

// Vérifier si l'utilisateur est administrateur
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] == 0) {
    echo "Accès refusé.";
    exit();
}

// Chercher un candidat inscrit à la loterie
$candidateQuery = $pdo->query("SELECT userId FROM user WHERE isLotterySubscribed = 1 ORDER BY RAND() LIMIT 1");
$candidate = $candidateQuery->fetch(PDO::FETCH_ASSOC);

if (!$candidate) {
    // Pas de candidats disponibles
    echo "Aucun candidat n'est disponible pour le tirage.";
} else {
    // Sélectionner un gagnant et enregistrer le tirage
    $winnerId = $candidate['userId'];
    $insertDraw = $pdo->prepare("INSERT INTO draw (drawId, redUserId, hasBeenInformed, date) VALUES (UUID(), :winnerId, 0, NOW())");
    $insertDraw->execute([':winnerId' => $winnerId]);

    // Obtenir l'email du gagnant pour afficher le résultat
    $emailQuery = $pdo->prepare("SELECT email FROM user WHERE userId = :winnerId");
    $emailQuery->execute([':winnerId' => $winnerId]);
    $winnerEmail = $emailQuery->fetchColumn();

    // Mettre à jour le statut du gagnant pour le désinscrire et le marquer comme résident
    $updateWinner = $pdo->prepare("UPDATE user SET isLotterySubscribed = 0, isResident = 1 WHERE userId = :winnerId");
    $updateWinner->execute([':winnerId' => $winnerId]);

    echo "Le gagnant du tirage est : $winnerEmail";
}
?>
