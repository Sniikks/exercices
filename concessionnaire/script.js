// INDEX.HTML
var slideIndex = 0;

document.addEventListener('DOMContentLoaded', function () {
    // FOOTER
    // Permet d'actualiser l'année du copyright.
    var currentYear = new Date().getFullYear();
    var copyrightElement = document.getElementById('copyright');
    if (copyrightElement) {
        copyrightElement.innerHTML = '&copy; ' + currentYear + ' Sniikkssion Automobile. Tous droits réservés.';
    }

    // VEHICULES.HTML
    // Permet d'ouvrir une fenêtre lorsqu'on clique sur une image d'un véhicule
    // Sélectionnez tous les éléments avec la classe car-presentation
    var carPresentations = document.querySelectorAll('.car-presentation');

    // Ajoutez un écouteur d'événements à chaque élément
    carPresentations.forEach(function (presentation) {
        presentation.addEventListener('click', function () {
            // Récupérez les données du véhicule à partir de l'élément cliqué (à adapter selon votre structure HTML)
            var vehicleName = presentation.querySelector('h2').innerText;
            var vehicleImageSrc = presentation.querySelector('img').src;

            // Créez une fenêtre modale
            var modal = document.createElement('div');
            modal.classList.add('modal');

            // Contenu de la fenêtre modale
            modal.innerHTML = `
            <span class="close-modal" onclick="closeModal()">&times;</span>
            <h2>${vehicleName}</h2>
            <ul>
                ${vehicleName.toLowerCase() === 'tesla' ? 
                    `<li><strong>Année:</strong> 2022</li>
                    <li><strong>Type:</strong> Berline électrique</li>
                    <li><strong>Autonomie:</strong> 375 miles</li>
                    <li><strong>Accélération:</strong> 0-60 mph en 2.3 secondes</li>`
                    :
                    `<li><strong>Année:</strong> 2022</li>
                    <li><strong>Type:</strong> VUS de luxe</li>
                    <li><strong>Moteur:</strong> 3.0L Turbocharged Inline-6</li>
                    <li><strong>Puissance:</strong> 335 chevaux</li>`
                }
            </ul>
            <button onclick="bookAppointment()">Prendre rendez-vous</button>
        `;

            // Ajoutez la fenêtre modale au corps du document
            document.body.appendChild(modal);
        });
    });

    // INDEX.HTML
    // Initialisation des diapositives
    showSlides();
});

// INDEX.HTML
// Permet de faire en sorte d'avoir une diapo' d'image
function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) { slideIndex = 1; }
    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 5000); // Change l'image toutes les 5 secondes
}

function plusSlides(n) {
    showSlides(slideIndex += n);
}

//VEHICULES.HTML
// Fonction pour fermer la fenêtre modale
function closeModal() {
    var modal = document.querySelector('.modal');
    if (modal) {
        modal.remove();
    }
}

// Fonction pour prendre rendez-vous (à adapter selon vos besoins)
function bookAppointment() {
    alert('Prise de rendez-vous!');
}

