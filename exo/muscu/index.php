<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./style.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Accueil</title>

    <script>
    $(document).ready(function() {
        // Gestion du menu hamburger
        $("#toggle-menu").click(function() {
            $("#menuContent").slideToggle("fast");
        });
    });
</script>
</head>
<body>
<header>
    <nav id="menuContent">
        <div>
            <box-icon name="x" type="icon" color="#fff" size='30px'></box-icon>
        </div>
        <ul>
            <li><a href="#.php"><b>RunningClub</b></a></li>
            <li><a href="#.php"><b>Services</b></a></li>
            <li><a href="#.php"><b>FAQ</b></a></li>
            <li><a href="#.php"><b>Contact</b></a></li>
            <li><a href="#.php"><b>Boutique</a></li>
        </ul>
        <div id="menuButton">
            <box-icon name="menu" color="#fff" size="30px"></box-icon>
        </div>
    </nav>
</header>

    <!-- Contenu de la page -->
    <div class="content">
    <img class="photomuscu" src="./muscu.png">
        <h1><b>CORPS CONSCIENT</b></h1>
        <p>Corps Conscient la salle qu'il te faut, car c'est nous les best</p>
        <a href="#" class="rectangular-button">Rejoins nous dès maintenant</a>
    </div>
 <div class="container">
        <div class="left-side">
        <img class="photomuscu1" src="./fond1.png">
        <img class="photomuscu1" src="./fond1.png">
        <img class="photomuscu1" src="./fond1.png">
        <img class="photomuscu1" src="./fond1.png">
        </div>
        <div class="right-side">
        <div class="text1">
                <p><b>A propos de nous</b></p>
            </div>
            <div class="text2">
                <p>Qui sommes-nous?</p>
            </div>
            <div class="text2">
                <p>La muscu c'est de l'entraineeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeemeeeeeeeeeent 
                    La muscu c'est de l'entraineeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeemeeeeeeeeeent 
                    La muscu c'est de l'entraineeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeemeeeeeeeeeent
                    La muscu c'est de l'entraineeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeemeeeeeeeeeent
                    La muscu c'est de l'entraineeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeemeeeeeeeeeent </p>
            </div>
            <div class="text2">
                <p>Alooors reeeeejoiiiins la salle
                    Alooors reeeeejoiiiins la salle
                    Alooors reeeeejoiiiins la salle
                    Alooors reeeeejoiiiins la salle
                    Alooors reeeeejoiiiins la salle </p>
            </div>
            <div class="">
                <p>Classes</p>
            </div>
            <div class="">
                <p>Tous les niveaux</p>
            </div>
            <div class="">
                <p>Prix</p>
            </div>
            <div class="">
                <p>Abordable</p>
            </div>
    </div>

    
    <script>
    $(document).ready(function() {
        function toggleMenu() {
            var isHidden = $('nav ul').is(':hidden');
            var menuButton = $('#menuButton box-icon[name="menu"]');
            var closeButton = $('#menuButton box-icon[name="x"]');

        if (isHidden) {
            $('nav').animate({
                bottom: 0,
                backgroundColor: '#000D1A'
            }, 1000, function() {
                $('nav ul').css('display', 'flex');
            });
            $('nav').addClass('MenuNav');
            menuButton.css('display', 'none');
            closeButton.css('display', 'block');
        } else {
            $('nav').animate({
                bottom: '93.5%',
                backgroundColor: '#000'
            }, 1000, function() {
                $('nav').removeClass('MenuNav');
                menuButton.css('display', 'block');
                closeButton.css('display', 'none');
            });
            $('nav ul').hide();
        }
    }

    function checkWindowSize() {
        if (window.innerWidth > 950) {
            $('nav ul').css('display', 'flex');
            $('#menuButton box-icon[name="menu"]').css('display', 'none');
            $('#menuButton box-icon[name="x"]').css('display', 'none');
        } else {
            $('nav ul').css('display', 'none');
            $('#menuButton box-icon[name="menu"]').css('display', 'block');
            $('#menuButton box-icon[name="x"]').css('display', 'none');
        }
    }

    checkWindowSize();
        $('#menuButton').click(toggleMenu);
        $('box-icon[name="x"]').click(toggleMenu);

        $(window).on('resize', checkWindowSize);
    });
</script>
</body>
</html>


