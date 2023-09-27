<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>ATM</title>
    <link rel="stylesheet" href="../style/atm.css">
</head>
<body>
    <div class="atm-container">
        <div class="atm-content">
            <div class="pin-display" id="pin-display"></div>
            <div class="keyboard">
                <div class="key-container">
                    <?php
                    // Créez un tableau avec les touches ATM disposées comme demandé
                    $keys = [
                        '1', '2', '3', 'Decliner',
                        '4', '5', '6', 'Retour',
                        '7', '8', '9', 'Entrer',
                        '-', '0', '+'
                    ];

                    // Affichez chaque touche ATM dans un encadré
                    foreach ($keys as $key) {
                        echo '<div class="key" onclick="simulateKeyPress(\'' . $key . '\')">' . $key . '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        var enteredDigits = '';
        function simulateKeyPress(key) {
            var pinDisplay = document.getElementById('pin-display');
            
            if (key === 'Retour') {
                enteredDigits = enteredDigits.slice(0, -1); // Retirer le dernier chiffre
            } else if (key === 'Effacer') {
                enteredDigits = ''; // Réinitialiser l'entrée
            } else if (key === 'Decliner') {
                enteredDigits = ''; // Supprimer toutes les saisies lorsque "Decliner" est cliqué
            } else if (key === '+') {
                enteredDigits = '+';
            } else if (key === '-') {
                enteredDigits = '-';
            } else if (key === 'Entrer') {
                if (enteredDigits.length === 4) {
                    // Valider les saisies lorsque "Entrer" est cliqué et que 4 chiffres sont inscrits
                    enteredDigits = ''; // Réinitialiser l'entrée après validation
                } else {
                
                }
            } else if (enteredDigits.length < 5 && /^\d$/.test(key)) {
                enteredDigits += key; // Ajouter le chiffre si moins de 4 chiffres sont entrés
            }

            pinDisplay.textContent = enteredDigits;

            if (enteredDigits.length === 5) {
                enteredDigits = ''; // Réinitialiser l'entrée après traitement
                pinDisplay.textContent = '';
            }
        }
    </script>
</body>
</html>