<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $tipoFigura = $_GET["tipoFigura"];

    echo "<h1>Introduce los lados de la figura $tipoFigura:</h1>";

    echo "<form method='post' action='resultado.php'>";
    echo "<input type='hidden' name='tipoFigura' value='$tipoFigura'>";

    if ($tipoFigura == "Triangulo" || $tipoFigura == "Rectangulo") {
        echo "Lado 1: <input type='text' name='lado1'><br>";
        echo "Lado 2: <input type='text' name='lado2'><br>";
    } elseif ($tipoFigura == "Circulo") {
        echo "Radio: <input type='text' name='radio'><br>";
    } else {
        echo "Lado: <input type='text' name='lado1'><br>";
    }

    echo "<br><input type='submit' value='Calcular'>";
    echo "</form>";
}
?>
