<?php
require_once('./inc/db.php');

$Tableau = $bdd->prepare('SELECT * FROM user');
$Tableau->execute();
$Tableau = $Tableau->fetchAll(PDO::FETCH_CLASS);

?>