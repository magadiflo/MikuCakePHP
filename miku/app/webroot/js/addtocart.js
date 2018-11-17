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
            },
            error: function(){
                alert("Tenemos problemas [addtocart.js]");
            }
        });
        return false;
    });
});