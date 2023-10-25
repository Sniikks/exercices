<?php
include("config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo = $_POST["pseudo"];
    $description = $_POST["description"];
    $hashedPassword = password_hash($_POST["password"], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (pseudo, password, description) VALUES ('$pseudo', '$hashedPassword', '$description')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php");
    } else {
        echo "Erreur : " . $conn->error;
    }
}
?>

<h2>Créer un utilisateur</h2>
<form method="post">
    Pseudo: <input type="text" name="pseudo" required><br>
    Mot de passe: <input type="password" name="password" required><br>
    Description: <textarea name="description" rows="4" required></textarea><br>
    <input type="submit" value="Créer">
</form>
