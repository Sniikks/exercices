<?php
    session_start();
?>
<header>
    <button>Mon Site Internet</button>
    <button <?php 
    isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo']) ? print('onclick="OpenSlideBar()"')  : print('onclick="OpenLoginMenu()"') ?> >
        <?php 
        // if (isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])) {
        //     print($_SESSION['pseudo']);
        // } else {
        //     print('Register / Login');
        // }

        isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo']) ? 
            print($_SESSION['pseudo']) 
        : print('Register / Login')

        ?>
    </button>
</header>
<nav>
    <ul>
        <li>Pulls</li>
        <li>Pantalons</li>
        <li>T-Shirts</li>
        <li>Pyjamas</li>
        <li>Parkas</li>
        <li>Vestes</li>
        <li>Cramptés</li>
    </ul>
</nav>