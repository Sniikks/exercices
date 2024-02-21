<section id='slideBar'>
        <button> <?php echo $_SESSION['pseudo'] ?> </button>
        <div>
            <button onclick="Profil()">Profil</button>
            <button>Paramètres</button>
            <button id="ButtonMode" onclick="ToggleMode()">Mode Nuit</button>
            <button onclick="Deconnexion()">Déconnexion</button>
        </div>
    </section>