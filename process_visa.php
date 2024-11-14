<?php

session_start();
ob_start(); 
require_once __DIR__ . '/libs/fpdf186/fpdf.php';

include 'db_connection.php';
header('Content-Type: application/json'); // Définit la réponse en JSON
$errors = [];


// 1. Vérification des champs obligatoires
$last_name = $_POST['last_name'] ?? '';
$first_name = $_POST['first_name'] ?? '';
$country_of_origin = $_POST['country_of_origin'] ?? '';
$stay_start = $_POST['stay_start'] ?? '';
$stay_end = $_POST['stay_end'] ?? '';
$card_number = $_POST['card_number'] ?? '';
$card_expiry = $_POST['card_expiry'] ?? '';
$card_cvc = $_POST['card_cvc'] ?? '';

// Vérifie les champs de texte
if (empty($last_name)) $errors[] = "Le nom est requis.";
if (empty($first_name)) $errors[] = "Le prénom est requis.";
if (empty($country_of_origin)) $errors[] = "Le pays d'origine est requis.";

// 2. Vérification des dates de séjour
$today = new DateTime();
if (!empty($stay_start) && !empty($stay_end)) {
    $start_date = new DateTime($stay_start);
    $end_date = new DateTime($stay_end);

    if ($start_date < $today) {
        $errors[] = "La date de début de séjour doit être dans le futur.";
    }
    if ($end_date <= $start_date) {
        $errors[] = "La date de fin de séjour doit être postérieure à la date de début.";
    }
} else {
    $errors[] = "Les dates de séjour sont requises.";
}


// 3. Vérification du numéro de carte bancaire (16 chiffres et valide)
function validate_card_number($number) {
    $number = strrev(preg_replace('/[^\d]/', '', $number));
    $sum = 0;

    for ($i = 0; $i < strlen($number); $i++) {
        $digit = $number[$i];
        if ($i % 2 === 1) {
            $digit *= 2;
            if ($digit > 9) {
                $digit -= 9;
            }
        }
        $sum += $digit;
    }
    return ($sum % 10) === 0;
}

if (!preg_match('/^\d{16}$/', $card_number) || !validate_card_number($card_number)) {
    $errors[] = "Le numéro de carte bancaire est invalide.";
}


// 4. Vérification de la date d'expiration de la carte (format MM/YY et non passée)
if (!empty($card_expiry)) {
    if (preg_match('/^(0[1-9]|1[0-2])\/\d{2}$/', $card_expiry)) {
        list($expiry_month, $expiry_year) = explode('/', $card_expiry);
        $expiry_year = '20' . $expiry_year; // Convertit l'année en format YYYY
        $expiry_date = new DateTime("$expiry_year-$expiry_month-01");

        if ($expiry_date < $today) {
            $errors[] = "La date d'expiration de la carte bancaire ne peut pas être dans le passé.";
        }
    } else {
        $errors[] = "La date d'expiration de la carte doit être au format MM/YY.";
    }
} else {
    $errors[] = "La date d'expiration de la carte est requise.";
}


// 5. Vérification du CVC (3 chiffres)
if (!preg_match('/^\d{3}$/', $card_cvc)) {
    $errors[] = "Le code CVC doit comporter 3 chiffres.";
}


// 6. Vérification du pays d'origine dans la liste noire
$blacklist_query = $pdo->prepare("SELECT COUNT(*) FROM country_blacklist WHERE country = :country");
$blacklist_query->execute([':country' => $country_of_origin]);
$is_blacklisted = $blacklist_query->fetchColumn();

if ($is_blacklisted) {
    $errors[] = "Le pays d'origine est sur la liste noire et ne peut pas faire de demande.";
}

$upload_dir = 'user_doc/';

/*
// Vérification et traitement du fichier passeport
if (isset($_FILES['passport_file']) && $_FILES['passport_file']['error'] === UPLOAD_ERR_OK) {
    $fileType = mime_content_type($_FILES['passport_file']['tmp_name']);
    $allowed_types = ['image/png', 'image/jpeg', 'application/pdf'];
    
    if (in_array($fileType, $allowed_types)) {
        // Déplacer le fichier dans le dossier user_doc
        $passport_destination = $upload_dir . basename($_FILES['passport_file']['name']);
        move_uploaded_file($_FILES['passport_file']['tmp_name'], $passport_destination);
    } else {
        $errors[] = "Le fichier de passeport doit être en format PNG, JPG ou PDF.";
    }
} else {
    $errors[] = "Erreur lors de l'upload du fichier passeport.";
}

*/
/*
// Vérification et traitement du fichier photo d'identité
if (isset($_FILES['id_photo']) && $_FILES['id_photo']['error'] === UPLOAD_ERR_OK) {
    $fileType = mime_content_type($_FILES['id_photo']['tmp_name']);
    
    if (in_array($fileType, $allowed_types)) {
        // Déplacer le fichier dans le dossier user_doc
        $photo_destination = $upload_dir . basename($_FILES['id_photo']['name']);
        move_uploaded_file($_FILES['id_photo']['tmp_name'], $photo_destination);
    } else {
        $errors[] = "La photo d'identité doit être en format PNG, JPG ou PDF.";
    }
} else {
    $errors[] = "Erreur lors de l'upload du fichier photo d'identité.";
}
*/
if (!empty($errors)) {
    echo json_encode(['errors' => $errors]);
} else {
    // Création d'un nouveau document PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    //$pdf->SetFont('Arial', 'B', 16);

    // Titre du PDF
    //$pdf->Cell(0, 10, 'Demande de Visa', 0, 1, 'C');
    //$pdf->Ln(10);

    // Informations personnelles
    //$pdf->SetFont('Arial', '', 12);
    //$pdf->Cell(0, 10, 'Nom : ' . $last_name, 0, 1);
    //$pdf->Cell(0, 10, 'Prénom : ' . $first_name, 0, 1);
    //$pdf->Cell(0, 10, "Pays d'origine : " . $country_of_origin, 0, 1);
    //$pdf->Cell(0, 10, 'Date de début de séjour : ' . $stay_start, 0, 1);
    //$pdf->Cell(0, 10, 'Date de fin de séjour : ' . $stay_end, 0, 1);


    // Ajout de la signature
    //$pdf->Ln(20);
    //$pdf->Cell(0, 10, 'Signature :', 0, 1);
    //$pdf->Image('images/tampon.jpg', 10, $pdf->GetY(), 40); 
    // Enregistrer le PDF dans un dossier ou l'envoyer directement
    $pdf_path = 'user_doc/demande_visa_.pdf'; //' . time() . '
    ob_end_clean();
    if (file_exists($pdf_path)) {
        echo json_encode([
            'success' => "Demande de visa réussie !",
            'pdf_url' => $pdf_path
        ]);
    } else {
        echo json_encode([
            'errors' => ["Erreur lors de la génération du PDF."]
        ]);
    }
}
exit();
