<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Consulat de France</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="home-bg">
    <div class="background-image">
        <div class="quote-box text-center p-4">
            <?php
                // Liste de citations célèbres françaises et leurs auteurs
                $citations = [
                    ["La liberté est le bien le plus précieux que les hommes puissent jamais avoir.", "Jean-Jacques Rousseau"],
                    ["L'homme est né libre et partout il est dans les fers.", "Jean-Jacques Rousseau"],
                    ["Rien ne développe l’intelligence comme les voyages.", "Émile Zola"],
                    ["Il faut toujours viser la lune, car même en cas d'échec, on atterrit dans les étoiles.", "François de La Rochefoucauld"],
                    ["On ne voit bien qu'avec le cœur. L'essentiel est invisible pour les yeux.", "Antoine de Saint-Exupéry"]
                ];
                // Sélection aléatoire d'une citation et de son auteur
                $citation = $citations[array_rand($citations)];
                echo "<p class='m-0'><em>“{$citation[0]}”</em> — {$citation[1]}</p>";
            ?>
        </div>
    </div>
            
    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
