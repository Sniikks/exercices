// Ecrire une fonction qui vérifie si un verbe est du premier groupe si il y est remplacer les deux dernière lettre par eur

function transformerVerbe(verbe) {
    // Vérifier si le verbe se termine par "er"
    if (verbe.slice(-2) === "er") {
        // Si oui, remplacer les deux dernières lettres par "eur"
        return verbe.slice(0, -2) + "eur";
    } else {
        // Sinon, le verbe n'est pas du premier groupe
        return "Le verbe n'est pas du premier groupe";
    }
}

// Exemple d'utilisation
const verbe1 = "manger";
const verbe2 = "finir";

console.log(transformerVerbe(verbe1)); // Résultat attendu: mangeur
console.log(transformerVerbe(verbe2)); // Résultat attendu: Le verbe n'est pas du premier groupe
