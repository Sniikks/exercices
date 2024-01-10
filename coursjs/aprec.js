// Créez une fonction nommée aprec qui :

//     prend une note sur 20 en argument
//     renvoie Hideux si la note est entre 0 et 7 exclus
//     renvoie Moche si la note entre 7 et 10 exclus
//     renvoie Nice si la note entre 10 et 15 exclus
//     renvoie GG si la note entre 15 et 20 inclus
//     renvoie BUG si la note n'est pas correcte




// On souhaite stocker les positions d"une série de 20 objets mobiles 
//(mobs) dans un jeu vidéo. Pour cela on va créer 2 tableaux :

//     posX qui contient la série des abscisses des objets
//     posY qui contient la série des ordonnées des objets

// Créez une fonction initXY :

//     qui prend en 1er argument l'abscisse du 1er objet
//     qui prend en 2ème argument l'ordonnée du 1er objet
//     qui calcule les abscisses et ordonnés des objects de la série 
//sachant qu'il doivent être espacés de 40 pixels (+40) les uns des autres 
//en abscisse et de 30 pixels (+30) en ordonnée


// Fonction aprec
function aprec(note) {
    if (note < 0 || note > 20) {
        return "BUG";
    } else if (note < 7) {
        return "Hideux";
    } else if (note < 10) {
        return "Moche";
    } else if (note < 15) {
        return "Nice";
    } else {
        return "GG";
    }
}

// Fonction initXY
function initXY(x1, y1) {
    // Initialisation des tableaux posX et posY
    var posX = [];
    var posY = [];

    // Calcul des positions des objets mobiles
    for (var i = 0; i < 20; i++) {
        posX.push(x1 + i * 40); // Espacement de 40 pixels en abscisse
        posY.push(y1 + i * 30); // Espacement de 30 pixels en ordonnée
    }

    // Retourne un objet avec les deux tableaux
    return { posX: posX, posY: posY };
}

// Exemples d'utilisation
var note = 15;
console.log("Appréciation de la note:", aprec(note));

var initialPosition = initXY(100, 50);
console.log("Positions initiales des objets mobiles:", initialPosition);


