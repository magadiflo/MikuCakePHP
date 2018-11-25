$(document).ready(function(){

//SLIDER: Tiempo de transición.
$('.carousel').carousel({
    interval: 10000,
    pause: "hover"
});
/*MODAL: Muestra pasos para hacer el pedido.*/
$("#btnPasos").on("click", function () {
    console.log("mostrando pasos");
    $('#cuadro-mostrar-pasos').modal({
        show: true
    });
});
/*MODAL: Muestra formulario de acceso o registro al sistema*/
$(".enlace-iniciar-sesion").on("click", function () {
    $('#cuadro-iniciar-sesion').modal({
        show: true
    });
    limpiaCamposIniciarSesion();
});
/*MODAL: Ventana de registro final de nuevo usuario*/
$("#btn-registrar").on("click", function (e) {
    e.preventDefault();
    var emailRegistro = $("#email-registro").val();
    var terminosCondiciones = $('input:checkbox[name=terminos-condiciones]:checked').val();
    if (emailRegistro.length <= 0 || !esEmail(emailRegistro)) {
        $("#grupo-email-registro").addClass("has-error");
        return;
    } else if (terminosCondiciones === undefined) {
        alert("Debe aceptar los términos y condiciones para continuar con el registro.");
        return;
    } else {
        $("#UserEmail").val(emailRegistro);
        $('#cuadro-iniciar-sesion')
            .modal('hide')
            .on('hidden.bs.modal', function (e) {
                $('#modal-registro-final').modal('show');
                $(this).off('hidden.bs.modal');
            });
    }
});
function esEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}
function limpiaCamposIniciarSesion() {
    $("#email-acceso").val('');
    $('#pass-acceso').val('');
    $("#email-registro").val('');
    $("#terminos-condiciones").prop('checked', false);
}

});