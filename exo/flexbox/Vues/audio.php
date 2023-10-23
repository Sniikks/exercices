<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
    <title>Audio</title>
    <style>
        a[href='Vues/audio.php'] {
            color: red;
        }
    </style>
</head>
<body>
    <?php
    include('../inc/nav.php')
    ?>
    <div class="Balise">
        <h2>LA Balise <\audio>: Le son sur une page HTML</h2>
        <p>C'est avec l'attribut src que l'on indique le chemin vers le fichier voulu.</p>
        <h3>
            <\audio controls><br><br>
                <\source src="monAudio.mp3" type="audio/mpeg"><br>
                <\source src="monAudio.ogg" type="audio/ogg"><br>
                <\p><br>Votre navigateur ne prend pas en chage l'audio HTML
                    Voici un <\a href='monAudio.mp3'>lien verse le audio<\/a><br>
                <\/p><br><br>
            <\/audio><br>
        </h3>
    </div>
    <audio controls>
        <source src="../Public/Audios/music.mp3" type="audio/mpeg">
    </audio>
</body>
</html>