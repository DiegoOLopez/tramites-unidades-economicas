<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$folio = $_POST['folio'];

$servername = "localhost";
$username = "root";
$password = "";
$database = "ueix";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

$sql = "SELECT t.fecha_inicio, ue.denominacion, t.estado,t.duracion, s.nombre FROM tramite t, unidad_economica ue, solicitante s WHERE t.folio = '$folio' and ue.id_unidad_e = t.id_unidad_e and s.rfc_solicitante = ue.rfc_solicitante";


    $exe = $conn->query($sql);

    if($datos = $exe->fetch_assoc()) {
        echo json_encode($datos);
    }else{
        echo json_encode(0);
    }

    $conn->close();

?>