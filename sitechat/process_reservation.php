<?php
session_start();

// Placez ici votre propre logique pour vérifier si la réservation est réussie
// Par exemple, vous pouvez avoir un formulaire pour la réservation avec un champ de validation

if (isset($_POST['duree']) && isset($_POST['numbertable']) && isset($_POST['paiement'])) {
    // Si tous les champs requis sont remplis, vous pouvez considérer la réservation comme réussie
    $_SESSION['message'] = "Réservation validée !";
} else {
    $_SESSION['message'] = "Erreur lors de la réservation. Veuillez réessayer.";
}

// Redirigez l'utilisateur vers l'index
header("Location: index.php");
exit(); // Assurez-vous de quitter le script après la redirection
?>