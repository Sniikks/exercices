<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="color.css">
    <title>Inscription</title>
</head>
<body>
    <div class="container">
        <h1>Inscription</h1>
        <form action="inscription.php" method="post">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
            
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="S'inscrire">
        </form>
    </div>


    <?php
    // Permet d'aller chercher le fichier ou se trouve la base de données.
    require_once('../function/db.php');

    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['password'], PASSWORD_DEFAULT);; // Hachage du mot de passe

    // Préparer la requête SQL d'insertion
    $sql = "INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe) VALUES (?, ?, ?, ?)";

    // Préparer la déclaration SQL
    $stmt = $connexion->prepare($sql);

    // Vérifier si la préparation a réussi
    if ($stmt === false) {
        die("Erreur de préparation de la requête : " . $connexion->error);
    }

    // Lier les paramètres et exécuter la requête
    $stmt->bind_param("ssss", $nom, $prenom, $email, $mot_de_passe);

    if ($stmt->execute()) {
        // L'inscription a réussi
        echo "Inscription réussie !";
    } else {
    // Erreur lors de l'inscription
        echo "Erreur lors de l'inscription : " . $stmt->error;
    }

    // Fermer la connexion
    $stmt->close();
    $connexion->close();
?>
    
</body>
</html>