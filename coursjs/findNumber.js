// Faire une fonction qui prend comme paramètre taille et un autre findMe tout les deux de type integer 
// et cette fonction devra trouver combien de fois le nombre findMe ce trouve dans tout les iterations de la boucle

// Par exemple Si on écrit les entiers de 1 à 365 combien il y aura le chiffre 3 dans cette suite
// Avec que des boucles For 

function countOccurrence(taille, findMe) {
    let count = 0;

    for (let i = 1; i <= taille; i++) {
        let num = i;
        while (num > 0) {
            if (num % 10 === findMe) {
                count++;
            }
            num = Math.floor(num / 10);
        }
    }

    return count;
}

const taille = 365;
const findMe = 3;
const occurrences = countOccurrence(taille, findMe);

console.log(`Le nombre ${findMe} se trouve ${occurrences} fois dans les entiers de 1 à ${taille}.`);
