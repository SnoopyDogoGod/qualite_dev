<?php
include 'functions.php';
include 'db_connection.php';
session_start();
ob_start();
$email = $_POST['email'];
$password = $_POST['password'];

// Validation de l'email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    displayMessage("L'email entré est invalide");
    exit;
}

// Requête pour récupérer l'utilisateur correspondant à l'email
try {
    $stmt = $pdo->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérification du mot de passe
    if ($user && $password == $user['password']) {
        session_unset();
        // Stocke les informations de l'utilisateur dans la session
        $_SESSION['userId'] = $user['userId'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['isAdmin'] = $user['isAdmin'];

        echo "Connexion réussie"; // Indique que la connexion a réussi
    } else {
        echo "Email ou mot de passe incorrect.";
    }

} catch (PDOException $e) {
    displayMessage("Erreur lors de la connexion : " . $e->getMessage());
}
?>
