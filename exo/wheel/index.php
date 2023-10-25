<?php
$color_count = 25;
$colors = ['yellow', 'orange', 'lightcoral', 'darkred', 'blue',
'yellow', 'orange', 'lightcoral', 'darkred', 'blue',
'yellow', 'orange', 'lightcoral', 'darkred', 'blue',
'yellow', 'orange', 'lightcoral', 'darkred', 'blue',
'yellow', 'orange', 'lightcoral', 'darkred', 'blue'
];
$color_step = 360 / count($colors);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .color-wheel-container {
            width: 500px; /* Ajustez la taille souhaitée */
            height: 500px; /* Ajustez la taille souhaitée */
            position: relative;
        }

        .color-wheel {
            width: 100%;
            height: 100%;
            position: absolute;
            background: conic-gradient(
                <?php
                for ($i = 0; $i < $color_count; $i++) {
                    $color_index = $i % count($colors);
                    $color = $colors[$color_index];
                    $start_angle = $i * $color_step;
                    $end_angle = ($i + 1) * $color_step;
                    echo $color . " " . $start_angle . "deg " . $end_angle . "deg";
                    if ($i < $color_count - 1) {
                        echo ",";
                    }
                }
                ?>
            );
            transition: transform 7s ease-in-out;
            border-radius: 50%;
        }

        .number-top {
            position: absolute;
            font-size: 16px;
            font-weight: bold;
            color: white;
            transform: translateX(-50%);
        }

        .number-top:nth-child(2n) {
            top: -5px;
        }

        .number-top:nth-child(2n + 1) {
            bottom: -5px;
        }

        #spin-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .result-triangle {
            position: absolute;
            top: 0px;
            left: 50%;
            width: 0;
            height: 0;
            border-left: 15px solid transparent;
            border-right: 15px solid transparent;
            border-top: 15px solid red;
            transform: translateX(-50%);
        }
    </style>
    <title>Roue de couleurs</title>
</head>
<body>
    <div class="color-wheel-container">
        <div class="color-wheel">
            <?php
            for ($i = 1; $i <= 25; $i++) {
                $start_angle = $i * 14.3;
                $left = 50 - cos(deg2rad($start_angle)) * 45;
                $top = 50 - sin(deg2rad($start_angle)) * 45;
                echo "<div class='number-top' style='left: $left%; top: $top%;'>$i</div>";
            }
            ?>
        </div>
        <div class="result-triangle"></div>
        <button id="spin-button">Tourner</button>
    </div>
    <button id="auto-spin-button">Lancer Auto'</button>
    <script>
        let spinning = false;
        let autoSpinInterval = null;

    document.getElementById("spin-button").addEventListener("click", function() {
        if (!spinning) {
            spinning = true;
            const wheel = document.querySelector(".color-wheel");
            wheel.style.transition = "transform 5s ease-in-out";
            const randomRotation = Math.floor(Math.random() * 360 + 3600);
            wheel.style.transform = `rotate(${randomRotation}deg)`;

            wheel.addEventListener("transitionend", function() {
                wheel.style.transition = "none";
                spinning = false;
                announceResult(randomRotation); // Appel de la fonction pour annoncer le résultat
            });
        }
    });

    document.getElementById("auto-spin-button").addEventListener("click", function() {
            if (!spinning) {
                startAutoSpinning();
            }
        });

        function startAutoSpinning() {
            spinning = true;
            const wheel = document.querySelector(".color-wheel");
            const spinInterval = 7000; // Durée de la rotation automatique (7 secondes)

            autoSpinInterval = setInterval(() => {
                const randomRotation = Math.floor(Math.random() * 360 + 3600);
                wheel.style.transition = "transform 5s ease-in-out";
                wheel.style.transform = `rotate(${randomRotation}deg)`;

                wheel.addEventListener("transitionend", function() {
                    wheel.style.transition = "none";
                    spinning = false;
                    announceResult(randomRotation);
                });
            }, spinInterval);
        }

        function announceResult(rotation) {
            const result = calculateResult(rotation);
            alert(result);
        }

        function calculateResult(rotation) {
            const colors = ['yellow', 'orange', 'lightcoral', 'darkred', 'blue'];
            const colorStep = 360 / colors.length;
            const colorIndex = Math.floor((rotation % 360) / colorStep);
            const winningColor = colors[colorIndex];

            const segmentCount = 25;
            const degreePerSegment = 360 / segmentCount;

            // Ajuster le calcul du segment gagnant
            const normalizedRotation = (rotation % 360 + 360) % 360;
            const segmentIndex = Math.floor((normalizedRotation + degreePerSegment / 2) / degreePerSegment);
            let winningNumber = (segmentIndex + 1) % segmentCount;
            if (winningNumber === 0) {
                winningNumber = segmentCount;
            }

            return `Couleur gagnante : ${winningColor}, Numéro gagnant : ${winningNumber}`;
        }

</script>
    </script>
    </script>
</body>
</html>
