<?php
require_once('../inc/db.php');

if (isset($_POST) && !empty($_POST)) {
    $insert = $BDD->prepare("INSERT INTO users (pseudo, email, password) VALUES (?, ?, ?)");
    $insert->execute(array (
        $_POST['pseudo'],
        $_POST['email'],
        password_hash($_POST['password'], PASSWORD_ARGON2I)
    ));
}
header('Location: ../../index.php');