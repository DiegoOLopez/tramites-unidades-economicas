
    <?php
    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "ueix");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Consulta
    $query = "SELECT e.nombre AS nombre_empleado, SUM(t.costo) AS costo_total
              FROM empleado e
              LEFT JOIN tramite t ON e.id_empleado = t.id_empleado
              GROUP BY e.nombre";

    $result = $conexion->query($query);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Nombre Empleado</th>";
        echo "<th>Costo Total</th>";
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['nombre_empleado'] . "</td>";
            echo "<td>" . $row['costo_total'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontraron resultados.";
    }

    // Cerrar la conexión
    $conexion->close();
    ?>