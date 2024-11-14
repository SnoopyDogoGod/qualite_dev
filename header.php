<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <div class="container-fluid text-center py-3 header-background">
        <h1 class="h3">Consulat de France</h1>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light border border-1 border-dark ">
        <div class="container-fluid ">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="presentation.php">Présentation du pays</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="news.php">Actualités</a>
                    </li>
                    <?php if (isset($_SESSION['userId'])): ?>

                    <li class="nav-item">
                        <a class="nav-link" href="visa.php">Demande de visa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lottery.php">Lotterie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="account.php">Mon compte</a>
                    </li>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="admin.php">Administration</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <?php if (isset($_SESSION['userId'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Se déconnecter</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Se connecter/Créer un compte</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
