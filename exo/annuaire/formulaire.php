<?php
    require_once('../../function/db.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
    <link rel="stylesheet" href="./css.css">
</head>
<body>
    <!-- Créer un formulaire en php qui resemble à celui ci : 
    https://cdn.discordapp.com/attachments/550289332812906504/1163773698625511424/image.png?ex=6540cbb7&is=652e56b7&hm=aa9c41f65f2692145768cac347b0c78eeb43e691f311679e1ab7d64bddde95a8&
    -->
    <!-- Il devra être fonctionnel et être incrémenter dans une base donnée
    dans une table qui s'appelle annuaire qui resembler à ceci :

CREATE TABLE `Annuaire` (
    `id_annuaire` INT(3) AUTO_INCREMENT PRIMARY KEY,
    `nom` VARCHAR(30),
    `prenom` VARCHAR(30),
    `telephone` INT(10) ZEROFILL,
    `profession` VARCHAR(30),
    `ville` VARCHAR(30),
    `codepostal` INT(5) ZEROFILL,
    `adresse` VARCHAR(30),
    `date_de_naissance` DATE,
    `sexe` ENUM('m', 'f'),
    `description` TEXT
);
-->
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

    // Préparez la requête SQL pour insérer les données dans la table "Annuaire"
    $sql = "INSERT INTO Annuaire (nom, prenom, telephone, profession, ville, codepostal, adresse, date_de_naissance, sexe, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    try {
        // Préparez la déclaration SQL avec PDO
        $i = $bdd->prepare($sql);

        // Liez les paramètres
        $i->execute([$nom, $prenom, $telephone, $profession, $ville, (strlen($code_postal) <= 0 ? NULL : $code_postal), (strlen($adresse) <= 0 ? NULL : $adresse), (strlen($date_naissance) <= 0 ? NULL : $date_naissance), $sexe, (strlen($description) <= 0 ? NULL : $description)]);


        echo "Formulaire validé avec succès.";
    } catch (PDOException $e) {
        echo "Erreur lors de la validation du formulaire : " . $e->getMessage();
    }
}
?>

<form action="" method="post">
<fieldset>
    <pre>
    <label for="nom">Nom*:</label>
    <input type="text" id="nom" name="nom" maxlength="30" required><br><br>

    <label for="prenom">Prénom*:</label>
    <input type="text" id="prenom" name="prenom" maxlength="30" required><br><br>

    <label for="telephone">Téléphone*:</label>
    <input type="text" id="telephone" name="telephone" mainength="10" maxlength="10" required><br><br>

    <label for="profession">Profession*:</label>
    <input type="text" id="profession" name="profession" maxlength="30" required><br><br>

    <label for="ville">Ville*:</label>
    <input type="text" id="ville" name="ville" maxlength="30" required><br><br>

    <label for="code_postal">Code Postal*:</label>
    <input type="text" id="code_postal" name="code_postal" minlength="5" maxlength="5" required><br><br>

    <label for="adresse">Adresse*:</label>
    <input type="text" id="adresse" name="adresse" cols="30" rows="2" maxlength="30" required><br><br>

    <label for="date_naissance">Date de naissance*:</label>
    <input type="date" id="date_naissance" name="date_naissance" value="2000-01-01" required><br><br>

    <label>Sexe*:</label>
    <input type="radio" id="sexe_homme" name="sexe" value="Homme" required>
    <label for="sexe_homme">Homme</label>
    <input type="radio" id="sexe_femme" name="sexe" value="Femme" required>
    <label for="sexe_femme">Femme</label><br><br>

    <label for="description">Description:</label><br>
    <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>

    <input type="submit" value="Valider">
    </pre>
</fieldset>
</form>

<a href="list.php">Aller dans la liste</a>

</body>
</html>