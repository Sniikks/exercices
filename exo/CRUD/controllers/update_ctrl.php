<?php
include("config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $pseudo = $_POST["pseudo"];
    $description = $_POST["description"];

    $sql = "UPDATE users SET pseudo='$pseudo', description='$description' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php");
    } else {
        echo "Erreur : " . $conn->error;
    }
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT id, pseudo, description FROM users WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Utilisateur non trouvé.";
    }
}
?>

<h2>Modifier l'utilisateur</h2>
<form method="post">
    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
    Pseudo: <input type="text" name="pseudo" value="<?php echo $row["pseudo"]; ?>" required><br>
    Description: <textarea name="description" rows="4" required><?php echo $row["description"]; ?></textarea><br>
    <input type="submit" value="Modifier">
</form>
