<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un chat</title>
</head>
<body>
    <h1>Ajouter un chat à la liste</h1>
    <form action="process_add_cat.php" method="post">
        <label for="description">Description :</label>
        <textarea id="description" name="description" required></textarea>
        
        <label for="photo">Photo du chat :</label>
        <input type="file" id="photo" name="photo" accept="image/*" required>
        
        <input type="submit" value="Ajouter le chat">
    </form>
</body>
</html>
