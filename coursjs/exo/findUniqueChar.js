/*
Avec deux chaînes, créez une fonction qui renvoie le nombre total de caractères uniques de la chaîne concaténée.

uniqueChr("attention", "intention") ➞ 6  
// "attentionintention" a 6 caractères uniques:
// "a", "t", "e", "n", "i", "o"

uniqueChr("plus", "tous") ➞ 6 

uniqueChr("bis", "lis") ➞ 4


*/

function uniqueChr(str1, str2) {
    // Concaténer les deux chaînes
    const concatStr = str1 + str2;

    // Utiliser un ensemble (Set) pour stocker les caractères uniques
    const uniqueChars = new Set(concatStr);

    // Retourner la taille de l'ensemble (nombre de caractères uniques)
    return uniqueChars.size;
}

// Exemples d'utilisation
console.log(uniqueChr("attention", "intention")); // Résultat attendu: 6
console.log(uniqueChr("plus", "tous")); // Résultat attendu: 6
console.log(uniqueChr("bis", "lis")); // Résultat attendu: 4


/*

OU

*/


function uniqueChr(s1, s2) {
    // Première façon de faire
    const s3 = s1 + s2
    let unique = [];
    for (let i=0; i < s3.length; i++) {
        let Lettre = s3[i]
        if (unique.find((character) => character == Lettre) == undefined) {
            unique.push(Lettre);
        }
    }
    return unique.length

    // Deuxième façon de faire
    return new Set(s1 + s2).size

}

console.log(uniqueChr("attention", "intention"));
console.log(uniqueChr("plus", "tous"));
console.log(uniqueChr("bis", "lis"));

