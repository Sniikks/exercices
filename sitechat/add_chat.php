<?php
session_start();

// Assurez-vous d'avoir une connexion PDO à votre base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=sitechat;charset=utf8', 'Sniikks', 'Aqwzsx03*');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}

// Sélectionnez tous les chats de la table "chat"
$query = "SELECT * FROM chat";
$stmt = $bdd->query($query);
$chatList = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="../style/sitechat/add_chat.css">  
    <title>Ajouter un chat</title>
</head>
<body>
    <nav>
        <span id="catfield-link" style="cursor: pointer;"><box-icon type='solid' name='cat' size='30px' color="#ff7f00"></box-icon>CATFIERLD</span>
        <script>
        document.getElementById("catfield-link").addEventListener("click", function() {
            window.location.href = "index.php"; // Redirige vers index.php
        });
        </script>
    </nav>
    <br><br><br>
    <h1>Ajouter un chat à la liste</h1>
    <form action="add_chat.php" method="post" enctype="multipart/form-data">
        <label for="description">Description :</label>
        <textarea id="description" name="description" required></textarea>
        
        <label for="image_url">URL de l'image :</label>
        <input type="text" id="photo_url" name="photo_url" required>
        
        <input type="submit" value="Ajouter le chat">
    </form>

<!-- Afficher la liste des chats -->
<?php foreach ($chatList as $chat) { ?>
<div class="item">
    <img class="photo" src="<?php echo $chat['photo']; ?>">
    <div class="text"><?php echo $chat['description']; ?></div>

    <!-- Formulaire de modification -->
    <form action="add_chat.php" method="post">
        <input type="hidden" name="chat_id" value="<?php echo $chat['id']; ?>">
        <label for="new_description">Nouvelle Description :</label>
        <input type="text" id="new_description" name="new_description" required>
        <input type="submit" value="Modifier la description">
    </form>
    
    <!-- Bouton Supprimer -->
    <form action="delete_chat.php" method="post">
        <input type="hidden" name="chat_id" value="<?php echo $chat['id']; ?>">
        <input type="submit" value="Supprimer">
    </form>
</div>
<?php } ?>

    <?php
// Assurez-vous d'avoir une connexion PDO à votre base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=sitechat;charset=utf8', 'Sniikks', 'Aqwzsx03*');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $description = $_POST['description'];
    $photoURL = $_POST['photo_url']; // Champ d'URL d'image
    
    // Vérifier si l'URL de l'image est valide
    if (!empty($photoURL)) {
        // Préparer la requête d'insertion
        $query = "INSERT INTO chat (description, photo) VALUES (:description, :photo)";
        
        // Préparer la requête avec les paramètres
        $stmt = $bdd->prepare($query);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':photo', $photoURL, PDO::PARAM_STR);
        
        // Exécuter la requête
        try {
            $stmt->execute();
            // Rediriger l'utilisateur ou afficher un message de succès
            header("Location: add_chat.php");
            exit();
        } catch (PDOException $e) {
            echo "Erreur lors de l'enregistrement du chat : " . $e->getMessage();
        }
    } else {
        echo "Veuillez entrer une URL d'image valide.";
    }
}
?>
</body>
</html>
