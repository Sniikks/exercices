<div class="conteneurLogin">
    <div class="connexion">            
        <button>Se connecter</button>
        <form method="post" action="./assets/controllers/LoginCtrl.php">
            <fieldset>
                <label for="pseudo">Nom d'utilisateur </label>
                <input type="text" id="pseudo" name="pseudo" required/><br><br>
                <label for="mdp">Mot de passe </label>
                <input type="password" id="mdp" name="password" required/><br>
            </fieldset>
            <br><br><br>
            <button>Se Connecter</button>
        </form>            
        <button onclick="OpenRegisterMenu()">Aucun compte ?</button>

    </div>
</div>