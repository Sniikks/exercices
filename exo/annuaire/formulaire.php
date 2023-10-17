<?php
    require_once('../../function/db.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
</head>
<body>
    <?php
    // Vérifiez si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérez les données du formulaire
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $telephone = $_POST["telephone"];
        $profession = $_POST["profession"];
        $ville = $_POST["ville"];
        $code_postal = $_POST["code_postal"];
        $adresse = $_POST["adresse"];
        $date_naissance = $_POST["date_naissance"];
        $sexe = $_POST["sexe"];
        $description = $_POST["description"];

        // Vérifiez si le code postal et le téléphone sont des nombres
        if (!is_numeric($code_postal) || !is_numeric($telephone)) {
            echo "Le code postal et le téléphone doivent être des nombres.";
        } else {
            // Préparez la requête SQL pour insérer les données dans la table "Annuaire"
            $sql = "INSERT INTO Annuaire (nom, prenom, telephone, profession, ville, codepostal, adresse, date_de_naissance, sexe, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            try {
                // Préparez la déclaration SQL avec PDO
                $i = $bdd->prepare($sql);

                // Liez les paramètres
                $i->execute([$nom, $prenom, $telephone, $profession, $ville, $code_postal, $adresse, $date_naissance, $sexe, $description]);

                echo "Formulaire validé avec succès.";
            } catch (PDOException $e) {
                echo "Erreur lors de la validation du formulaire : " . $e->getMessage();
            }
        }
    }
    ?>

    <h2>Formulaire d'inscription</h2>
    <form action="" method="post">
        <label for="nom">Nom*:</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="prenom">Prénom*:</label>
        <input type="text" id="prenom" name="prenom" required><br><br>

        <label for="telephone">Téléphone*:</label>
        <input type="text" id="telephone" name="telephone" required><br><br>

        <label for="profession">Profession*:</label>
        <input type="text" id="profession" name="profession" required><br><br>

        <label for="ville">Ville*:</label>
        <input type="text" id="ville" name="ville" required><br><br>

        <label for="code_postal">Code Postal*:</label>
        <input type="text" id="code_postal" name="code_postal" required><br><br>

        <label for="adresse">Adresse*:</label>
        <input type="text" id="adresse" name="adresse" required><br><br>

        <label for="date_naissance">Date de naissance*:</label>
        <input type="date" id="date_naissance" name="date_naissance" required><br><br>

        <label>Sexe*:</label>
        <input type="radio" id="sexe_homme" name="sexe" value="Homme" required>
        <label for="sexe_homme">Homme</label>
        <input type="radio" id="sexe_femme" name="sexe" value="Femme" required>
        <label for="sexe_femme">Femme</label><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>

        <input type="submit" value="Valider">
    </form>

    <a href="list.php">Aller dans la liste</a>

</body>
</html>
