<?php
session_start();

// Assurez-vous d'avoir une connexion PDO à votre base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=sitechat;charset=utf8', 'Sniikks', 'Aqwzsx03*');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérez l'ID du chat à supprimer depuis le formulaire
    $chatId = $_POST['chat_id'];
    
    // Supprimez le chat de la base de données en utilisant l'ID
    $query = "DELETE FROM chat WHERE id = :chat_id";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(':chat_id', $chatId, PDO::PARAM_INT);
    
    try {
        $stmt->execute();
        // Redirigez l'utilisateur vers la liste des chats ou affichez un message de succès
        header("Location: add_chat.php");
        exit();
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression du chat : " . $e->getMessage();
    }
}
?>