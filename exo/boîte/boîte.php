<!DOCTYPE html>
<html>
<head>
    <title>Boîte</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div id="container">
        <div class="square"></div>
        <div class="square"></div>
        <div class="square"></div>
    </div>
    <div>
        <button id="toggleColor">Activer/Désactiver la couleur rouge</button>
        <button id="toggleRounded">Activer/Désactiver les bords arrondis</button>
        <button id="addSquare">Ajouter une nouvelle boîte</button>
        <button id="removeSquare">Supprimer une boîte</button>
    </div>
    <script>
        $(document).ready(function () {
            // Variables pour suivre l'état des fonctionnalités
            var colorEnabled = true;
            var roundedEnabled = false;

            // Fonction pour activer/désactiver la couleur rouge
            $("#toggleColor").click(function () {
                colorEnabled = !colorEnabled;
                $(".square").css("background-color", colorEnabled ? "red" : "transparent");
            });

            // Fonction pour activer/désactiver les bords arrondis
            $("#toggleRounded").click(function () {
                roundedEnabled = !roundedEnabled;
                if (roundedEnabled) {
                    $(".square").addClass("rounded");
                } else {
                    $(".square").removeClass("rounded");
                }
            });

            // Fonction pour ajouter une nouvelle boîte
            $("#addSquare").click(function () {
                $("#container").append('<div class="square"></div>');
            });

            // Fonction pour supprimer une boîte
            $("#removeSquare").click(function () {
                if ($(".square").length > 0) {
                    $(".square:last").remove();
                }
            });
        });
    </script>
</body>
</html>
