$.ajax({
    url: './php/sesion.php',
    type: 'post',
    dataType: 'json',
    success:function (respuesta){
        if (respuesta === 1){
            window.location.href = "panel.html";
        }
    }
})