<?php
// Incluez le fichier de connexion à la base de données
require_once('../../function/db.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_annuaire = $_GET['id'];

    // Préparez la requête SQL pour supprimer l'enregistrement
    $sql = "DELETE FROM Annuaire WHERE id_annuaire = ?";

    // Préparez la déclaration SQL
    $stmt = $bdd->prepare($sql);

    if ($stmt) {
        // Liez le paramètre
        $stmt->bindParam(1, $id_annuaire, PDO::PARAM_INT);

        // Exécutez la requête de suppression
        if ($stmt->execute()) {
            echo "L'enregistrement a été supprimé avec succès.";
        } else {
            echo "Erreur lors de la suppression de l'enregistrement : " . $stmt->errorInfo()[2];
        }

        // Fermez la déclaration SQL
        $stmt->closeCursor();
    } else {
        echo "Erreur de préparation de la requête : " . $bdd->errorInfo()[2];
    }
} else {
    echo "ID d'enregistrement invalide.";
}

// Redirigez l'utilisateur vers la page de liste après la suppression (ou toute autre page souhaitée)
header("Location: list.php");
