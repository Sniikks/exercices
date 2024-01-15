// Vous devrez créer un tableau avec dix éléments. Ce tableau devra être 
// stocké dans une variable intitulée MonTableau.
// Les éléments du tableau peuvent être n'importe quoi vos plats ou vos 
// groupes de musique préférés

// Ensuite, modifiez les deux premiers éléments du tableau en utilisant 
// ce que vous voulais
// Puis ajoutez un nouvel élément au début du tableau et un autre en 
// fin de tableau.

// Création du tableau avec dix éléments
let MonTableau = ["Plat1", "Plat2", "Plat3", "Plat4", "Plat5", "Plat6", "Plat7", "Plat8", "Plat9", "Plat10"];

// Affichage du tableau avant les modifications
console.log("Tableau avant les modifications :", MonTableau);

// Modification des deux premiers éléments
MonTableau[0] = "NouveauPlat1";
MonTableau[1] = "NouveauPlat2";

// Ajout d'un nouvel élément au début du tableau
MonTableau.unshift("NouveauDebut");

// Ajout d'un nouvel élément en fin de tableau
MonTableau.push("NouvelleFin");

// Affichage du tableau après les modifications
console.log("Tableau après les modifications :", MonTableau);
