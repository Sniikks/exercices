<!-- localhost/cours_php/Sniikks.github.io/clock.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <!-- Faite une horloge sois numérique sois analogique, on doit pouvoir changer l'heure avec un formulaire-->

    
<?php
$jour=date('d');
$mois=date('m');
$annee=date('y');
$heure=date('h');
$min=date('i');
echo 'Il est actuellement ' .$heure .':' .$min .' et nous sommes le ' .$jour .'/' .$mois .'/' .$annee .'.';
?>

<form action="" method="post">     <!-- method="post" permet de cacher les données dans la barre de recherche du navigateur quand on s'inscrit via un formulaire.-->
    <legend><h1> Register </h1></legend>
        <label for ="heure"> Heures: </label>
        <br>
        <input type="number" name="heure" id="heure">
        <br>
        <label for="minute"> Minutes : </label>
        <br>
        <input type="number" name="minute" id="minute">
        <br>
        <label for="seconde"> Secondes: </label>
        <br>
        <input type="number" name="seconde" id="seconde">
        <br>
        <input type="submit" value="Envoyé">
        <input type="reset" value="Reset">
</form>

<?php
echo 'Il est actuellement ' .$heure .':' .$min .' et nous sommes le ' .$jour .'/' .$mois .'/' .$annee .'.';
?>

</body>
</html>