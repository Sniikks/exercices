<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">    
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="./assets/script/fonction.js"></script>
    <link rel="stylesheet" href="./assets/style/Header.css">
    <link rel="stylesheet" href="./assets/style/Section.css">
    <link rel="stylesheet" href="./assets/style/Main.css">
    <link rel="stylesheet" href="./assets/style/Connexion.css">
    <link rel="stylesheet" href="./assets/style/Register.css"/>


    <title>Site De Vêtement</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <?php
        include('./assets/inc/header.php');
        include('./assets/inc/connexion.php');
        include('./assets/inc/register.php');
    ?>
    <section>
        <button>Nom D'utilisateur</button>
        <div>
            <button>Profil</button>
            <button>Paramètres</button>
            <button>Mode Nuit</button>
            <button>Déconnexion</button>
        </div>
    </section>
    <main>
        <h2>Tendances Du Moment</h2>
        <div class="swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="./assets/images/Famille.png" alt="Famille"></div>
                <div class="swiper-slide"><img src="./assets/images/Pyjama.png" alt="Pyjamas"></div>
                <div class="swiper-slide"><img src="./assets/images/Ensemble Rouge.png" alt="Ensemble Rouge"></div>
                <div class="swiper-slide"><img src="./assets/images/Salopette.jpg" alt="Salopettes"></div>
                <div class="swiper-slide"><img src="./assets/images/Manteau Robe.jpg" alt="Manteaux Robes"></div>
                <div class="swiper-slide"><img src="./assets/images/Blazer.jpg" alt="Blazer"></div>
            </div>
            <div class="swiper-pagination"></div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

        </div>
        <script src="./assets/script/swiper.js"></script>
    </main>
</body>
</html>