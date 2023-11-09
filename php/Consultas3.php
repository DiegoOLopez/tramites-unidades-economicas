<?php
    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "ueix");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Consulta
    $query = "SELECT s.nombre, s.apellido_p, s.apellido_m, COUNT(t.folio) AS cantidad_tramites
              FROM solicitante s
              LEFT JOIN tramite t ON s.rfc_solicitante = t.id_unidad_e
              GROUP BY s.nombre, s.apellido_p, s.apellido_m";

    $result = $conexion->query($query);

    if ($result->num_rows > 0) {
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
        echo "No se encontraron resultados.";
    }

    // Cerrar la conexión
    $conexion->close();
    ?>
