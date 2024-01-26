let PieceAuto

let test = async function() {
    // L'async permet de désyncroniser la fonction par rapport au reste du code
    await fetch('./pieceAuto.json')
    // Await permet d'attendre que la fonction qui le suit sois terminer
        .then((response) => {
            return response.json();
        })
        .then((json) => {
            PieceAuto = json
        })
    console.log(PieceAuto)

    // Récupérer des valeur de la variable PieceAuto et les afficher sur la page web
}()