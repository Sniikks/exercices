<?php
include("config.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT id, pseudo, description FROM users WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h2>Informations de l'utilisateur</h2>";
        echo "<ul>";
        echo "<li>ID: " . $row["id"] . "</li>";
        echo "<li>Pseudo: " . $row["pseudo"] . "</li>";
        echo "<li>Description: " . $row["description"] . "</li>";
        echo "</ul>";
    } else {
        echo "Utilisateur non trouvé.";
    }
} else {
    echo "ID de l'utilisateur non spécifié.";
}
echo "<td><a href='../index.php" . "'>Retour</a>";
?>
