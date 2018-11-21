$(document).ready(function(){
    $('.numeric').on('keyup change', function(event){
        var cantidad = Math.round($(this).val());
        ajaxupdate($(this).attr("data-id"), cantidad);
    });
    function ajaxupdate(id, cantidad) {
        $.ajax({
            type: "POST",
            url: basePath + "item_previos/itemupdate",
            data: {
                id: id,
                cantidad: cantidad
            },
            dataType: "json",
            success: function (data) {
                if($('#subtotal_' + data.mostrar_item.id).html() != data.mostrar_item.subtotal){
                    $('#subtotal_' + data.mostrar_item.id).html(data.mostrar_item.subtotal).animate
                    ({backgroundColor: "#ff8"}, 100).animate({backgroundColor: "#fff"}, 500);
                }
                
                $('#total').html('S/ ' + data.mostrar_item.total).animate
                ({backgroundColor: "#ff8"}, 100).animate({backgroundColor: "#fff"}, 500);
            }
        });
    }




});