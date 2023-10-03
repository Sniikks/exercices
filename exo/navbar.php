<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <title>NavBar</title>
    <link rel="stylesheet" href="../style/navbar.css">
</head>
<body>
    <nav class="soft">
        <span>Soft UI PRO</span>
        <ul>
            <li><a href="">Pages<box-icon name="chevron-down"></box-icon></a></li>
            <li><a href="">Account<box-icon name="chevron-down"></box-icon></a></li>
            <li><a href="">Blocks<box-icon name="chevron-down"></box-icon></a></li>
            <li><a href="">Docs<box-icon name="chevron-down"></box-icon></a></li>
        </ul>
        
        <button class="kinder">BUY NOW</button>
        <box-icon id="menu" name="menu" size="25px"></box-icon>
    </nav>
    <ul id="slide">
        <li><a href="">Pages</a></li>
        <li><a href="">Account</a></li>
        <li><a href="">Blocks</a></li>
        <li><a href="">Docs</a></li>
    </ul>
    <script>
        let menu = document.getElementById('menu')
        menu.addEventListener('click', function() {
            let list = document.getElementById('slide')
            list.style.display = 'flex';
        })

    </script>
</body>
</html>