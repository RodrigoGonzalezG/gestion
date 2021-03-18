$(document).on('ready', function () {
    $('#btnLogin').click(function () {
        var url = "php/Valida_sesion.php";
        var dato;
        $.ajax({
            type: "POST",
            url: url,
            data: $("#formLogin").serialize(),
            success: function (data) {
                console.log(data);
                if (data == "1") {
                    console.log(data);
                    location.href = "Views/Panel_principal.php";
                }
                if (data == "2") {
                        console.log(data);
                    swal({
                        title: "Aviso de proceso!",
                        text: "A ocurrido un error, el usuario no ha sido activado.!",
                        icon: "error",
                        button: "Aceptar!",
                    });
                }
                
                if (data == "3") {
                    console.log(data);
                    swal({
                        title: "Aviso de proceso!",
                        text: "A ocurrido un error, la contraseña es incorrecta.!",
                        icon: "error",
                        button: "Aceptar!",
                    });
                }
                
                if (data == "4") {
                    console.log(data);
                    swal({
                        title: "Aviso de proceso!",
                        text: "A ocurrido un error, el usuario es incorrecto.!",
                        icon: "error",
                        button: "Aceptar!",
                    });
                }

            }
        });

    });
});
