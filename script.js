// Let et Var permettent de définir ma variable d'un nom souhaité.
// J'ai défini des variable de type "string" (chaine de caractère).
let Autruche = "Animal"
var Perche = "Poisson" 


// J'ai défini ma variable avec le nom NombreSTagiaire, et je lui ai donner comme donnée le nombre 10.
// J'ai défini une variable de type int (nombre entier).
let NombreStagiaire = 10
// J'ai crée une variable avec le nom heure, je lui donné la donnée 14.31, pour une variable de type float/double (nombre à virgule).
var Heure = 14.31


// J'ai crée une variable avec le nom Allumer, et comme valeur je lui donne true. Le type de la variable est un boolean (true/false).
let Allumer = true
// J'ai crée une variable avec le nom Ventilo, et ayant pour valeur null, qui est rien du tout. Le type est null.
var Ventilo = null

// J'ai concaténé les chaines de caractères et les variables.
// J'aime l'animal mais pas les poissons.
let Phrase = "J'aime l' " + Autruche + " mais pas les " + Perche
var Calcul = Heure + NombreStagiaire // * + - % 
// Permet d'afficher la console afin d'afficher nos données sur le net.
//console.log(Phrase)
//console.log(Calcul)


// Je crée une fonction sans paramètre.        
var temps = 1
function horloge() {
    // Si le temps est <= 10 alors on execute la commande et le console log, sinon rien ne se passe.
    if (temps <= 10) { // <, >, <=, >=, ==, !=
        temps = temps + 1
        // J'additionne 1 à ma variable temps.
        //temps++ //temps--
        //temps += 1 // temps -*
        //console.log(temps)
    }
}

setInterval(horloge, 1000)


// Je voudrais un compte à rebour qui commence à 50 et qui fini à 0, avec un intervalle de 2 secondes.
var temps2 = 50
function horloge2() { 
    if (temps2 != 0) {
        temps2 = temps2 - 1
        //console.log(temps2)
    }
}

setInterval(horloge2, 2000)  


//Array = Tableau
// Type de variable qui est elle même un tableau.
var tab = [10, "bonjour", 7.5, null]
// Cette variable est un tableau qui contient 4 valeurs, représenté dans l'ordre.
//console.log(tab[1])
//console.log(tab[3])

// Je voudrais un tableau qui ce nomme: Chilbik qui comporte 5 valeurs de type string, et 5 valeurs int ou float.
let Chmiblik = ["un", "deux", "trois", "quatre", "cinq", 1.1, 2.1, 3.1, 4.1, 5.1]
console.log(Chmiblik)
console.log(Chmiblik.lenght)



let animal = "Autruche"
let temp = ""
// getEleentById séléctionne un élément qui a l'id défibir sur animal.
// addEventListener créer une écoute d'événement.
document.getElementById('animal').addEventListener('click', function () {
    //Je modifie le texte qui ce trouve dans cette élément par la valeur de la variable animal.
   temp = document.getElementById('animal').innerHTML
   document.getElementById('animal').innerHTML = animal
   animal = temp
})


while (false) {} // Tandis que ce qu'il faut dans les parenthèses.
// est vrai elle tourne

// Je défini une variable i qui s'incrémente de 1 à chaque tour, grâce ) i++. Et je lui demande de tourner jusqu'à ce qu'elle soit supérieur à 10.
for(var i=1; i <= 10; i++) {
    console.log(i)
}

// LA boucle tourne jusqu'à la taille du tableau.
for(var i=0; i < Chmiblik.length; i++) {
    console.log(Chmiblik[i])
    if (i == 3) {
        break
    }
}

do {
    // Elle s'exécute une fois même si la condition est fausse, et elle continuede s'exécuter si la condition est vrai.
    console.log('BONJOUR')
} while (false);

for (index in Chmiblik) {
    console.log(index)
}

// Tableau associatif
var tab_assoc = {"ami": "Chien", "cafe": "Caféine"}
for (index in tab_assoc) {
    console.log(index)
}