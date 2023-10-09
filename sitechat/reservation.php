<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $numbertable = $_POST['numbertable'];
    $date = $_POST['date'];
    $duree = $_POST['duree'];
    $paiement = $_POST['paiement'];

    // Assurez-vous que vous avez une connexion PDO à votre base de données
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=sitechat;charset=utf8', 'Sniikks', 'Aqwzsx03*');
        // Activez les exceptions PDO pour gérer les erreurs de requête
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('Erreur de connexion à la base de données : ' . $e->getMessage());
    }

    // Vérifiez si tous les champs requis sont remplis
    if (!empty($numbertable) && !empty($date) && !empty($duree) && !empty($paiement)) {
        // Préparez la requête d'insertion
        $query = "INSERT INTO reservations (numbertable, date, duree, paiement) 
                  VALUES (:numbertable, :date, :duree, :paiement)";

        // Préparez la requête avec les paramètres
        $stmt = $bdd->prepare($query);

        // Associez les valeurs aux paramètres de la requête
        $stmt->bindParam(':numbertable', $numbertable, PDO::PARAM_INT);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->bindParam(':duree', $duree, PDO::PARAM_INT);
        $stmt->bindParam(':paiement', $paiement, PDO::PARAM_STR);

        // Exécutez la requête
        try {
            $stmt->execute();
            $_SESSION['message'] = "La réservation a été enregistrée avec succès.";
        } catch (PDOException $e) {
            $_SESSION['message'] = "Erreur lors de l'enregistrement de la réservation : " . $e->getMessage();
        }

        // Redirigez l'utilisateur vers la page de confirmation
        header("Location: confirmation.php");
        exit(); // Assurez-vous de quitter le script après la redirection
    } else {
        $_SESSION['message'] = "Tous les champs requis doivent être remplis.";
    }
}
?>

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
    <?php
    // Affichez le message de session s'il y en a un
    if (isset($_SESSION['message'])) {
        echo '<p>' . $_SESSION['message'] . '</p>';
        unset($_SESSION['message']); // Effacez le message après l'affichage
    }
    ?>
    <form action="reservation.php" method="post">
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
</html>
