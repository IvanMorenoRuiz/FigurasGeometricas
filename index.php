<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipoFigura = $_POST["tipoFigura"];

    if ($tipoFigura == "Triangulo") {
        header("Location: calcular_area_perimetro.php?tipoFigura=Triangulo");
    } elseif ($tipoFigura == "Rectangulo") {
        header("Location: calcular_area_perimetro.php?tipoFigura=Rectangulo");
    } elseif ($tipoFigura == "Cuadrado") {
        header("Location: calcular_area_perimetro.php?tipoFigura=Cuadrado");
    } elseif ($tipoFigura == "Circulo") {
        header("Location: calcular_area_perimetro.php?tipoFigura=Circulo");
    }
}
?>
 
 

 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Figura</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Selecciona el tipo de figura:</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="tipoFigura">Tipo de Figura:</label>
            <select name="tipoFigura" id="tipoFigura">
                <option value="Triangulo">Triángulo</option>
                <option value="Rectangulo">Rectángulo</option>
                <option value="Cuadrado">Cuadrado</option>
                <option value="Circulo">Círculo</option>
            </select>
            <br><br>
            <input type="submit" value="Siguiente">
        </form>
    </div>
</body>

</html>
