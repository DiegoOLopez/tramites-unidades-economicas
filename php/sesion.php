<?php

session_start();
if(isset($_SESSION['estado'])){
    $estatus_sesion = 1;
}else{
    $estatus_sesion = 0;
}

echo json_encode($estatus_sesion);

?>