<?php
session_start();

// Connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=vetement;charset=utf8;', 'Sniikks', 'Aqwzsx03*');

// Vérification de la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['inscription'])) {
    $nom_utilisateur = $_POST['nom_utilisateur'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT); 

    // Vérifiez si l'utilisateur ou l'email existe déjà
    $check = $bdd->prepare("SELECT COUNT(*) FROM utilisateurs WHERE nom_utilisateur = :nom_utilisateur OR email = :email");
    $check->execute([
        'nom_utilisateur' => $nom_utilisateur,
        'email' => $email
    ]);

    if($check->fetchColumn() > 0){
        header("Location: index.php?error=utilisateur_existe");
        exit;
    }

    // Préparation de la requête d'insertion
    $stmt = $bdd->prepare("INSERT INTO utilisateurs (nom_utilisateur, email, mot_de_passe) VALUES (:nom_utilisateur, :email, :mot_de_passe)");

    // Liaison des paramètres
    $stmt->bindParam(':nom_utilisateur', $nom_utilisateur);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':mot_de_passe', $mot_de_passe);

    // Exécution de la requête
    if($stmt->execute()){
        header("Location: index.php");
    } else {
        header("Location: index.php?error=erreur_insertion");
    }
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['connexion'])) {
  $nom_utilisateur = $_POST['nom_utilisateur'];
  $mot_de_passe = $_POST['mot_de_passe'];

  // Préparation de la requête de sélection
  $stmt = $bdd->prepare("SELECT id, mot_de_passe FROM utilisateurs WHERE nom_utilisateur = :nom_utilisateur");
  $stmt->bindParam(':nom_utilisateur', $nom_utilisateur);
  $stmt->execute();

  $utilisateur = $stmt->fetch();

  // Vérification du mot de passe
  if ($utilisateur && password_verify($mot_de_passe, $utilisateur['mot_de_passe'])) {
      $_SESSION['nom_utilisateur'] = $nom_utilisateur;
      $_SESSION['id_utilisateur'] = $utilisateur['id'];
      header("Location: index.php");
      exit;
  } else {
      $erreur_connexion = "Nom d'utilisateur ou mot de passe incorrect.";
      header("Location: index.php?error=" . urlencode($erreur_connexion));
      exit;
  }
}

