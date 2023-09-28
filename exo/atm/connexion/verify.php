<?php 
require_once('../../../function/db.php');
if (isset($_GET) && !empty($_GET)) {
    $select = $bdd->prepare('SELECT * FROM users WHERE id=? AND token=?');
    $select->execute(array(
        $_GET['id'],
        $_GET['token']
    ));
    $select = $select->fetchAll();
    if (empty($select)) 
        header('Location: login.php');
} else 
    header('Location: login.php');

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Vérifier</title>
</head>
<body>
    <form action="" method="post">
        <input type="submit" value="Confirmer">
    </form>

</body>
</html>