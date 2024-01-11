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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Color de fondo */
            color: #333; /* Color del texto */
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            text-align: center;
        }

        h1 {
            color: #4169e1; /* Color del encabezado */
        }

        form {
            background-color: #fff; /* Color del fondo del formulario */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #4169e1; /* Color del texto de la etiqueta */
        }

        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #4169e1; /* Color del borde del cuadro de selección */
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4169e1; /* Color del fondo del botón */
            color: #fff; /* Color del texto del botón */
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #001f3f; /* Color de fondo al pasar el ratón sobre el botón */
        }
    </style>
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
