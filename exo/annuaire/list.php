<?php
    require_once('../../function/db.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Il devra avoir un tableau HTML qui récupère toute les lignes de la 
    base de donnée annuaire 

    En devra avoir la possibilité de modifier certaine ligne ou supprimé-->

    <?php
// Récupérez les données de la base de données en utilisant la connexion PDO $bdd
$sql = "SELECT * FROM Annuaire";
$result = $bdd->query($sql);

if ($result->rowCount() > 0) {
    echo "<table border='1'>";
    echo "<tr>
    <th>ID</th>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Téléphone</th>
    <th>Profession</th>
    <th>Ville</th>
    <th>Code Postal</th>
    <th>Adresse</th>
    <th>Date de Naissance</th>
    <th>Sexe</th>
    <th>Description</th>
    <th>Actions</th>
    </tr>";

    while ($row = $result->fetch()) {
        echo "<tr>";
        echo "<td>" . $row["id_annuaire"] . "</td>";
        echo "<td>" . $row["nom"] . "</td>";
        echo "<td>" . $row["prenom"] . "</td>";
        echo "<td>" . $row["telephone"] . "</td>";
        echo "<td>" . $row["profession"] . "</td>";
        echo "<td>" . $row["ville"] . "</td>";
        echo "<td>" . $row["codepostal"] . "</td>";
        echo "<td>" . $row["adresse"] . "</td>";
        echo "<td>" . $row["date_de_naissance"] . "</td>";
        echo "<td>" . $row["sexe"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td><a href='modifier.php?id=" . $row["id_annuaire"] . "'>Modifier</a> | <a href='supprimer.php?id=" . $row["id_annuaire"] . "'>Supprimer</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Aucune donnée trouvée dans la base de données.";
}
?>

<a href="formulaire.php">Retour au formulaire</a>

</body>
</html>