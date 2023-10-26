<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    // Vérifiez si l'utilisateur existe avant de le supprimer
    $checkUserSql = "SELECT id FROM users WHERE id = $id";
    $result = $conn->query($checkUserSql);

    if ($result->num_rows > 0) {
        $deleteSql = "DELETE FROM users WHERE id = $id";

        if ($conn->query($deleteSql) === TRUE) {
            echo "Utilisateur supprimé avec succès.";
            header("Location: ../index.php");
        } else {
            echo "Erreur lors de la suppression de l'utilisateur : " . $conn->error;
        }
    } else {
        echo "Utilisateur non trouvé.";
    }
} else {
    echo "ID de l'utilisateur non spécifié.";
}

$conn->close();
?>
