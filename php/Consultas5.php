<?php
if (isset($_POST['Nombre'])) {
    $nombre = $_POST['Nombre'];

    // Realiza la conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "ueix");

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Consulta 4: Cantidad de trámites
    $query = "SELECT s.nombre, s.apellido_p, s.apellido_m, COUNT(t.folio) AS cantidad_tramites
              FROM solicitante s
              LEFT JOIN tramite t ON s.rfc_solicitante = t.id_unidad_e
              WHERE s.nombre = '$nombre'
              GROUP BY s.nombre, s.apellido_p, s.apellido_m";
    $result = $conexion->query($query);

    if ($result->num_rows > 0) {
        echo "<h2>Resultado de la Consulta 5:</h2>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Nombre</th>";
        echo "<th>Apellido Paterno</th>";
        echo "<th>Apellido Materno</th>";
        echo "<th>Cantidad de Trámites</th>";
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['apellido_p'] . "</td>";
            echo "<td>" . $row['apellido_m'] . "</td>";
            echo "<td>" . $row['cantidad_tramites'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontraron resultados para el nombre '$nombre'.";
    }

    $conexion->close();
}
?>

