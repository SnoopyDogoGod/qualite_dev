<?php include 'header.php'; ?>
<main class="auth-main container py-5">
    <h1 class="text-center mb-4">Se connecter ou créer un compte</h1>

    <!-- Formulaire de connexion -->
    <div id="login-container" class="auth-form mb-5">
        <form id="login-form" action="login_process.php" method="POST">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" class="form-control mb-3" required>
            
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" class="form-control mb-3" required>
            
            <button type="submit" class="btn btn-primary btn-lg w-100">Connexion</button>
        </form>
        <p class="mt-3">Pas encore de compte ? <a href="#" id="show-signup">Créer un compte</a></p>
    </div>

    <!-- Formulaire d'inscription -->
    <div id="signup-container" class="auth-form" style="display: none;">
        <form id="signup-form" action="signup_process.php" method="POST">
            <label for="first_name">Prénom :</label>
            <input type="text" id="first_name" name="first_name" class="form-control mb-3" required>
            
            <label for="last_name">Nom :</label>
            <input type="text" id="last_name" name="last_name" class="form-control mb-3" required>
            
            <label for="phone_number">Numéro de téléphone :</label>
            <input type="tel" id="phone_number" name="phone_number" pattern="^0[0-9]{9}$" placeholder="ex: 0123456789" class="form-control mb-3" required>
            
            <label for="new_email">Email :</label>
            <input type="email" id="new_email" name="new_email" class="form-control mb-3" required>
            
            <label for="new_password">Mot de passe :</label>
            <input type="password" id="new_password" name="new_password" class="form-control mb-3" required>
            
            <label for="confirm_password">Confirmer le mot de passe :</label>
            <input type="password" id="confirm_password" name="confirm_password" class="form-control mb-3" required>
            
            <button type="submit" class="btn btn-primary btn-lg w-100">Créer un compte</button>
        </form>
        <p class="mt-3">Déjà un compte ? <a href="#" id="show-login">Se connecter</a></p>
    </div>

    <script src="script.js"></script>
</main>

<?php include 'footer.php'; ?>
