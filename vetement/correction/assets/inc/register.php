<div class="conteneurRegister">
    <div class="register">            
        <button>S'enregistrer</button>
        <form method="post" action="./assets/controllers/RegisterCtrl.php">
            <fieldset>
                <label for="pseudo">Nom d'utilisateur </label>
                <input type="text" id="pseudo" name="pseudo" required/><br><br>
                <label for="email">Adresse Email </label>
                <input type="email" id="email" name="email" required/><br><br>
                <label for="mdp">Mot de passe </label>
                <input type="password" id="mdp" name="password" required/><br>
            </fieldset>
            <button>S'inscrire</button>
        </form>            
        <button onclick="OpenLoginMenu()">Déjà un compte ?</button>
    </div>
</div>