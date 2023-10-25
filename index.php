<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Index OF</title>
</head>
<body>

<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            text-align: center;
            max-width: 400px; /* Largeur maximale du contenu */
            margin: 0 auto; /* Centrer le contenu horizontalement */
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
        }

        h2 {
            background-color: #333;
            color: white;
            padding: 10px;
            border-radius: 5px 5px 0 0;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            padding: 10px;
        }

        ul li:nth-child(odd) {
            background-color: #f0f0f0;
        }

        ul li:nth-child(even) {
            background-color: #e0e0e0;
        }

        a {
            text-decoration: none;
            color: #333;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>

    <ul>
    <h2>Cours</h2>
    <?php
        $dir = './cours/';
        $dossiers = scandir($dir);
        echo '<ul>';
        foreach ($dossiers as $lien) {
            if ($lien != '.' && $lien != '..') {
                echo "<li><a href='" . $dir . $lien . "'>" . $lien . "</a></li>";
            }
        }
        echo '</ul>';
    ?>


    <h2>Exo</h2>
    <?php
        $dir = './exo/';
        $dossiers = scandir($dir);
        echo '<ul>';
        foreach ($dossiers as $lien) {
            if ($lien != '.' && $lien != '..') {
                echo "<li><a href='" . $dir . $lien . "'>" . $lien . "</a></li>";
            }
        }
        echo '</ul>';
    ?>

    <h2>Portefolio</h2>
        <?php
            $dir = './portefolio/';
            $dossiers = scandir($dir);
            echo '<ul>';
            foreach ($dossiers as $lien) {
                if ($lien != '.' && $lien != '..') {
                    echo "<li><a href='" . $dir . $lien . "'>" . $lien . "</a></li>";
                }
            }
            echo '</ul>';
        ?>

    <h2>Site Chat</h2>
    <?php
        $dir = './sitechat/';
        $dossiers = scandir($dir);
        echo '<ul>';
        foreach ($dossiers as $lien) {
            if ($lien != '.' && $lien != '..') {
                echo "<li><a href='" . $dir . $lien . "'>" . $lien . "</a></li>";
            }
        }
        echo '</ul>';
    ?>



    <!-- 
        blanc       => Texte entre balise qui est forcément affiché sur la page
        bleu foncé  => Constructeur (construit tout ce que leur demande)
        bleu clair  => Variable qui contiennent des valeurs
        Orange      => Chaine de caractère qui sont tout le temps entre guillemet ("") ou ('') ou (``)
        Jaune       => Fonction qu'on créer ou non (Si on ne les a pas créer quand on passe dessus
                      il nous indique plusieurs information)
        Vert        => Cette un commentaire comme celui ci
        Vert Clair  => Les types ( string, int, float, double, boolean, null, array = [] )
        Violet      => Conditions (if, else, elseif, endif, for, while, dowhile, switch, include, require)

        ()          =>  J'intègre des paramètres à une fonction à l'interieur des paranthèses avec variable
        {}          => Je rentre dans l'element entre les accolade
        []          => Je défini le tableau entre les crochet
        ""/''/``    => Je défini une chaine de caractère
        =           => Je modifie la valeur d'une variable
        ==          => Je vérifie si la valeur d'un variable et égal un autre valeur
        ===         => Je vérifie si une variable et égal à une autre
        =< =>       => Je vérifie si c'est egal ou supérieur ou inférieur
        &&          => et puis
        ||          => Ou 
        != !        => Different de
        -=          => Variable1 = Variable1 - Variable2
        +=          => Variable1 = Variable1 + Variable2
        *=          => Variable1 = Variable1 * Variable2
        /=          => Variable1 = Variable1 / Variable2
        .=          => Concaténation String = String . String
        La concaténation est le terme pour dire que je rajoute une chaine de caractère à la fin de la
        chaine de caractère juste avant 
     -->
</body>
</html>