var miModal = new bootstrap.Modal(document.getElementById('mi-modal'), {});

function  funcionFolio(){
    var folio = document.getElementById('folio').value;
    obtenerDatos(folio)

}


function obtenerDatos(folio){
    localStorage.clear();
    if (folio != ""){

        $.ajax({
            url: './php/consulta_tramite.php',
            type: 'post',
            data: {opc:1,folio:folio},
            // Especificamos el tipo de datos que recibiremos de php
            dataType: 'json',
            success: function(respuesta){
                if(respuesta == 0) {
                    $(".modal_folio_invalido").on('hidden.bs.modal', function(){
                        window.location.href = "tramite.html";
                    });
                    $(".modal_folio_invalido").modal('show');
                }else{
                    var fecha_inicio = respuesta.fecha_inicio;
                    var denominacion = respuesta.denominacion;
                    var estado = respuesta.estado;
                    var duracion = respuesta.duracion;
                    var nombre = respuesta.nombre;
                    //$(".datos").append(respuesta);
                    // Almacenar los datos en localStorage
                    localStorage.setItem('fecha_inicio', fecha_inicio);
                    localStorage.setItem('denominacion', denominacion);
                    localStorage.setItem('estado', estado);
                    localStorage.setItem('duracion', duracion);
                    localStorage.setItem('nombre', nombre);
                    // Redirigir a la página resultado_tramite.html
                    window.location.href = "resultado_consulta.html";
                }
            }
        })

    }else {
        $(".modal_folio_no_ingresado").on('hidden.bs.modal', function(){
            window.location.href = "tramite.html";
        });
        $(".modal_folio_no_ingresado").modal('show');
    }

}