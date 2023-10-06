<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="../style/sitechat/index.css">
    <title>Réservation</title>
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

    <br>

    <h1>Formulaire de Réservation</h1>
    <form action="process_reservation.php" method="post">
    <label for="numbertable">Numéro de la table :</label>
        <select id="numbertable" name="numbertable">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>
        <br><br>
        <label for="date">Date de réservation :</label>
        <input type="text" id="date" name="date" required>
        <br><br>
        <label for="duree">Durée de la réservation :</label>
        <select id="duree" name="duree">
            <option value="15">15 minutes</option>
            <option value="30">30 minutes</option>
            <option value="45">45 minutes</option>
            <option value="60">1 heure</option>
        </select>
        <br><br>
        <label for="paiement">Paiement :</label>
        <select id="paiement" name="paiement">
            <option value="cb">cb</option>
            <option value="espece">espece</option>
            </select>
        <br><br>
        <input type="submit" value="Réserver">
    </form>

    <script>
        $(function() {
            $("#date").datepicker();
        });
    </script>
</body>