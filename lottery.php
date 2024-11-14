<?php
session_start();
include 'db_connection.php';

// Récupérer les informations de l'utilisateur s'il est connecté
$userId = isset($_SESSION['userId']) ? $_SESSION['userId'] : null;
$isSubscribed = false;

if ($userId) {
    // Vérifier si l'utilisateur est déjà inscrit à la loterie
    $query = $pdo->prepare("SELECT isLotterySubscribed FROM user WHERE userId = :userId");
    $query->execute([':userId' => $userId]);
    $user = $query->fetch(PDO::FETCH_ASSOC);
    $isSubscribed = $user['isLotterySubscribed'];
}

// Récupérer le dernier tirage
$drawQuery = $pdo->query("SELECT date FROM draw ORDER BY date DESC LIMIT 1");
$lastDraw = $drawQuery->fetch(PDO::FETCH_ASSOC);
$timeSinceLastDraw = $lastDraw ? new DateTime($lastDraw['date']) : null;

// Récupérer la liste des gagnants précédents
$winnersQuery = $pdo->query("SELECT u.email, d.date FROM user u JOIN draw d ON u.userId = d.redUserId ORDER BY d.date DESC");
$winners = $winnersQuery->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loterie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="lottery-body">
    <div class="container py-5 text-center">
        <!-- En-tête de la page -->
        <h1 class="display-4 text-primary">Bienvenue sur la page de la Loterie</h1>
        <p class="lead">Inscrivez-vous pour tenter votre chance !</p>

        <!-- Bouton pour s'inscrire ou se désinscrire -->
        <?php if ($userId): ?>
            <?php if (!$isSubscribed): ?>
                <form action="subscribe_lottery.php" method="POST" class="my-3">
                    <button type="submit" class="btn btn-success btn-lg">S'inscrire à la loterie</button>
                </form>
            <?php else: ?>
                <form action="unsubscribe_lottery.php" method="POST" class="my-3">
                    <button type="submit" class="btn btn-secondary btn-lg">Se désinscrire de la loterie</button>
                </form>
                <p class="text-success">Vous êtes déjà inscrit pour le prochain tirage. Bonne chance !</p>
            <?php endif; ?>
        <?php else: ?>
            <p>Connectez-vous pour vous inscrire à la loterie : <a href="login.php">Connectez-vous</a></p>
        <?php endif; ?>

        <!-- Affichage du dernier tirage -->
        <div class="my-4">
            <h2>Dernier tirage :</h2>
            <?php if ($timeSinceLastDraw): ?>
                <?php
                $now = new DateTime();
                $interval = $now->diff($timeSinceLastDraw);
                $timeParts = [];
                if ($interval->days > 0) {
                    $timeParts[] = $interval->days . ' jour' . ($interval->days > 1 ? 's' : '');
                }
                if ($interval->h > 0) {
                    $timeParts[] = $interval->h . ' heure' . ($interval->h > 1 ? 's' : '');
                }
                if ($interval->i > 0) {
                    $timeParts[] = $interval->i . ' minute' . ($interval->i > 1 ? 's' : '');
                }
                if ($interval->s > 0) {
                    $timeParts[] = $interval->s . ' seconde' . ($interval->s > 1 ? 's' : '');
                }
                $timeMessage = implode(', ', $timeParts);
                ?>
                <p>Il y a eu un tirage il y a <?= htmlspecialchars($timeMessage) ?>.</p>
            <?php else: ?>
                <p>Aucun tirage précédent.</p>
            <?php endif; ?>
        </div>

        <!-- Liste des gagnants précédents -->
        <h3 class="mt-5">Gagnants précédents :</h3>
        <ul class="list-group list-group-flush">
            <?php foreach ($winners as $winner): ?>
                <li class="list-group-item">
                    <?= htmlspecialchars($winner['email']) ?> - Tirage du <?= date('d/m/Y', strtotime($winner['date'])) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
