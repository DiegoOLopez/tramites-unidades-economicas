$.ajax({
    url: './php/sesion.php',
    type: 'post',
    dataType: 'json',
    success:function (respuesta){
        if (respuesta === 0){
            window.location.href = "login.html";
        }
    }
})