<?php
session_start();
include 'db_connection.php';

// Vérifier si l'utilisateur est administrateur
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] == 0) {
    header("Location: index.php"); // Redirige les utilisateurs non-admins
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Admin - Tirage de la Loterie</title>
    <script>
        function runDraw() {
            fetch('run_draw.php')
                .then(response => response.text())
                .then(result => {
                    alert(result); // Affiche le résultat dans un pop-up
                })
                .catch(error => console.error('Erreur:', error));
        }
    </script>
</head>
<body>
    <?php include 'header.php'; ?>

    <h1>Page Admin</h1>
    <button onclick="runDraw()">Faire le tirage</button>
</body>
</html>
