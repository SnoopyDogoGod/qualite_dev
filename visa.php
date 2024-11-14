<?php
session_start();
include 'db_connection.php';

// Redirige vers la page de connexion si l'utilisateur n'est pas connecté
if (!isset($_SESSION['userId'])) {
    header("Location: login.php");
    exit();
}
?>

<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande de Visa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container py-5">
        <!-- Section d'explication -->
        <section class="mb-4">
            <h2 class="text-center mb-3">Demande de Visa</h2>
            <p class="lead">Bienvenue sur le formulaire de demande de visa pour la France. Veuillez remplir attentivement chaque section avec vos informations personnelles et de voyage. Assurez-vous d'avoir tous les documents nécessaires, comme votre passeport et une photo d'identité récente.</p>
        </section>

    <form id="visaForm" action="process_visa.php" method="POST">
        <section class="visa-section mb-4 p-4">
            <h3>Informations personnelles</h3>
            <div class="mb-3">
                <label for="last_name">Nom :</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
            <div class="mb-3">
                <label for="first_name">Prénom :</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>

            <div class="mb-3">
                <label for="country_of_origin">Pays d'origine :</label>
                <select id="country_of_origin" name="country_of_origin" required>
                    <option value="">--Choisissez votre pays--</option>
                    <option value="Afghanistan">Afghanistan</option>
                    <option value="Afrique du Sud">Afrique du Sud</option>
                    <option value="Algérie">Algérie</option>
                    <option value="Allemagne">Allemagne</option>
                    <option value="Angola">Angola</option>
                    <option value="Arabie Saoudite">Arabie Saoudite</option>
                    <option value="Argentine">Argentine</option>
                    <option value="Australie">Australie</option>
                    <option value="Belgique">Belgique</option>
                    <option value="Bénin">Bénin</option>
                    <option value="Brésil">Brésil</option>
                    <option value="Burkina Faso">Burkina Faso</option>
                    <option value="Burundi">Burundi</option>
                    <option value="Cameroun">Cameroun</option>
                    <option value="Canada">Canada</option>
                    <option value="Chine">Chine</option>
                    <option value="Colombie">Colombie</option>
                    <option value="République centrafricaine">République centrafricaine</option>
                    <option value="Congo">Congo</option>
                    <option value="République démocratique du Congo">République démocratique du Congo</option>
                    <option value="Corée du Sud">Corée du Sud</option>
                    <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                    <option value="Danemark">Danemark</option>
                    <option value="Djibouti">Djibouti</option>
                    <option value="Égypte">Égypte</option>
                    <option value="Espagne">Espagne</option>
                    <option value="États-Unis">États-Unis</option>
                    <option value="Éthiopie">Éthiopie</option>
                    <option value="France">France</option>
                    <option value="Gabon">Gabon</option>
                    <option value="Ghana">Ghana</option>
                    <option value="Grèce">Grèce</option>
                    <option value="Guinée">Guinée</option>
                    <option value="Inde">Inde</option>
                    <option value="Indonésie">Indonésie</option>
                    <option value="Irak">Irak</option>
                    <option value="Iran">Iran</option>
                    <option value="Italie">Italie</option>
                    <option value="Japon">Japon</option>
                    <option value="Kenya">Kenya</option>
                    <option value="Liban">Liban</option>
                    <option value="Libye">Libye</option>
                    <option value="Madagascar">Madagascar</option>
                    <option value="Mali">Mali</option>
                    <option value="Maroc">Maroc</option>
                    <option value="Mexique">Mexique</option>
                    <option value="Mozambique">Mozambique</option>
                    <option value="Niger">Niger</option>
                    <option value="Nigeria">Nigeria</option>
                    <option value="Norvège">Norvège</option>
                    <option value="Ouganda">Ouganda</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Pays-Bas">Pays-Bas</option>
                    <option value="Pérou">Pérou</option>
                    <option value="Philippines">Philippines</option>
                    <option value="Pologne">Pologne</option>
                    <option value="Portugal">Portugal</option>
                    <option value="Russie">Russie</option>
                    <option value="Royaume-Uni">Royaume-Uni</option>
                    <option value="Rwanda">Rwanda</option>
                    <option value="Sénégal">Sénégal</option>
                    <option value="Somalie">Somalie</option>
                    <option value="Soudan">Soudan</option>
                    <option value="Soudan du Sud">Soudan du Sud</option>
                    <option value="Syrie">Syrie</option>
                    <option value="Tchad">Tchad</option>
                    <option value="Tunisie">Tunisie</option>
                    <option value="Turquie">Turquie</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="Venezuela">Venezuela</option>
                    <option value="Viêt Nam">Viêt Nam</option>
                    <option value="Yémen">Yémen</option>
                    <option value="Zambie">Zambie</option>
                    <option value="Zimbabwe">Zimbabwe</option>
                </select>


            </div>
        </section>
        <section class="visa-section mb-4 p-4">
            <h3>Informations de voyage</h3>
            <div class="mb-3">
                <label for="stay_start">Date de début de séjour :</label>
                <input type="date" id="stay_start" name="stay_start" required>
            </div>
            <div class="mb-3">
                <label for="stay_end">Date de fin de séjour :</label>
                <input type="date" id="stay_end" name="stay_end" required>
            </div>
        </section>

        <!--
        <label for="passport_file">Passeport :</label>
        <input type="file" name="passport_file" accept=".png, .jpg, .jpeg, .pdf" >
        
        <label for="id_photo">Photo d'identitée</label>
        <input type="file" name="id_photo" accept=".png, .jpg, .jpeg, .pdf" >
-->
        <section class="visa-section mb-4 p-4">
            <h3>Informations de paiement</h3>
            <div class="mb-3">
                <label for="card_number">Numéro de carte bancaire :</label>
                <input type="text" id="card_number" name="card_number" pattern="\d{16}" placeholder="16 chiffres sans espaces" required>
            </div>
            <div class="mb-3">
                <label for="card_expiry">Date d'expiration de la carte :</label>
                <input type="month" id="card_expiry" name="card_expiry" required>
            </div>
            <div class="mb-3">
                <label for="card_cvc">Code CVC :</label>
                <input type="text" id="card_cvc" name="card_cvc" pattern="\d{3}" placeholder="3 chiffres" required>
            </div>
        </section>
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg">Faire la demande de visa</button>
        </div>
    </form>
</body>
</html>
<script>
document.getElementById("visaForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Empêche le rechargement de la page
    
    const formData = new FormData(this);

    fetch("process_visa.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.errors) {
            // Affiche les erreurs dans un pop-up
            alert(data.errors.join("\n"));
        } else if (data.success) {
            // Crée un résumé des données saisies
            let summary = `
                Résumé de votre demande de visa :
                - Nom : ${formData.get('last_name')}
                - Prénom : ${formData.get('first_name')}
                - Pays d'origine : ${formData.get('country_of_origin')}
                - Date de début de séjour : ${formData.get('stay_start')}
                - Date de fin de séjour : ${formData.get('stay_end')}
                - Numéro de carte : **** **** **** ${formData.get('card_number').slice(-4)}
                - Date d'expiration de la carte : ${formData.get('card_expiry')}
            `;
            
            alert(summary); // Affiche le résumé dans un pop-up
        }
    })
    .catch(error => console.error("Erreur:", error));
});
</script>