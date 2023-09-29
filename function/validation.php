<?php
require_once('db.php');
?>

<?php
    // Si method post est rentrer dans le formulaire il faut utiliser $_POST.
    // Sinon si la mehod get est rentrer dans le formulaire il faut utiliser $_GET
    // La fonction isset sert à regarder si la variable qui lui est donner est bien défini dans ce cas si elle regarde
    // si la variable $_POST est défini
        if (isset($_POST) && !empty($_POST)) {
            //echo '<pre>'; var_dump($_POST); echo '</pre>';
            //echo $_POST['firstname'];
                // SHAL Hash le mot c'est à dire le compléxifier et le rend illisible.
                // sha1 / md5
            
            //echo sha1($_POST['password']). "<br>";
            //echo md5($_POST['password']);
        
        $insert = $bdd->prepare('INSERT INTO utilisateur(firstname, lastname, email, password, gender) VALUES (?, ?, ?, ?, ?)');
        $insert->execute(array(
        $_POST['firstname'], 
        $_POST['lastname'], 
        $_POST['email'], 
        md5($_POST['password']), 
        $_POST['gender']
        ));
        header('Location: index.php');

    
    // Permet de selectionné dans la base de donnée, les valeurs de l'utilisateur ayant comme genre male.
    // Ainsi les données seront dans un tableau (ARRAY).
    $select = $bdd->prepare('SELECT * FROM utilisateur WHERE gender=?;');
    $select->execute(array("male"));
    $total = $select->fetchAll(PDO::FETCH_ASSOC);

    echo '<pre>';
    var_dump($total);
    echo '</pre>';

    echo $total[8]['gender'];
    }
?>
