<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="../style/sitechat/catlist.css">
    <title>Site Chat</title>
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
                <div class="item">
                    <img class="photo" src="./image/image1.jpg">
                    <div class="text">Philippe, est le 1er chat à être arrivé dans le bar, il nous accompagne depuis 10 ans maintenant, il adore manger.</div>
                    <?php
                    $id = rand(1, 30); // Génère un ID aléatoire entre 1 et 30
                    ?>
                    <button><a href="reservation.php?id=<?php echo $id; ?>">Réserver</a></button>
                </div>
                <div class="item">
                    <img class="photo" src="./image/image2.jpg">
                    <div class="text">Jean, le petit chat qui vient d'arriver ce mois-ci et qui vient d'être élu le chat du moment.</div>
                    <?php
                    $id = rand(1, 30); // Génère un ID aléatoire entre 1 et 30
                    ?>
                    <button><a href="reservation.php?id=<?php echo $id; ?>">Réserver</a></button>
                </div>
            </div>
        </div>
    </nav>
</body>
</html>