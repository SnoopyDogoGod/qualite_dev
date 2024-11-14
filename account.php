<?php
session_start();
include 'db_connection.php';

// Vérification de connexion
if (!isset($_SESSION['userId'])) {
    header("Location: index.php");
    exit();
}

// Récupérer les informations de l'utilisateur
$userId = $_SESSION['userId'];
$query = $pdo->prepare("SELECT first_name, last_name, email, phone_number, isResident, isLotterySubscribed FROM user WHERE userId = :userId");
$query->execute([':userId' => $userId]);
$user = $query->fetch(PDO::FETCH_ASSOC);

// Redirige vers l'index si l'utilisateur n'est pas trouvé dans la base de données
if (!$user) {
    header("Location: index.php");
    exit();
}

// Déterminer le statut de résidence et d'inscription à la loterie
$residentStatus = $user['isResident'] ? "Oui (Vous avez gagné à la loterie)" : "Non";
$lotteryStatus = $user['isLotterySubscribed'] ? "Oui (Actuellement inscrit)" : "Non";
?>

<?php include 'header.php'; ?>
<main class="container py-5">
    <h1 class="text-center mb-4">Informations de votre compte</h1>

    <div class="account-info card p-4">
        <h3>Vos informations personnelles :</h3>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Prénom :</strong> <?= htmlspecialchars($user['first_name']) ?></li>
            <li class="list-group-item"><strong>Nom :</strong> <?= htmlspecialchars($user['last_name']) ?></li>
            <li class="list-group-item"><strong>Email :</strong> <?= htmlspecialchars($user['email']) ?></li>
            <li class="list-group-item"><strong>Numéro de téléphone :</strong> <?= htmlspecialchars($user['phone_number']) ?></li>
            <li class="list-group-item"><strong>Résident (gagné à la loterie) :</strong> <?= $residentStatus ?></li>
            <li class="list-group-item"><strong>Inscrit à la loterie :</strong> <?= $lotteryStatus ?></li>
        </ul>
    </div>
</main>

<?php include 'footer.php'; ?>
