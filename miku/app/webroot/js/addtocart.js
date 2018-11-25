$(document).ready(function(){
    $('.addtocart').on('click', function(event){
        $.ajax({
            type: "POST",
            url: basePath + "item_previos/add",
            data: {
                id: $(this).attr("id"),
                cantidad: 1
            },
            dataType: "html",
            success: function(data){
                $("#msg").html('<div class="alert alert-success flash-msg">'+
                                    '¡Platillo agregado! '+
                                    '<br><a href="'+basePath+'item_previos/view">'+
                                        '<span class="fa fa-eye"></span> '+
                                        'Ver sus platillos</a></div>');
                $('.flash-msg').delay(3000).fadeOut(5000);
                actualizaVista();
            },
            error: function(){
                alert("Tenemos problemas [addtocart.js]");
            }
        });
        return false;
    });
    function actualizaVista(){
        $.ajax({
            type: "POST",
            url: basePath + "item_previos/num_item_selected",
            dataType: "json",
            success: function (data) {
                console.log("Cantidad de productos: " + (data.muestra_cantidad.cantidad));
                $('.cant-selected').text((data.muestra_cantidad.cantidad)+' Platillos');
            }
        });
    }
});