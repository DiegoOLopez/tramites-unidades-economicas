$(function(){ 
    getData()
})

function getData() {
    $.ajax({
        url: 'folio.php',
        type: 'post',
        data: {opc:1},
        dataType:'json', // Notacion de objeto de JavaScript
        beforeSend: function(){

        },
        succes: function(resultado){
            $(".unidad_economica").html(resultado.UnidadEconomica);
        }
    });
}