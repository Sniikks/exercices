
const Longitude = parseFloat(readline().replace(',', '.'));
const Latitude = parseFloat(readline().replace(',', '.'));
const Nombre = parseInt(readline());
// J'ai défini ma variable en Infinity c'est à dire qu'elle prend 
// le nombre le plus au possible 
var distance = Infinity
var Texte = ''

for (let i = 0; i < Nombre; i++) {
    const Defibrilateur = readline().split(';');

    var LongitudeDefib = parseFloat(Defibrilateur[4].replace(',', '.'))
    var LatitudeDefib = parseFloat(Defibrilateur[5].replace(',', '.'))

    var x = (LongitudeDefib - Longitude) * Math.cos((Latitude + LatitudeDefib) / 2)
    var y = LatitudeDefib - Latitude
    var d = Math.sqrt( x*x + Math.pow(y, 2)) * 6371
    
    if (d < distance) {
        distance = d
        Texte = Defibrilateur[1]
    }

}
console.log(Texte)