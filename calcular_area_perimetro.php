<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introducir Lados de la Figura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
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
            color: #4169e1;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #4169e1;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #4169e1;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4169e1;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #001f3f;
        }

        /* Estilos para el botón de volver */
        button {
            background-color: #4169e1;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #001f3f;
        }
        </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            Swal.fire({
                title: 'Primer paso hecho',
                icon: 'success',
                confirmButtonText: 'Continuar',
                onAfterClose: function () {
                    window.location.href = 'resultado.php';
                }
            });

            $("form").submit(function (event) {
                event.preventDefault();
                if (validarFormulario()) {
                    $.ajax({
                        type: $(this).attr("method"),
                        url: $(this).attr("action"),
                        data: $(this).serialize(),
                        success: function (data) {
                            $("#result-box").html(data);
                        }
                    });
                }
            });
        });

            function validarFormulario() {
    var tipoFigura = $("input[name='tipoFigura']").val();
    var lado1 = parseFloat($("input[name='lado1']").val());
    var lado2 = parseFloat($("input[name='lado2']").val());
    var radio = parseFloat($("input[name='radio']").val());


            if ((tipoFigura === "Cuadrado" || tipoFigura === "Rectangulo") && (lado1 <= 0 || lado2 <= 0)) {
                alert("Los cm de cuadrados y rectángulos deben ser mayores que cero.");
                return false;
            }

            if (tipoFigura === "Triangulo" && (lado1 <= 0 || lado2 <= 0)) {
                alert("Los cm del triángulo deben ser mayores que cero.");
                return false;
            }

            if (tipoFigura === "Circulo" && radio <= 0) {
                alert("El cm del círculo debe ser mayor que cero.");
                return false;
            }

            return true;
        }

        function esNumeroValido(valor) {
            // Utiliza una expresión regular para verificar si el valor es un número válido
            // Se permite el uso de punto decimal
            return /^[0-9]+(\.[0-9]+)?$/.test(valor);
        }

        function volverAIndex() {
            window.location.href = 'index.php';
        }
    </script>
</head>

<body>
    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $tipoFigura = $_GET["tipoFigura"];

            echo "<h1>Introduce los lados de la figura $tipoFigura:</h1>";

            echo "<form method='post' action='resultado.php'>";
            echo "<input type='hidden' name='tipoFigura' value='$tipoFigura'>";

            if ($tipoFigura == "Triangulo" || $tipoFigura == "Rectangulo") {
                echo "Lado 1: <input type='text' name='lado1' oninput='validarNumeroDecimal(this)'><br>";
                echo "Lado 2: <input type='text' name='lado2' oninput='validarNumeroDecimal(this)'><br>";
            } elseif ($tipoFigura == "Circulo") {
                echo "Radio: <input type='text' name='radio' oninput='validarNumeroDecimal(this)'><br>";
            } else {
                echo "Lado: <input type='text' name='lado1' oninput='validarNumeroDecimal(this)'><br>";
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
