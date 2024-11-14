<?php
session_start();
include 'db_connection.php';
include 'functions.php';

// Récupération des champs du formulaire
$firstName = $_POST['first_name'] ?? '';
$lastName = $_POST['last_name'] ?? '';
$phoneNumber = $_POST['phone_number'] ?? '';
$email = $_POST['new_email'] ?? '';
$password = $_POST['new_password'] ?? '';
$confirmPassword = $_POST['confirm_password'] ?? '';

// Tableau pour les messages d'erreur
$errors = [];

// Vérification du prénom et du nom
if (empty($firstName)) $errors[] = "Le prénom est requis.";
if (empty($lastName)) $errors[] = "Le nom est requis.";

// Vérification du numéro de téléphone
if (!preg_match('/^0[0-9]{9}$/', $phoneNumber)) {
        $errors[] = "Le numéro de téléphone est invalide. Il doit contenir exactement 10 chiffres.";
}

// Vérification de l'email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "L'email entré est invalide.";
}

// Vérification du mot de passe
if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,32}$/', $password)) {
    $errors[] = "Mot de passe invalide. Il doit contenir une majuscule, une minuscule, un chiffre, un caractère spécial, et être de 8 à 32 caractères.";
}

// Vérification de la confirmation du mot de passe
if ($password !== $confirmPassword) {
    $errors[] = "Le mot de passe et sa confirmation ne sont pas identiques.";
}

// Si des erreurs sont détectées, on les affiche et arrête le script
if (!empty($errors)) {
    echo implode("\n", $errors);
    exit;
}

// Si tout est valide, ajout dans la base de données
try {
    $stmt = $pdo->prepare("INSERT INTO user (userId, first_name, last_name, phone_number, email, password, isResident, isAdmin, isLotterySubscribed) VALUES (UUID(), :first_name, :last_name, :phone_number, :email, :password, 0, 0, 0)");
    
    $stmt->execute([
        ':first_name' => $firstName,
        ':last_name' => $lastName,
        ':phone_number' => $phoneNumber,
        ':email' => $email,
        ':password' => $password
    ]);

    echo "Compte créé avec succès.";

} catch (PDOException $e) {
    if ($e->getCode() == 23000) { // Erreur pour clé unique violée (email déjà existant)
        echo "Cet email est déjà utilisé.";
    } else {
        echo "Erreur lors de la création du compte : " . $e->getMessage();
    }
}
?>
