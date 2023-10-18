<!DOCTYPE html>
<html>
<head>
    <title>Calculatrice en PHP</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="num1" placeholder="Saisir le nombre/chiffre" required>
        <select name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="text" name="num2" placeholder="Saisir le nombre/chiffre" required>
        <input type="submit" value="Calculer">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $operator = $_POST["operator"];
        $result = 0;

        switch ($operator) {
            case "+":
                $result = $num1 + $num2;
                break;
            case "-":
                $result = $num1 - $num2;
                break;
            case "*":
                $result = $num1 * $num2;
                break;
            case "/":
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    echo "Division par zéro impossible.";
                }
                break;
            default:
                echo "Opérateur invalide.";
        }

        echo '<p class="result">Résultat : ' . $num1 . ' ' . $operator . ' ' . $num2 . ' = ' . $result . '</p>';
    }
    ?>
</body>
</html>
