<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                title: 'Procesando informacion',
                icon: 'success',
                confirmButtonText: 'Continuar',
                onAfterClose: function () {
                    // Redirige al usuario después de hacer clic en "Continuar"
                    window.location.href = 'resultado.php';
                }
            });
        });
    </script>

<?php

abstract class FiguraGeometrica
{
    protected $tipoFigura;
    protected $lado1;

    public function __construct($tipoFigura, $lado1)
    {
        $this->tipoFigura = $tipoFigura;
        $this->lado1 = $lado1;
    }

    public function getTipoFigura()
    {
        return $this->tipoFigura;
    }

    public function setTipoFigura($tipoFigura)
    {
        $this->tipoFigura = $tipoFigura;
    }

    public function getLado1()
    {
        return $this->lado1;
    }

    public function setLado1($lado1)
    {
        $this->lado1 = $lado1;
    }

    abstract public function area();

    public function __destruct()
    {
        // Destructor
    }
}


interface PerimetroM
{
    public function perimetro();
}


class Triangulo extends FiguraGeometrica implements PerimetroM
{
    private $lado2;

    public function __construct($tipoFigura, $lado1, $lado2)
    {
        parent::__construct($tipoFigura, $lado1);
        $this->lado2 = $lado2;
    }

    public function getLado2()
    {
        return $this->lado2;
    }

    public function setLado2($lado2)
    {
        $this->lado2 = $lado2;
    }

    public function area()
    {
        // Implementa la fórmula del área para el triángulo
        return ($this->getLado1() * $this->lado2) / 2;
    }

    public function perimetro()
    {
        // Implementa la fórmula del perímetro para el triángulo
        return $this->getLado1() + $this->lado2 + $this->getLado2();
    }
}


class Rectangulo extends FiguraGeometrica implements PerimetroM
{
    private $lado2;

    public function __construct($tipoFigura, $lado1, $lado2)
    {
        parent::__construct($tipoFigura, $lado1);
        $this->lado2 = $lado2;
    }

    public function getLado2()
    {
        return $this->lado2;
    }

    public function setLado2($lado2)
    {
        $this->lado2 = $lado2;
    }

    public function area()
    {
        // Implementa la fórmula del área para el rectángulo
        return $this->getLado1() * $this->lado2;
    }

    public function perimetro()
    {
        // Implementa la fórmula del perímetro para el rectángulo
        return 2 * ($this->getLado1() + $this->lado2);
    }

    public function toString()
    {
        return "Tipo de figura: " . $this->getTipoFigura() . ", Lado1: " . $this->getLado1() . ", Lado2: " . $this->lado2;
    }
}


class Cuadrado extends FiguraGeometrica implements PerimetroM
{
    public function area()
    {
        // Implementa la fórmula del área para el cuadrado
        return pow($this->getLado1(), 2);
    }

    public function perimetro()
    {
        // Implementa la fórmula del perímetro para el cuadrado
        return 4 * $this->getLado1();
    }

    public function toString()
    {
        return "Tipo de figura: " . $this->getTipoFigura() . ", Lado: " . $this->getLado1();
    }
}

class Circulo extends FiguraGeometrica implements PerimetroM
{
    public function area()
    {
        // Implementa la fórmula del área para el círculo
        return pi() * pow($this->getLado1(), 2);
    }

    public function perimetro()
    {
        // Implementa la fórmula del perímetro para el círculo
        return 2 * pi() * $this->getLado1();
    }

    public function toString()
    {
        return "Tipo de figura: " . $this->getTipoFigura() . ", Radio: " . $this->getLado1();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de la Figura</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
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

        .result-box {
            background-color: #fff; /* Color del fondo del resultado */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        p {
            margin: 10px 0;
        }

        .success-icon {
            color: #28a745; /* Color del icono de éxito */
            font-size: 3em;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tipoFigura = $_POST["tipoFigura"];

            if ($tipoFigura == "Triangulo") {
                $lado1 = $_POST["lado1"];
                $lado2 = $_POST["lado2"];
                $triangulo = new Triangulo($tipoFigura, $lado1, $lado2);
                echo "<div class='result-box'>";
                echo "<div class='success-icon'>✔</div>";
                echo "<h1>Resultados para el Triángulo:</h1>";
            } elseif ($tipoFigura == "Rectangulo") {
                $lado1 = $_POST["lado1"];
                $lado2 = $_POST["lado2"];
                $rectangulo = new Rectangulo($tipoFigura, $lado1, $lado2);
                echo "<div class='result-box'>";
                echo "<div class='success-icon'>✔</div>";
                echo "<h1>Resultados para el Rectángulo:</h1>";
            } elseif ($tipoFigura == "Cuadrado") {
                $lado1 = $_POST["lado1"];
                $cuadrado = new Cuadrado($tipoFigura, $lado1);
                echo "<div class='result-box'>";
                echo "<div class='success-icon'>✔</div>";
                echo "<h1>Resultados para el Cuadrado:</h1>";
            } elseif ($tipoFigura == "Circulo") {
                $radio = $_POST["radio"];
                $circulo = new Circulo($tipoFigura, $radio);
                echo "<div class='result-box'>";
                echo "<div class='success-icon'>✔</div>";
                echo "<h1>Resultados para el Círculo:</h1>";
            }

            echo "<p>Tipo de figura: $tipoFigura </p>";

            if (isset($lado1)) {
                echo "<p>Medida(s) introducido(s): $lado1 cm";
                if (isset($lado2)) {
                    echo ", $lado2";
                }
            } elseif (isset($radio)) {
                echo "<p>Radio introducido: $radio cm";
            }

            echo "</p>";

            if (isset($triangulo)) {
                echo "<p>Área: " . $triangulo->area() . "cm²</p>";
                echo "<p>Perímetro: " . $triangulo->perimetro() . "cm</p>";
            } elseif (isset($rectangulo)) {
                echo "<p>Área: " . $rectangulo->area() . "cm²</p>";
                echo "<p>Perímetro: " . $rectangulo->perimetro() . "cm</p>";
                echo "<p>" . $rectangulo->toString() . "cm</p>";
            } elseif (isset($cuadrado)) {
                echo "<p>Área: " . $cuadrado->area() . "cm²</p>";
                echo "<p>Perímetro: " . $cuadrado->perimetro() . "cm</p>";
                echo "<p>" . $cuadrado->toString() . "cm</p>";
            } elseif (isset($circulo)) {
                echo "<p>Área: " . $circulo->area() . "cm²</p>";
                echo "<p>Perímetro: " . $circulo->perimetro() . "cm</p>";
                echo "<p>" . $circulo->toString() . "cm</p>";
            }

            echo "</div>";
        }
        ?>
    </div>
</body>

</html>
