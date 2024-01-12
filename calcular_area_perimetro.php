<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introducir Lados de la Figura</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="script.js"></script>
</head>

<body>
    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $tipoFigura = $_GET["tipoFigura"];

            echo "<h1>Medidas del $tipoFigura:</h1>";

            echo "<form method='post' action='resultado.php'>";
            echo "<input type='hidden' name='tipoFigura' value='$tipoFigura'>";

            if ($tipoFigura == "Triangulo" || $tipoFigura == "Rectangulo") {
                echo "Lado 1 (cm): <input type='text' name='lado1' oninput='validarNumeroDecimal(this)'><br>";
                echo "Lado 2 (cm): <input type='text' name='lado2' oninput='validarNumeroDecimal(this)'><br>";
            } elseif ($tipoFigura == "Circulo") {
                echo "Radio (cm): <input type='text' name='radio' oninput='validarNumeroDecimal(this)'><br>";
            } else {
                echo "Lado (cm): <input type='text' name='lado1' oninput='validarNumeroDecimal(this)'><br>";
            }

            echo "<br><input type='submit' value='Calcular'>";
            echo "<br><br>";
            echo "<button type='button' onclick='volverAIndex()'>Elegir otra figura</button>";
            echo "</form>";

            // Caja de resultados original
            echo "<div class='result-box' id='result-box'></div>";
        }
        ?>
    </div>
</body>

</html>
