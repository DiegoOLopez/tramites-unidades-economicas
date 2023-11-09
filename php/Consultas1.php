<?php
// Conexión a la base de datos (reemplaza los valores por los tuyos)
$servername = "localhost";
$username = "root";
$password = "";
$database = "ueix";

$conn = new mysqli($servername, $username, $password, $database);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL
$query = "SELECT t.folio, t.fecha_inicio, t.duracion, t.estado, t.costo, e.nombre AS nombre_empleado, ue.id_direccion
          FROM tramite t
          INNER JOIN empleado e ON t.id_empleado = e.id_empleado
          INNER JOIN unidad_economica ue ON t.id_unidad_e = ue.id_unidad_e";

$result = $conn->query($query);

// Verifica si hay resultados
if ($result->num_rows > 0) {
    echo "<table border='1'>
    <tr>
        <th>Folio</th>
        <th>Fecha Inicio</th>
        <th>Duración</th>
        <th>Estado</th>
        <th>Costo</th>
        <th>Nombre Empleado</th>
        <th>ID de Dirección</th>
    </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["folio"] . "</td>
            <td>" . $row["fecha_inicio"] . "</td>
            <td>" . $row["duracion"] . "</td>
            <td>" . $row["estado"] . "</td>
            <td>" . $row["costo"] . "</td>
            <td>" . $row["nombre_empleado"] . "</td>
            <td>" . $row["id_direccion"] . "</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}
?>
