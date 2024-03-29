

$(document).ready(function () {
    Swal.fire({
        title: 'Primer paso hecho',
        icon: 'success',
        confirmButtonText: 'Continuar',
        onClose: function () {
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

    if (tipoFigura === "Triangulo" || tipoFigura === "Rectangulo") {
        var lado1 = parseFloat($("input[name='lado1']").val());
        var lado2 = parseFloat($("input[name='lado2']").val());

        if (lado1 <= 0 || lado2 <= 0 || isNaN(lado1) || isNaN(lado2)) {
            Swal.fire({
                title: 'Error',
                text: 'Por favor, ingresa valores válidos para los lados.',
                icon: 'error'
            });
            return false;
        }
    } else if (tipoFigura === "Circulo") {
        var radio = parseFloat($("input[name='radio']").val());

        if (radio <= 0 || isNaN(radio)) {
            Swal.fire({
                title: 'Error',
                text: 'Por favor, ingresa un valor válido para el radio.',
                icon: 'error'
            });
            return false;
        }
    } else {
        var lado = parseFloat($("input[name='lado1']").val());

        if (lado <= 0 || isNaN(lado)) {
            Swal.fire({
                title: 'Error',
                text: 'Por favor, ingresa un valor válido para el lado.',
                icon: 'error'
            });
            return false;
        }
    }
    Swal.fire({
        title: 'Procesando la información...',
        icon: 'success'
    });
    return true;
}

function validarNumeroDecimal(input) {
    // Utiliza una expresión regular para permitir solo números y punto decimal
    input.value = input.value.replace(/[^0-9.]/g, '');

    // Asegúrate de que no haya más de un punto decimal
    if (input.value.split('.').length > 2) {
        input.value = input.value.substring(0, input.value.lastIndexOf('.'));
    }
}

function volverAIndex() {
    window.location.href = 'index.php';
}

