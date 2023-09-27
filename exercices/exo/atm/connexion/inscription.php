<?php 
require_once('../../../function/db.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>
    <form action="" method="post">
        <label for="firstname">Prénom:</label>
        <input type="text" id="firstname" name="firstname" required><br><br>

        <label for="lastname">Nom:</label>
        <input type="text" id="lastname" name="lastname" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">S'inscrire</button>
    </form>

    <p>Déjà un compte? <a href="login.php">Connectez-vous ici</a></p>
    
    <?php
    if (isset($_POST) && !empty($_POST)) {
        $select = $bdd->prepare('SELECT * FROM site WHERE email=?');
        $select->execute(array( $_POST['email']));
        $select = $select->fetchAll();
        if (count($select) <= 0) {
            $insert = $bdd->prepare('INSERT INTO site(prenom, nom, email, mdp) VALUES (?, ?, ?, ?)');
            $insert->execute(array(
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['email'],
                sha1($_POST['password'])
            ));
        } else {
            echo "<script> alert('L\'email est déjà utilisé') </script>";
        }      
    }
?>

    <script>
        document.getElementById("signupForm").addEventListener("submit", function(event) {
            event.preventDefault();
            // Ajoutez ici le code pour enregistrer les informations d'inscription.
        });
        
    </script>
</body>
</html>