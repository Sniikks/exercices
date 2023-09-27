<!DOCTYPE html>
<html>
<head>
    <title>Page de Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <form id="loginForm">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Se connecter</button>
    </form>

    <p>Pas encore de compte? <a href="inscription.php">Inscrivez-vous ici</a></p>

    <?php
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = ($_POST['password']); // Assurez-vous d'utiliser une bonne méthode de hachage
    
        // Vérifiez les informations de connexion dans la base de données
        $select = $bdd->prepare('SELECT * FROM site WHERE email=? AND mdp=?');
        $select->execute(array($email, $password));
        $user = $select->fetch(PDO::FETCH_ASSOC);
    
        if ($user) {
            // Stockez le nom et le prénom de l'utilisateur dans la session
            $_SESSION['nomUtilisateur'] = $user['nom'];
            $_SESSION['prenomUtilisateur'] = $user['prenom'];
    
            // Redirigez l'utilisateur vers la page d'accueil
            header('Location: accueil.php');
            exit();
        }}
    ?>

    <script>
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            event.preventDefault();
        });
    </script>
    
</body>
</html>