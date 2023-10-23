<nav>
    <div>
        <h1>FlexBox</h1>
    </div>
    
    <div>
        <?php
            echo getcwd();
        ?>
        <a href=<?php
            echo (getcwd() == '/var/www/html/cours_php/TamakiYagami.github.io/exo/flexbox/Vues' ? "audio.php" : "Vues/audio.php")
        ?>>Audio</a>
        <a href=<?php
            echo (getcwd() == '/var/www/html/cours_php/TamakiYagami.github.io/exo/flexbox/Vues' ? "video.php" : "Vues/video.php")
        ?>>Audio</a>>Video</a>
        <a href=<?php
            echo (getcwd() == '/var/www/html/cours_php/TamakiYagami.github.io/exo/flexbox/Vues' ? "image.php" : "Vues/image.php")
        ?>>Image</a>
    </div>
</nav>