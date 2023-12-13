<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- CRUD: CREATE, READ(SELECT), UPDATE, DELETE -->
    <!-- Vous allez avoir plusieurs fichier 
    Dans un dossier 'Views' vous avez: create.php, read.php, update.php
    Dans un dossier 'Controllers' vous avez: create_ctrl.php, read_ctrl.php, update_ctrl.php, delete_ctrl.php 

    Vous devez créer une base de donnée que vous nommerez crud avec interclassement 
    utf8_general_ci (mb3 ou mb4)

    Dans cette base de donnée, vous allez créer une table user avec 3 attributs id, pseudo, mot_de_passe, description

    L'id' sera un entier et la clé primaire de la table sera auto incrémenté
    "Pseudo" sera en varchar 255 tout comme "motDePasse"
    "description" sera en TEXT

    L'index.php affichera un tableau de user, chaque ligne de ce tableau affichera les informations 
    (id, pseudo, mot de passe hashé, description) de cet user et permettra aussi la suppression, 
    la modification et l'affichage d'un user via un bouton ou un lien
    L'index.php affichera  aussu un bouton permettant la création d'un user
    create.php affichera le formulaire de création d'user
    update.php affichera le formulaire prérempli d'user afin de la modifier
    read.php afficher une liste à puce des informations de l'user

    
-->

<?php
include("./controllers/config.php");

// Récupérer les utilisateurs depuis la base de données
$sql = "SELECT id, pseudo, description FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Pseudo</th><th>Description</th><th>Action</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["pseudo"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td><a href='./controllers/read_ctrl.php?id=" . $row["id"] . "'>Lire</a> | <a href='./controllers/update_ctrl.php?id=" . $row["id"] . "'>Modifier</a> | <a href='./controllers/delete_ctrl.php?id=" . $row["id"] . "'>Supprimer</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Aucun utilisateur trouvé.";
}

$conn->close();
?>
<a href="./controllers/create_ctrl.php">Créer un utilisateur</a>

    
</body>
</html>