// Si l'utilisateur clique sur le bouton de déconnexion
if (isset($_POST['deconnexion'])) {
  session_unset(); 
  session_destroy(); // Détruire la session
  header("Location: index.php"); 
  exit;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tendances du moment</title>
<link rel="stylesheet" href="./styles.css">
</head>
<body>

<header>
    <div class="header-container">
        <div class="oval-container">
            <h1 id="site-title">Mon Site Internet</h1>
        </div>
        <nav>
            <?php if (isset($_SESSION['nom_utilisateur'])): ?>
                <button class="login-link" disabled>Bienvenue, <?= htmlspecialchars($_SESSION['nom_utilisateur']); ?></button>
                <!-- Bouton de déconnexion -->
                <form action="index.php" method="post">
                    <button type="submit" name="deconnexion" class="login-link">Déconnexion</button>
                </form>
            <?php else: ?>
                <a href="#modal" class="login-link" id="open-modal">register / login</a>
            <?php endif; ?>
        </nav>
    </div>
</header>
    
<!-- Popup / Modal -->
<div id="modal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>S'inscrire</h2>
      <!-- Formulaire d'inscription -->
      <form id="signup-form" action="index.php" method="post">
        <input type="text" name="nom_utilisateur" placeholder="Nom d'utilisateur" required>
        <input type="email" name="email" placeholder="Adresse Email" required>
        <input type="password" name="mot_de_passe" placeholder="Mot de passe" required>
        <button type="submit" name="inscription">S'inscrire</button>
        <p>Déjà un compte ? <a href="#" onclick="switchModal('modalConnexion', 'modal')">Connexion</a></p>
    </form>
    </div>
  </div>

<!-- Modal Connexion -->
<div id="modalConnexion" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal('modalConnexion')">&times;</span>
      <h2>Connexion</h2>
      <form id="login-form" action="index.php" method="post">
        <input type="text" name="nom_utilisateur" placeholder="Nom d'utilisateur" required>
        <input type="password" name="mot_de_passe" placeholder="Mot de passe" required>
        <button type="submit" name="connexion">Se connecter</button>
        <p>Aucun compte ? <a href="#" onclick="switchModal('modal', 'modalConnexion')">S'inscrire</a></p>
      </form>
    </div>
</div>

<nav class="main-nav">
    <ul>
    <li><a href="#">Pulls</a></li>
    <li><a href="#">Pantalons</a></li>
    <li><a href="#">T-Shirts</a></li>
    <li><a href="#">Pyjamas</a></li>
    <li><a href="#">Parkas</a></li>
    <li><a href="#">Vestes</a></li>
    <li><a href="#">Cramptés</a></li>
    </ul>
</nav>

<main>
    <h1>Tendances du moment</h1>
    <div class="gallery-container">
      <div class="gallery">
      <img src="./img/0d3a771f1537f61c30ca014323b97720.png" alt="Description de l'image">
      <img src="./img/2a3f57cb3f4b2633713700c08c6589c1.jpg" alt="Description de l'image">
      <img src="./img/603418d44be42e467a7ba75e50b35b63.jpg" alt="Description de l'image">
      <img src="./img/caf937c7d0c5a392d8de95951ec34e83.png" alt="Description de l'image">
      <img src="./img/d0146e5fa241c1104de41b0370e2bc24.jpg" alt="Description de l'image">
      <img src="./img/0d3a771f1537f61c30ca014323b97720.png" alt="Description de l'image">
      <img src="./img/2a3f57cb3f4b2633713700c08c6589c1.jpg" alt="Description de l'image">
      <img src="./img/caf937c7d0c5a392d8de95951ec34e83.png" alt="Description de l'image">
      <img src="./img/caf937c7d0c5a392d8de95951ec34e83.png" alt="Description de l'image">
      <img src="./img/d0146e5fa241c1104de41b0370e2bc24.jpg" alt="Description de l'image">
    </div>
    <button id="prev" class="arrow left-arrow">&lt;</button>
    <button id="next" class="arrow right-arrow">&gt;</button>
    </div>
    <div class="indicator-dots">
    </div>
</main>

<script>
    
// Obtenez le modal
var modal = document.getElementById('modal');

// Obtenez le bouton qui ouvre le modal
var btn = document.getElementById("open-modal");

// Obtenez l'élément <span> qui ferme le modal
var span = document.getElementsByClassName("close")[0];

// Lorsque l'utilisateur clique sur le bouton, ouvrez le modal 
btn.onclick = function() {
  modal.style.display = "block";
  document.body.classList.add('modal-open'); // Ajoute une classe au body pour obscurcir le fond
}

// Lorsque l'utilisateur clique sur <span> (x), fermez le modal
span.onclick = function() {
  modal.style.display = "none";
  document.body.classList.remove('modal-open'); // Retire la classe du body
}

function openModal(modalId) {
  document.getElementById(modalId).style.display = 'block';
  document.body.classList.add('modal-open');
}

function closeModal(modalId) {
  document.getElementById(modalId).style.display = 'none';
  document.body.classList.remove('modal-open');
}

function switchModal(openModalId, closeModalId) {
  closeModal(closeModalId);
  openModal(openModalId);
}

// -----------------------------------------------------------------------

const gallery = document.querySelector('.gallery');
const images = gallery.querySelectorAll('img');
const prevButton = document.getElementById('prev');
const nextButton = document.getElementById('next');
const dotsContainer = document.querySelector('.indicator-dots');

const imagesPerPage = 5; // Nombre d'images par page
let currentPage = 0; // La page actuelle du carrousel
let index = 0; // L'index de l'image actuelle

// Calcule le nombre total de pages
const totalPages = Math.ceil(images.length / imagesPerPage);

// Crée des points indicateurs en fonction du nombre de pages
for (let i = 0; i < totalPages; i++) {
  const dot = document.createElement('div');
  dot.classList.add('dot');
  dot.addEventListener('click', () => goToPage(i));
  dotsContainer.appendChild(dot);
}

// Met à jour l'affichage des points indicateurs
function updateDots() {
  const dots = dotsContainer.querySelectorAll('.dot');
  dots.forEach(dot => dot.classList.remove('active'));
  dots[currentPage].classList.add('active');
}

// Déplace le carrousel à la page spécifiée
function goToPage(page) {
  currentPage = page;
  index = currentPage * imagesPerPage;
  updateGallery();
  updateDots();
}

// Met à jour l'affichage du carrousel
function updateGallery() {
  const endIndex = Math.min(index + imagesPerPage, images.length);
  gallery.innerHTML = '';
  for (let i = index; i < endIndex; i++) {
    gallery.appendChild(images[i].cloneNode(true));
  }
}

// Déplace le carrousel vers la page précédente
prevButton.addEventListener('click', () => {
  currentPage = currentPage > 0 ? currentPage - 1 : totalPages - 1;
  index = currentPage * imagesPerPage;
  updateGallery();
  updateDots();
});

// Déplace le carrousel vers la page suivante
nextButton.addEventListener('click', () => {
  currentPage = currentPage < totalPages - 1 ? currentPage + 1 : 0;
  index = currentPage * imagesPerPage;
  updateGallery();
  updateDots();
});

// Initialise le carrousel
updateGallery();
updateDots();

// Actualise le carrousel toutes les 10 secondes
setInterval(() => {
  currentPage = currentPage < totalPages - 1 ? currentPage + 1 : 0;
  index = currentPage * imagesPerPage;
  updateGallery();
  updateDots();
}, 10000);

</script>

</body>
</html>
