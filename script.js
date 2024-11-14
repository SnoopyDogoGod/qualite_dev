document.addEventListener("DOMContentLoaded", function() {
    // Fonction pour afficher le formulaire de création de compte
    function showSignup() {
        document.getElementById('login-container').style.display = 'none';
        document.getElementById('signup-container').style.display = 'block';
    }

    // Fonction pour afficher le formulaire de connexion
    function showLogin() {
        document.getElementById('signup-container').style.display = 'none';
        document.getElementById('login-container').style.display = 'block';
    }

    // Attacher les événements aux liens de basculement
    document.getElementById("show-signup").onclick = showSignup;
    document.getElementById("show-login").onclick = showLogin;

    // Écouteur de soumission AJAX pour le formulaire de création de compte
    document.getElementById('signup-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Empêche le rechargement de la page
        console.log("Soumission AJAX déclenchée");

        const formData = new FormData(this);

        fetch('signup_process.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log("Réponse du serveur :", data); // Pour vérifier la réponse
            alert(data); // Affiche le message reçu
        })
        .catch(error => console.error('Erreur:', error));
    });

    
    const confirmPasswordField = document.getElementById('confirm_password');
    confirmPasswordField.addEventListener('paste', function(event) {
        event.preventDefault();
        alert("Le collage n'est pas autorisé dans ce champ.");

    });

    document.getElementById('login-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Empêche le rechargement de la page

        const formData = new FormData(this);

        fetch('login_process.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            alert(data); // Affiche le message reçu dans un pop-up
        })
        .catch(error => console.error('Erreur:', error));
    });

    document.getElementById('login-form').addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this);

        fetch('login_process.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            if (data.trim() === "Connexion réussie") {
                window.location.href = "index.php"; // Redirige après connexion
            } else {
                alert(data); // Affiche le message d’erreur
            }
        })
        .catch(error => console.error('Erreur:', error));
    });
});
