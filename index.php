<!--  localhost/cours_php/Sniikks.github.io/index.php -->
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">

    
</head>
<body>



  <!-- On ouvre la balise PHP. -->
    <?php 
    echo "<p class='Oui'> <h1> Bonjour </h1> </p>";
    // Ou on peut faire ceci.
    //echo "<p>" + "BONJOUR" + "</p>";
    // £ = var/let
    // Je défibi ma variable avec $, puis je lui donne le nom: 10; et je lui rentre la valeur.
    $cookie = 10; // integer (Nombre/chiffre entier comme 2, 78, 777663.)
    $phrase = "Je suis une phrase"; // string (Chaine de caractère comme "Salut", "COucou ça va?, "J'aime les chiens".)
    $nombre = 1.4; // float (Nombre/chiffre à virgule comme 1.6, 77,73, 89887.67.)
    $choix = true; //booléens
    // Array => Indexés; Associatif.
    // Null => NULL
    echo "<p>". $phrase. "</p>";



    // CONDITIONS
    $condition = false;
    if ($condition) {
        echo "<p> Je passe ici donc c'est vrai. </p>". "<br>";
    } else {
        echo "<p> Je passe ici donc c'est faux. </p>". "<br>";
    }

    $code = 4227;
    // == Prends en compte que la variable soit égal.
    // === Prends en compte que la variable soit égal ou du même type.
    if($code == 4227) {
        echo "Le code est correct.". "<br>";
    } else {
        echo "Le code est incorrect.". "<br>";
    }

    $couleur = "rouge";

    if($couleur == "blanc") { // Si
        echo "<p> J'ai une autruche blanc. </p>". "<br>";
    } else if ($couleur == "bleu") { // Sinon si
        echo "<p> J'ai une autruche bleu. </p>". "<br>";
    } else { // Sinon
        echo "<p> J'ai pas d'autruche. </p>". "<br>";
    }



    // ECRITURE TERNAIRE
    $a = 15;
    // Si $a supérieur à 11 alors $un = 1 sinon il affichera 0.
    $un = $a > 11 ? 1 : 0;
    echo "$un". "<br>";



    // SWITCH
    $tailles = 130;

    switch ($tailles) {
        case 110:
            echo "<p> Tu es atteint de nanisme. </p>". "<br>";
            break;
        case 130:
            echo "<p> Tu es très petit(e).</p>". "<br>";
            break;
        case 160:
            echo "<p> Tu es de taille moyenne. </p>". "<br>";
            break; 
        default;
            echo "<p> Tu n'existe pas. </p>". "<br>";
            break;
    }



    // LES TABLEAUX
    // 5 valeurs dans le tableaux: 42 = 0, 78 = 1, 223 = 2, 67888 = 3, LIvres = 4. 0 compte comme une valeur.
    $tableau = [42, 78, 223, 67888, "Livres"];
    echo $tableau[4]. "<br>". $tableau[2]. "<br>";
    // Permet d'afficher tout le tableau sur la page internet, en colonne.
    echo '<pre>';
    var_dump($tableau);
    echo '</pre>';

    $exo = [4, 12, 78, 98, 65];
    // La valeur de $resultat doit être égal à 30 en utilisant que les nombres qu'il y'a dans le tableau.
    // $resultat = $exo[2] - ($exo[0] * $exo[1]); 78 - (4 * 12)
    $resultat = ($exo[3] - $exo[4]) - ($exo[1] / $exo[0]); // (98 - 65) - (12 / 4)
    echo $resultat;



    // TABLEAUX ASSOCIATIFS
    // Je fais un tableau avec 5 valeurs qui ont un index que j'ai défini moi même.
    // Voiture est un index, et volkswagen est une valeur.
    $tab_assoc = [
        "voiture" => "Wolskswagen", // string
        "animal" => "Perroquet", // string
        "chiffre" => "10", // Integrer
        "calvitie" => true, // Boolean
        "legume" => null // Null
    ];
    // J'ai défini un nouvelle index bras, avec comme valeur faux.
    $tab_assoc['bras'] = false;
    
    echo "<pre>"; 
    var_dump($tab_assoc);
    echo "</pre>";



    // LES BOUCLES
    $o = 0;
    while (true) {
        $o++;
        echo "<p> Je passe dans la boucle while</p>";
        if ($o == 10) {
            break;
        }
     }

     // LA BOUCLE DO-WHILE
     do {
        echo 'Je passe dans la boucle do-while'. "<br>". "<br>";
     } while (false);

     // LA BOUCLE FOR
     for ($i=0; $i < 10; $i++) {
        echo "Je suis passé ". $i+1 . " fois dans la boucle FOR". "<br>";
        echo "Je suis là". "<br>";
     }

    /* 
    Créer un tableau Associatif en mettant une 
    index bras de type booléen et une index 
    jambe qui va être un integer
    */

    /* 
    Si il n'a pas de jambe ni de bras
        Tu es un e-tronc !
    Sinon si il n'a pas de bras
        Pas de bras pas de chocolat
    Sinon
        Tu es basique donc tu es nul
    */

    $tab_associatif=[
        "bras" => false,
        "jambe" => 0
    ];

    if($tab_associatif['bras'] == false && $tab_associatif['jambe'] == "0") {
        echo "<p> Tu es un e-tronc. </p>". "<br>";
    } else if ($tab_associatif['bras'] == false) { 
        echo "<p> Pas de bras pas de chocolat. </p>". "<br>";
    } else { 
        echo "<p> Tu es basique donc tu es nul. </p>". "<br>";
    }
 /* Je ferme la balise PHP */ 
 ?>

    <form action="" method="post">     <!-- method="post" permet de cacher les données dans la barre de recherche du navigateur quand on s'inscrit via un formulaire.-->
    <legend><h1> Register </h1></legend>
        <pre>
        <label for ="firstname"> First Name: </label>
        <br>
        <input type="text" name="firstname" id="firstname">
        <br>
        <label for="lastname"> Last Name: </label>
        <br>
        <input type="text" name="lastname" id="lastname">
        <br>
        <label for="email"> Email: </label>
        <br>
        <input type="email" name="email" id="email">
        <br>
        <label for="password"> Password </label>
        <br>
        <input type="password" name="password" id="password">
        <br>
        <label for="passwordconfirm"> Confirm Password: </label>
        <br>
        <input type="password" name="password" id="password">
        </pre>
        <legend> Gender: </legend>
        <input type="radio" name="sexe" id="masculin" value="male">
        <label for="masclin"> Masculin
        <input type="radio" name="sexe" id="feminin" value="female">
        <label for="feminin"> Feminin
        <input type="radio" name="sexe" id="other" value="other">
        <label for="other"> other </label>
        <br>
        <input type="submit" value="Envoyé">

    </form>

    <?php
        if (isset($_POST)) {
            echo '<pre>'; var_dump($_POST); echo '</pre>';
            echo $_POST['firstname'];
        }

    ?>


</body>
</html>