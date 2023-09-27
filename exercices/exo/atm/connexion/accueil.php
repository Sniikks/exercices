<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
</head>
<body>
    <h1>Bienvenue</h1>
    <div id="userWelcome">
        <p>Bonjour <span id="userFullName"></span> !</p>
    </div>

    <script>
        // Récupérez le nom et le prénom de l'utilisateur depuis les variables de session (ou les cookies)
        var nomUtilisateur = sessionStorage.getItem("nomUtilisateur");
        var prenomUtilisateur = sessionStorage.getItem("prenomUtilisateur");

        // Affichez le nom et le prénom dans la page
        var userFullNameElement = document.getElementById("userFullName");
        if (nomUtilisateur && prenomUtilisateur) {
            userFullNameElement.textContent = prenomUtilisateur + " " + nomUtilisateur;
        }
    </script>
</body>
</html>