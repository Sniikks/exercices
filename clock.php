<!-- localhost/cours_php/Sniikks.github.io/clock.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Clock.php</title>
</head>
<body>

<p id="minuteur">00: 00: 00</p>
    <form action="" method="post">
        <label for="heure"> Heure(s) :</label>
        <input type="number" name="heure" id="heure" value=0 min=0 max=9999999 lenght=2>
        <label for="minute"> Minute(s) :</label>
        <input type="number" name="minute" id="minute" value=0 min=0 max=59>
        <label for="seconde"> Seconde(s) :</label>
        <input type="number" name="seconde" id="seconde" value=0 min=0 max=59>
        <input type="submit" value="Submit">
    </form>

<?php
 

echo '<script>
    var heure =' .(!empty($_POST["heure"]) ? $_POST["heure"] : '0') .'
    var minute =' .(!empty($_POST["minute"]) ? $_POST["minute"] : '0') .'
    var seconde =' .(!empty($_POST["seconde"]) ? $_POST["seconde"] : '0') .'
    setInterval(function() {
        document.getElementById("minuteur").innerHTML= 
        `${(heure < 10 ? "0" : "") + heure}:
         ${(minute < 10 ? "0" : "") + minute}:
         ${(seconde < 10 ? "0" : "") + seconde}`
        if (seconde <= 0) return
        seconde--
        if (seconde == 0)
        if (minute > 0) {
            seconde = 59
            minute--
        } else {
            if (heure > 0) {
                heure--
                minute = 59
                seconde = 59
            }
        }
}, 1000)

</script>'

?>

<h3> Date et Horaire du jour </h3>
<?php
echo 'Nous sommes le ' .date("d/m/Y") .', il est actuellement ' .date("h:i:s") ;
?> 

<h3> Horaire du jour </h3>
<form action="" method="post">     <!-- method="post" permet de cacher les données dans la barre de recherche du navigateur quand on s'inscrit via un formulaire.-->
    <label for ="heures"> Heures: </label>
    <input type="number" name="heures" min="0" max="23" required>
    <br>
    <label for ="minutes"> Minutes: </label> 
    <input type="number" name="minutes" min="0" max="59" required>
    <br>
    <label for ="secondes"> Secondes: </label> 
    <input type="number" name="secondes" min="0" max="59" required>
    <br>
    <input type="submit" value="Submit">
    <input type="reset" value="Reset">
</form>

<?php
$heures= $_POST["heures"];
$minutes= $_POST["minutes"];
$secondes= $_POST["secondes"];
if (empty($minutes) && empty($minutes) && empty($secondes)) {
echo 'Il est ' .date("h:i:s");
} else {
echo 'Il est ' .$heures .":" .$minutes .":" .$secondes;
}
?>

<!-- ------------------------------ -->

<h3> Chronomètre </h3>
<form action="" method="post"> 
        <label for="jours"> Jours :</label>
        <input type="number" id="jours" name="jours" min="0" value="0">
        <br>
        <label for="heures"> Heures :</label>
        <input type="number" id="heures" name="heures" min="0" max="23" value="0">
        <br>
        <label for="minutes"> Minutes :</label>
        <input type="number" id="minutes" name="minutes" min="0" max="59" value="0">
        <br>
        <label for="secondes"> Secondes :</label>
        <input type="number" id="secondes" name="secondes" min="0" max="59" value="0">
        <br>
        <input type="button" value="Start" onclick="startchrono()">
        <input type="button" value="Stop" onclick="stopchrono()">
        <input type="reset" value="Reset">
    </form>

    <div id="timer">00:00:00:00</div>

    <script>
        let interval;
        let remainingTime = 0;
        let initialTime = 0;

        function startchrono() {
            const jours = parseInt(document.getElementById("jours").value) || 0;
            const heures = parseInt(document.getElementById("heures").value) || 0;
            const minutes = parseInt(document.getElementById("minutes").value) || 0;
            const secondes = parseInt(document.getElementById("secondes").value) || 0;

            initialTime = remainingTime = jours * 86400 + heures * 3600 + minutes * 60 + secondes;

            updateTimerDisplay();
            interval = setInterval(updateTimerDisplay, 1000);
        }

        function stopchrono() {
            clearInterval(interval);
        }

        function updateTimerDisplay() {
            const jours = Math.floor(remainingTime / 86400);
            const heures = Math.floor((remainingTime % 86400) / 3600);
            const minutes = Math.floor((remainingTime % 3600) / 60);
            const secondes = remainingTime % 60;

            const timerDisplay = `${String(jours).padStart(2, "0")}:${String(heures).padStart(2, "0")}:${String(minutes).padStart(2, "0")}:${String(secondes).padStart(2, "0")}`;
            document.getElementById("timer").textContent = timerDisplay;

            if (remainingTime === 0) {
                clearInterval(interval);
            } else {
                remainingTime--;
            }
        }
    </script>

    

</body>
</html>