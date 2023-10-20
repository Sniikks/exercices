<!DOCTYPE html>
<html>
<head>
    <title>Panier de Fruits</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h1>Panier de Fruits</h1>
    <label for="listeA">Fruits disponibles:</label>
    <select id="listeA" size="4">
        <option value="raisin">Raisin</option>
        <option value="pomme">Pomme</option>
        <option value="cerise">Cerise</option>
        <option value="banane">Banane</option>
        <option value="orange">Orange</option>
        <option value="mirabelle">Mirabelle</option>
        <option value="coco">Noix de coco</option>
        <option value="pêche">Pêche</option>
    </select>
    <br>
    <button id="ajouter" onclick="ajouterFruit()" disabled>Ajouter</button>
    <button id="supprimer" onclick="supprimerFruit()" disabled>Supprimer</button>
    <label for="listeB">Panier:</label>
    <select id="listeB" size="4"></select>

    <script>
        var listeA = document.getElementById("listeA");
        var listeB = document.getElementById("listeB");
        var boutonAjouter = document.getElementById("ajouter");
        var boutonSupprimer = document.getElementById("supprimer");

        listeA.addEventListener("change", function() {
            boutonAjouter.disabled = (listeA.selectedIndex === -1);
        });

        listeB.addEventListener("change", function() {
            boutonSupprimer.disabled = (listeB.selectedIndex === -1);
        });

        function ajouterFruit() {
            if (listeA.selectedIndex !== -1) {
                var selectedOption = listeA.options[listeA.selectedIndex];
                listeB.appendChild(selectedOption);
                boutonAjouter.disabled = true;
            }
        }

        function supprimerFruit() {
            if (listeB.selectedIndex !== -1) {
                var selectedOption = listeB.options[listeB.selectedIndex];
                listeA.appendChild(selectedOption);
                boutonSupprimer.disabled = true;
            }
        }
    </script>
</body>
</html>
