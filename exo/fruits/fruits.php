<?php
require_once('../../function/db.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fruits'])) {
    $fruits = $_POST['fruits'];

    // Échappez les données et insérez-les dans la BDD
    $query = $bdd->prepare("INSERT INTO panier (fruit) VALUES (?)");
    foreach ($fruits as $fruit) {
        $query->execute([$fruit]);
    }

    echo "Données insérées avec succès dans la base de données.";
} else {
    echo "Erreur : Aucune donnée reçue.";
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Transfert de fruits</title>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 40px;
                text-align: center;
            }
            select {
                padding: 10px;
                margin: 20px;
                width: 200px;
                height: 100px;
            }
            button {
                padding: 10px 20px;
                margin: 20px;
                cursor: pointer;
            }
            .description {
                font-weight: bold;
                margin-bottom: 20px;
            }

        </style>
    </head>
    <body>

        <div class="description">Sélectionnez un fruit de la liste A pour l'ajouter à la liste B (votre panier).</div>

        <select id="listeA" multiple>
            <option value="ananas">Ananas</option>
            <option value="banane">Banane</option>
            <option value="citron">Citron</option>
            <option value="fraise">Fraise</option>
            <option value="orange">Orange</option>
            <option value="pomme">Pomme</option>
            <option value="raisin">Raisin</option>
            <option value="tomate">Tomate</option>
            <option value="kiwi">Kiwi</option>
            <option value="figue">Figue</option>
            <option value="pastèque">Pastèque</option>
            <option value="nefle">Nèfle</option>
            <option value="mangue">Mangue</option>
            <option value="cerise">Cerise</option>
            <option value="framboise">Framboise</option>
            <option value="coco">Noix-de-coco</option>
            <option value="peche">Pêche</option>
            <option value="mirabelle">Mirabelle</option>
            <option value="groseille">Groseille</option>
        </select>

        <button id="ajouter">Ajouter au panier</button>

        <br>

        <div class="description">Sélectionnez un fruit de la liste B (votre panier) pour le retirer.</div>

        <select id="listeB" multiple></select>

        <button id="supprimer">Retirer du panier</button>

        <button id="payer">Payer</button>

        <script>
        $(document).ready(function() {

            // Désactive les boutons au démarrage
            $('#ajouter').prop('disabled', true);
            $('#supprimer').prop('disabled', true);

            // Activer/Désactiver le bouton 'Ajouter' en fonction de la sélection dans la liste A
            $('#listeA').change(function() {
                $('#ajouter').prop('disabled', !$(this).val());
            });

            // Activer/Désactiver le bouton 'Supprimer' en fonction de la sélection dans la liste B
            $('#listeB').change(function() {
                $('#supprimer').prop('disabled', !$(this).val());
            });

            // Lorsque le bouton 'Ajouter' est cliqué
            $('#ajouter').click(function() {
                let selectedOption = $('#listeA option:selected');
                $('#listeB').append(selectedOption);
                $('#ajouter').prop('disabled', true); // Désactiver le bouton après le transfert
            });

            // Lorsque le bouton 'Supprimer' est cliqué
            $('#supprimer').click(function() {
                let selectedOption = $('#listeB option:selected');
                $('#listeA').append(selectedOption);
                $('#supprimer').prop('disabled', true); // Désactiver le bouton après le transfert
            });

                // Lorsque le bouton 'Payer' est cliqué
            $('#payer').click(function() {
                // Collectez les données sélectionnées dans la liste B
                let selectedOptions = $('#listeB option');
                let selectedFruits = [];
                selectedOptions.each(function() {
                    selectedFruits.push($(this).val());
                });

                // Envoie les données à un script PHP pour insertion en BDD
                $.ajax({
                    url: 'fruits.php', // Nommez votre script PHP
                    method: 'POST',
                    data: { fruits: selectedFruits }, // Envoyez les données à insérer
                    success: function(response) {
                        // Gérez la réponse du serveur (optionnel)
                        console.log(response);
                        // Effacez la liste B après avoir inséré les données
                        $('#listeB').empty();
                    },
                    error: function(xhr, status, error) {
                        // Gérez les erreurs (optionnel)
                        console.error(error);
                }
            });
        });

        });
        </script>

    </body>
</html>