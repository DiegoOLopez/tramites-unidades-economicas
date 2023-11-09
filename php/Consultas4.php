<?php
if (isset($_POST['Folio'])) {
    $folio_deseado = $_POST['Folio'];

    // Realiza la conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "ueix");

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Consulta 4: Obtener la dirección de la unidad económica
    $query = "SELECT t.folio, ue.id_direccion, d.colonia, d.calle, d.numero_interior, d.numero_exterior
              FROM tramite t
              INNER JOIN unidad_economica ue ON t.id_unidad_e = ue.id_unidad_e
              INNER JOIN direccion d ON ue.id_direccion = d.id_direccion
              WHERE t.folio = '$folio_deseado'";
    $result = $conexion->query($query);

    if ($result->num_rows > 0) {
        echo "<h2>Resultado de la Consulta 4:</h2>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Folio</th>";
        echo "<th>ID de Dirección</th>";
        echo "<th>Colonia</th>";
        echo "<th>Calle</th>";
        echo "<th>Número Interior</th>";
        echo "<th>Número Exterior</th>";
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['folio'] . "</td>";
            echo "<td>" . $row['id_direccion'] . "</td>";
            echo "<td>" . $row['colonia'] . "</td>";
            echo "<td>" . $row['calle'] . "</td>";
            echo "<td>" . $row['numero_interior'] . "</td>";
            echo "<td>" . $row['numero_exterior'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontraron resultados para el folio '$folio_deseado'.";
    }

    $conexion->close();
}
?>
