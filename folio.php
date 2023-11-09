<?php 
/*require_once("conexion.php");
$sql = "SELECT t.fecha_inicio, ue.nombre, t.estado, t.duracion, s.nombre, s.apellido_p,s.apellido_m, g.nombre, g.apellido_p, g.apellido_m
FROM tramite t, unidad_economica ue, solicitante s, gestor g
WHERE t.folio = user_folio and t.rfc_solicitante = s.rfc_solicitante and t.id_gestor = g.id_gestor";

$exe = $mysql->query($sql);
$count = 1;

while ($datos = $exe->fetch_assoc())
    echo 
    '
    <tr>
        <th scope="row">'.$count'</th>
        <td>'.$datos[t.fecha_inicio].'</td>

    </tr>
    ';*/
    $count++;
    $fecha = '12/04/2022';
    $UnidadEconomica = 'Tienda';
    echo json_encode(array('fecha'=>$fecha,'UnidadEconomica'=>$UnidadEconomica));
?>