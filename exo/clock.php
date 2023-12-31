<!-- localhost/cours_php/Sniikks.github.io/clock.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Clock.php</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>

<h3> Chrono </h3>

<p id="minuteur">00:00:00</p>
<form action="" method="post">
    <label for="heure"> Heure(s) :</label>
    <input type="number" name="heure" id="heure" value="0" min="0" max="9999999">
    <label for="minute"> Minute(s) :</label>
    <input type="number" name="minute" id="minute" value="0" min="0" max="59" maxlength="2">
    <label for="seconde"> Seconde(s) :</label>
    <input type="number" name="seconde" id="seconde" value="0" min="0" max="59" maxlength="2">
    <input type="submit" value="Submit">
    <button type="button" id="play">Start</button>
    <button type="button" id="pause" onclick="PauseTimer()">Pause</button>
    <button type="button" id="reset" onclick="ResetTimer()">Reset</button>
</form>

<?php
echo '<script>
    var heure =' . (!empty($_POST["heure"]) ? $_POST["heure"] : '0') . ';
    var minute =' . (!empty($_POST["minute"]) ? $_POST["minute"] : '0') . ';
    var seconde =' . (!empty($_POST["seconde"]) ? $_POST["seconde"] : '0') . ';
    function timer() {
        document.getElementById("minuteur").innerHTML = `${(heure < 10 ? "0" : "") + heure}:${(minute < 10 ? "0" : "") + minute}:${(seconde < 10 ? "0" : "") + seconde}`;
        if (seconde <= 0 && minute <= 0 && heure <= 0) {
            clearInterval(interval);
            return;
        }
        seconde--;
        if (seconde < 0) {
            seconde = 59;
            minute--;
            if (minute < 0) {
                minute = 59;
                heure--;
            }
        }
    }
    var interval = setInterval(timer, 1000);
    
    function pauseTimer() {
        clearInterval(interval);
        interval = null;
        document.getElementById("minuteur").style.opacity = "0.5";
    }

    function resetTimer() {
        clearInterval(interval);
        interval = null;
        document.getElementById("minuteur").innerHTML = "00:00:00";
        document.getElementById("heure").value = "0";
        document.getElementById("minute").value = "0";
        document.getElementById("seconde").value = "0";
        document.getElementById("minuteur").style.opacity = "1";
        heure = 0;
        minute = 0;
        seconde = 0;
    }
    
    function playTimer() {
        if (interval === null) {
            interval = setInterval(timer, 1000);
            document.getElementById("minuteur").style.opacity = "1";
        }
    }
    
    document.getElementById("play").addEventListener("click", playTimer);
    document.getElementById("pause").addEventListener("click", pauseTimer);
    document.getElementById("reset").addEventListener("click", resetTimer);

</script>';

?>

<!-- ------------------------------ -->

<h3> Date et Horaire du jour </h3>
<?php
echo 'Nous sommes le ' .date("d/m/Y") .', il est actuellement ' .date("h:i:s") ;
?> 

<!-- ------------------------------ -->

<p id="dateEtHoraire">Date et Horaire du jour</p>

<script>
    function actualiserDateEtHeure() {
        var dateActuelle = new Date();
        var heure = dateActuelle.getHours();
        var minute = dateActuelle.getMinutes();
        var seconde = dateActuelle.getSeconds();

        // Formatage pour ajouter des zéros devant les valeurs < 10
        var heureFormat = (heure < 10 ? "0" : "") + heure;
        var minuteFormat = (minute < 10 ? "0" : "") + minute;
        var secondeFormat = (seconde < 10 ? "0" : "") + seconde;

        var dateEtHeure = "Nous sommes le " + dateActuelle.toLocaleDateString("fr-FR") + ", il est actuellement " + heureFormat + ":" + minuteFormat + ":" + secondeFormat;

        document.getElementById("dateEtHoraire").textContent = dateEtHeure;
    }

    actualiserDateEtHeure(); // Appel initial de la fonction
    setInterval(actualiserDateEtHeure, 1000); // Actualise la date et l'heure toutes les secondes
</script>

<!-- ------------------------------ -->

<h3> Horaire du jour </h3>

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


<!-- ------------------------------ -->

<h3> Chronomètre </h3>

<div id="timer">00:00:00:00</div>

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