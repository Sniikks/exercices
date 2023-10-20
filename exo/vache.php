<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="../scripts/jquery-3.7.1.min.js"></script>
    <title>Document</title>
    <style>
        span {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>La vache <span class="color">Bleue</span></h1>
    <p> Je n'ai jamais vu une cache <span class="color">Bleue</span></p>
    <label for="color">Changer la couileur de la vache :</label>
    <input type="text"id="color">
    <button id="change">Changer !</button>
    
    <script>
        $('#change').click(function() {
            let couleur = $('#color').val()
            $('.color').text(couleur)
        })
    </script>
</body>
</html>