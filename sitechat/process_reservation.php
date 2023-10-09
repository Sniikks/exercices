<?php
session_start();

// Assurez-vous que vous avez une connexion PDO à votre base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=sitechat;charset=utf8', 'Sniikks', 'Aqwzsx03*');
    // Activez les exceptions PDO pour gérer les erreurs de requête
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $numbertable = $_POST['numbertable'];
    $date = $_POST['date'];
    $duree = $_POST['duree'];
    $paiement = $_POST['paiement'];

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
    } else {
        $_SESSION['message'] = "Tous les champs requis doivent être remplis.";
    }
}

// Redirigez l'utilisateur vers la page de confirmation
header("Location: confirmation.php");
exit(); // Assurez-vous de quitter le script après la redirection
?>
