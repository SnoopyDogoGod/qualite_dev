<?php
$host = 'localhost';
$dbname = 'bdd_consulat';  // Remplace par le nom de ta base de données
$username = 'root';           // Utilisateur par défaut pour XAMPP
$password = '';               // Mot de passe vide par défaut pour XAMPP

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
