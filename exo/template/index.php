<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <title>Accueil</title>
</head>
<body>
    <!-- Header -->
    <header>
        <button id="toggle-menu" onclick="toggleMenu()">&#9776;</button>
        <nav id="menuContent">
            <ul>
                <li><a href="home.php"><b>Home</b></a></li>
                <li><a href="link1.php"><b>Link 1</b></a></li>
                <li><a href="link2.php"><b>Link 2</b></a></li>
                <li><a href="link3.php"><b>Link 3</b></a></li>
                <li><a href="link4.php"><b>Link 4</b></a></li>
            </ul>
        </nav>
    </header>

    <!-- Contenu de la page -->
    <div class="content">
        <h1><b>START PAGE</b></h1>
        <p>Template by w3.css.</p>
        <a href="#" class="rectangular-button">Get Started</a>
    </div>
    <div class="text1">
        <p><b>Lorem Ipsum</b></p>
    </div>
    <div class="text2">
        <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. 
            Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux 
            de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, 
            sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, 
            plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.
        </p>
        <img class="photoancre" src="./picture/ancre.png">
    </div>

    <script>
        function toggleMenu() {
            var menu = document.getElementById("menuContent");
            if (menu.style.display === "block" || menu.style.display === "") {
                menu.style.display = "none";
            } else {
                menu.style.display = "block";
            }
        }
    </script>
</body>
</html>
