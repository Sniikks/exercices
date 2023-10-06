<?php
session_start();

// N'affiche pas la réussite dans l'url: http://localhost/exercices/sitechat/index.php?message=R%C3%A9servation+valid%C3%A9e+%21
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']); // Supprimez le message de la session pour qu'il ne soit pas réaffiché
    echo "<script>alert('$message');</script>";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="../style/sitechat/index.css">
    <title>Site Chat</title>
</head>
<body>
    <nav>
        <span><box-icon type='solid' name='cat' size='30px' color="#ff7f00"></box-icon>CATFIERLD</span>
        <ul>
            <?php
            if (isset($_SESSION['id'])) {
            } else {
                echo '<p>Veuillez vous connecter pour accéder aux fonctionnalités du site.</p>';
                echo '<li><button> <a href="./compte/register.php">Créer un compte</a></button></li>';
            }
            if (isset($_SESSION['grade'])) {
                // Si l'utilisateur est le chef, affichez le bouton.
                if ($_SESSION['grade'] == 'Client' || $_SESSION['grade'] == 'Employé' || $_SESSION['grade'] == 'Chef') {
                    echo '<li><a href="catlist.php"> CatList <box-icon name="down-arrow" type="solid" color="gray" size="13.5px"></box-icon></a></li>';
                }
            }
            if (isset($_SESSION['grade'])) {
                // Si l'utilisateur est un employé ou un chef, affichez le bouton.
                if ($_SESSION['grade'] == 'Employé' || $_SESSION['grade'] == 'Chef') {
                    echo '<li><a href="#"> Réservation <box-icon name="down-arrow" type="solid" color="gray" size="13.5px"></box-icon></a></li>';
                }
            }
            if (isset($_SESSION['grade'])) {
                // Si l'utilisateur est le chef, affichez le bouton.
                if ($_SESSION['grade'] == 'Chef') {
                    echo '<li><a href="./add_chat.php"> Stock <box-icon name="down-arrow" type="solid" color="gray" size="13.5px"></box-icon></a></li>';
                }
            }
            if (isset($_SESSION['id'])) {
                // Si l'utilisateur est connecté, affichez la déconnexion.
                echo '<li><button> <a href="./compte/deconnexion.php">Se Déconnecter</a></button></li>';
            } else {
                // Si l'utilisateur n'est pas connecté, affichez la connection.
                echo '<li><button> <a href="./compte/login.php">Se Connecter</a></button></li>';
            }
            ?>        
        </ul>
    </nav>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <footer>
        <div>

            <ul>
                <li><a href="">06 06 06 06 06</a></li>
                <li><a href="">11 rue des terres</a></li>
            </ul>

            <div class="signup">
                    <span><box-icon name='envelope' color="#ff7f00" size="55px"></box-icon> contact@catfierld.com</span>
                <p>Pour toute demande, veuillez nous contactez.</p>
                <button>Envoie mail</button>
            </div>
        </div>
        <div class="bar"></div>
        <div class="logo">
            <div>
                <box-icon type='logo' name='facebook-circle' color='#ffffff'></box-icon>
                <box-icon name='twitter' type='logo' color='#ffffff' ></box-icon>
                <box-icon name='linkedin-square' type='logo' color='#ffffff' ></box-icon>
                <box-icon name='youtube' type='logo' color='#ffffff' ></box-icon>
            </div>
            <span>&copy; Copyright 2021 INFRAGISTICS. All Rights Reserved</span>
            <div class="page">
                <a href="">Terms of Use</a>
                <a href="">Privacy Policy</a>
                <a href="">Cookies</a>
            </div>
        </div>
    </footer>
</body>
</html>