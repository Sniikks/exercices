
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./atm.css">>
    <title>Connexion</title>
</head>
<body>
    <div class="container">
        <h1>Connexion</h1>
        <form action="process_login.php" method="post">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
            
            <input type="submit" value="Se connecter">
        </form>
        
        <div class="links">
            <a href="inscription.php">Créer un compte</a>
            <a href="mot_de_passe_oublie.php">Mot de passe oublié</a>
        </div>
    </div>
</body>
</html>