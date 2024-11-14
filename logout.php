<?php
session_start();
session_unset(); // Supprime toutes les variables de session
session_destroy(); // Détruit la session

// Redirige vers la page d'accueil après déconnexion
header("Location: index.php");
exit();
?>