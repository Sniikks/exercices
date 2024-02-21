<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <script src="../assets/script/fonction.js"></script>

    <link rel="stylesheet" href="../assets/style/All.css">
    <link rel="stylesheet" href="../assets/style/Header.css">
    <link rel="stylesheet" href="../assets/style/Section.css">
    <link rel="stylesheet" href="../assets/style/Profil.css">
    <link rel="stylesheet" href="../assets/style/Connexion.css">
    <link rel="stylesheet" href="../assets/style/Register.css"/>

    <title>Profil</title>
</head>
<body>
    <?php
        include('../assets/inc/header.php');
        include('../assets/inc/connexion.php');
        include('../assets/inc/register.php');
        include('../assets/inc/slidebar.php');
    ?>
    <main  class="profil">
        <form method="post">
            <fieldset>
                <label for="pseudo">Nom d'utilisateur</label><br>
                <input type="text" name="pseudo" id="pseudo" readonly value="<?php
                    echo $_SESSION['pseudo']
                ?>"><br>
            </fieldset>
            <fieldset>
                <label for="email">Email</label><br>
                <input type="email" name="email" id="email" readonly value="<?php
                    echo $_SESSION['email']
                ?>"><br>
            </fieldset>
            <fieldset>
                <label for="motdepasse">Mot de passe</label><br>
                <input type="password" name="password" id="password" readonly value="<?php
                    echo $_SESSION['password']
                ?>"><br>
            </fieldset>
            <button type="submit">Modifier le profil</button>

        </form>
    </main>
</body>
</html>