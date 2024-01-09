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

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipoFigura = $_POST["tipoFigura"];

    if ($tipoFigura == "Triangulo") {
        $lado1 = $_POST["lado1"];
        $lado2 = $_POST["lado2"];
        $triangulo = new Triangulo($tipoFigura, $lado1, $lado2);
        echo "<h1>Resultados para el Triángulo:</h1>";
    } elseif ($tipoFigura == "Rectangulo") {
        $lado1 = $_POST["lado1"];
        $lado2 = $_POST["lado2"];
        $rectangulo = new Rectangulo($tipoFigura, $lado1, $lado2);
        echo "<h1>Resultados para el Rectángulo:</h1>";
    } elseif ($tipoFigura == "Cuadrado") {
        $lado1 = $_POST["lado1"];
        $cuadrado = new Cuadrado($tipoFigura, $lado1);
        echo "<h1>Resultados para el Cuadrado:</h1>";
    } elseif ($tipoFigura == "Circulo") {
        $radio = $_POST["radio"];
        $circulo = new Circulo($tipoFigura, $radio);
        echo "<h1>Resultados para el Círculo:</h1>";
    }

    echo "<p>Tipo de figura: $tipoFigura</p>";

    if (isset($lado1)) {
        echo "<p>Lado(s) introducido(s): $lado1";
        if (isset($lado2)) {
            echo ", $lado2";
        }
    } elseif (isset($radio)) {
        echo "<p>Radio introducido: $radio";
    }

    echo "</p>";

    if (isset($triangulo)) {
        echo "<p>Área: " . $triangulo->area() . "</p>";
        echo "<p>Perímetro: " . $triangulo->perimetro() . "</p>";
    } elseif (isset($rectangulo)) {
        echo "<p>Área: " . $rectangulo->area() . "</p>";
        echo "<p>Perímetro: " . $rectangulo->perimetro() . "</p>";
        echo "<p>" . $rectangulo->toString() . "</p>";
    } elseif (isset($cuadrado)) {
        echo "<p>Área: " . $cuadrado->area() . "</p>";
        echo "<p>Perímetro: " . $cuadrado->perimetro() . "</p>";
        echo "<p>" . $cuadrado->toString() . "</p>";
    } elseif (isset($circulo)) {
        echo "<p>Área: " . $circulo->area() . "</p>";
        echo "<p>Perímetro: " . $circulo->perimetro() . "</p>";
        echo "<p>" . $circulo->toString() . "</p>";
    }
}
?>
