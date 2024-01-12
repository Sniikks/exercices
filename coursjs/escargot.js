// Faire un exercice qui détermine en combien de temps un escargot sortira d'un puit en sachant le profondeur du puit en cm
// l'escargot avance de 7 cm chaque jour et recule de 2 cm chaque nuit

// Exemple : 
// Jour 1 : 7  - 2     = 5 cm
// Jour 2 : 5  + 7 - 2 = 10 cm
// Jour 3 : 10 + 7 - 2 = 15 cm
// Jour 4 : 15 + 7 - 2 = 20 cm
// Jour 5 : 20 + 7 - 2 = 25 cm
// Jour 6 : 25 + 7 - 2 = 30 cm

function tempsPourSortirDuPuit(profondeur) {
    const avanceJour = 7;
    const reculeNuit = 2;
    let position = 0;
    let jours = 0;

    while (position < profondeur) {
        jours++;
        position += avanceJour;

        if (position >= profondeur) {
            break;
        }

        position -= reculeNuit;
    }

    return jours;
}
const profondeurDuPuit = 32;
const joursPourSortir = tempsPourSortirDuPuit(profondeurDuPuit);

console.log(`L'escargot mettra ${joursPourSortir} jours pour sortir d'un puits de ${profondeurDuPuit} cm.`);

// OU

function DaysSnail(profondeur) {
    let distance = 0
    let days
    for (days = 0; distance <= profondeur; days++) {
        distance += 7 - 2
    }
    return days
}

console.log(`L'escargot mettra ${DaysSnail(32)} jours`);


