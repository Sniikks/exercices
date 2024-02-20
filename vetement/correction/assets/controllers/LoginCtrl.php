<?php
require_once('../inc/db.php');

if (isset($_POST) && !empty($_POST)) {
    $select = $BDD->prepare ("SELECT * FROM users WHERE pseudo=?");
    $select->execute(array(
        $_POST['pseudo']
    ));
    $select = $select->fetch();
    if ($select) {
        if (password_verify($_POST['password'], $select['password']) ) {
            session_start();
            $_SESSION = $select;

        }
    }
}
header('Location: ../../index.php');