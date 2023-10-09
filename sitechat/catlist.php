<?php
session_start();

// Assurez-vous d'avoir une connexion PDO à votre base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=sitechat;charset=utf8', 'Sniikks', 'Aqwzsx03*');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}

// Récupérer les données des chats depuis la base de données
$query = "SELECT * FROM chat";
$stmt = $bdd->query($query);

// Bouclez à travers les résultats et affichez-les
$chatList = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="../style/sitechat/catlist.css">
    <title>Liste des Chats</title>
</head>
<body>
    <nav>
        <span id="catfield-link" style="cursor: pointer;"><box-icon type='solid' name='cat' size='30px' color="#ff7f00"></box-icon>CATFIERLD</span>
        <script>
        document.getElementById("catfield-link").addEventListener("click", function() {
            window.location.href = "index.php"; // Redirige vers index.php
        });
        </script>
    
    <div class="container">
            <b><p><h1>VOICI LES DIFFERENTS CHATS</h1></p></b>
            <div class="container1">
                <?php foreach ($chatList as $chat) { ?>
                <div class="item">
                    <img class="photo" src="<?php echo $chat['photo']; ?>">
                    <div class="text"><?php echo $chat['description']; ?></div>
                    <?php
                    $id = rand(1, 30); // Génère un ID aléatoire entre 1 et 30
                    ?>
                    <button><a href="reservation.php?id=<?php echo $id; ?>">Réserver</a></button>
                </div>
                <?php } ?>
            </div>
        </div>
    </nav>
</body>
</html>