$(document).ready(function(){
    //Comprobamos que existe la etiqueta con id='flashMessage'
    //Esto solo se ejecutará cuando se guarde, elimine, o actualice datos.
    if($("#flashMessage").length > 0){
        $("#notificacion").delay(200).slideDown('slow');
        setTimeout(function(){
            $("#notificacion").fadeOut(2000);
        }, 5000);
    }
});