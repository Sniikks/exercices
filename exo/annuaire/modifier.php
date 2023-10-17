<!-- modifier.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Modifier l'enregistrement</title>
</head>
<body>
    <?php
    // Inclure le fichier de connexion à la base de données
    require_once('../../function/db.php');

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id_annuaire = $_GET['id'];

        // Récupérer les données actuelles de l'enregistrement
        $sql = "SELECT * FROM Annuaire WHERE id_annuaire = ?";
        $i = $bdd->prepare($sql);

        if ($i) {
            $i->bindParam(1, $id_annuaire, PDO::PARAM_INT);

            if ($i->execute()) {
                $row = $i->fetch();
            }
        }

        if (!$row) {
            echo "ID d'enregistrement invalide.";
            exit;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Récupérer les données du formulaire
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $telephone = $_POST["telephone"];
        $profession = $_POST["profession"];
        $ville = $_POST["ville"];
        $codepostal = $_POST["codepostal"];
        $adresse = $_POST["adresse"];
        $date_naissance = $_POST["date_naissance"];
        $sexe = $_POST["sexe"];
        $description = $_POST["description"];

        // Préparer la requête SQL pour mettre à jour l'enregistrement
        $sql = "UPDATE Annuaire SET nom = ?, prenom = ?, telephone = ?, profession = ?, ville = ?, codepostal = ?, adresse = ?, date_de_naissance = ?, sexe = ?, description = ? WHERE id_annuaire = ?";

        $i = $bdd->prepare($sql);

        if ($i) {
            $i->bindParam(1, $nom, PDO::PARAM_STR);
            $i->bindParam(2, $prenom, PDO::PARAM_STR);
            $i->bindParam(3, $telephone, PDO::PARAM_INT);
            $i->bindParam(4, $profession, PDO::PARAM_STR);
            $i->bindParam(5, $ville, PDO::PARAM_STR);
            $i->bindParam(6, $codepostal, PDO::PARAM_INT);
            $i->bindParam(7, $adresse, PDO::PARAM_STR);
            $i->bindParam(8, $date_naissance, PDO::PARAM_STR);
            $i->bindParam(9, $sexe, PDO::PARAM_STR);
            $i->bindParam(10, $description, PDO::PARAM_STR);
            $i->bindParam(11, $id_annuaire, PDO::PARAM_INT);

            if ($i->execute()) {
                echo "L'enregistrement a été mis à jour avec succès.";
            } else {
                echo "Erreur lors de la mise à jour de l'enregistrement : " . $i->errorInfo()[2];
            }

            // Fermer la déclaration SQL
            $i->closeCursor();
        }
    }
    ?>
    <h2>Modifier l'enregistrement</h2>
    <form method="post">
        <label for="nom">Nom*:</label>
        <input type="text" id="nom" name="nom" value="<?php echo $row['nom']; ?>" required><br><br>

        <label for="prenom">Prénom*:</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo $row['prenom']; ?>" required><br><br>

        <label for="telephone">Téléphone*:</label>
        <input type="telephone" id="telephone" name="telephone" value="<?php echo $row['telephone']; ?>" required><br><br>

        <label for="profession">Profession*:</label>
        <input type="text" id="profession" name="profession" value="<?php echo $row['profession']; ?>" required><br><br>

        <label for="ville">Ville*:</label>
        <input type="text" id="ville" name="ville" value="<?php echo $row['ville']; ?>" required><br><br>

        <label for="codepostal">Code Postal*:</label>
        <input type="codepostal" id="codepostal" name="codepostal" value="<?php echo $row['codepostal']; ?>" required><br><br>

        <label for="adresse">Adresse*:</label>
        <input type="text" id="adresse" name="adresse" value="<?php echo $row['adresse']; ?>" required><br><br>

        <label for="date_naissance">Date de naissance*:</label>
        <input type="date" id="date_naissance" name="date_naissance" value="<?php echo $row['date_de_naissance']; ?>" required><br><br>

        <label>Sexe*:</label>
        <input type="radio" id="sexe_homme" name="sexe" value="Homme" required <?php if ($row['sexe'] === 'Homme') echo 'checked'; ?>>
        <label for="sexe_homme">Homme</label>
        <input type="radio" id="sexe_femme" name="sexe" value="Femme" required <?php if ($row['sexe'] === 'Femme') echo 'checked'; ?>>
        <label for="sexe_femme">Femme</label><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50"><?php echo $row['description']; ?></textarea><br><br>

        <input type="submit" value="Enregistrer les modifications">
    </form>
    <a href="formulaire.php">Retour au formulaire</a>
    <br>
    <a href="list.php">Retour à la liste</a>
</body>
</html>
