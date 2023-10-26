<?php
$host = "localhost"; // Hôte de la base de données
$username = "Sniikks"; // Nom d'utilisateur de la base de données
$password = "Aqwzsx03*"; // Mot de passe de la base de données
$database = "crud"; // Nom de la base de données

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}
?>