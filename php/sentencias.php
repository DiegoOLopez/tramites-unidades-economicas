<?php
// Establecer conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "ueix";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

$funcion = $_POST['table'];

// FORMULARIO DIRECCION
$id_direccion = $_POST['id_direccion'] ?? "";
$colonia = $_POST['colonia'] ?? "";
$calle = $_POST['calle'] ?? "";
$numero_interior = $_POST['numero_interior'] ?? "";
$numero_exterior = $_POST['numero_exterior'] ?? "";
$id_direccion_editar = $_POST['id_direccion_editar'] ?? "";
$id_direccion_eliminar = $_POST['id_direccion_eliminar'] ?? "";

// FORMULARIO SOLICITANTE
$rfc_solicitante = $_POST['rfc_solicitante'] ?? "";
$nombre = $_POST['nombre'] ?? "";
$apellido_p = $_POST['apellido_p'] ?? "";
$apellido_m = $_POST['apellido_m'] ?? "";
$numero_telefonico = $_POST['numero_telefonico'] ?? "";
$correo_electronico = $_POST['correo_electronico'] ?? "";
$rfc_solicitante_editar = $_POST['rfc_solicitante_editar'] ?? "";
$rfc_solicitante_eliminar = $_POST['rfc_solicitante_eliminar'] ?? "";

// FORMULARIO TRAMITE
$folio = $_POST['folio'] ?? "";
$fecha_inicio = $_POST['fecha_inicio'] ?? "";
$duracion = $_POST['duracion'] ?? ""; // Cambio de 'tiempo_espera' a 'duracion'
$estado = $_POST['estado'] ?? "";
$costo = $_POST['costo'] ?? ""; // Puedes agregar esta variable si existe en el formulario
$id_unidad_e = $_POST['id_unidad_e'] ?? ""; // Puedes agregar esta variable si existe en el formulario
$id_empleado = $_POST['id_empleado'] ?? ""; // Puedes agregar esta variable si existe en el formulario

// FORMULARIO ENTIDAD ECONOMICA
$id_unidad_e = $_POST['id_unidad_e'] ?? "";
$denominacion = $_POST['denominacion'] ?? "";
$giro = $_POST['giro'] ?? "";
$rfc_solicitante = $_POST['rfc_solicitante'] ?? "";// Puedes agregar esta variable si existe en el formulario
$id_direccion = $_POST['id_direccion'] ?? ""; // Puedes agregar esta variable si existe en el formulario
$id_entidad_economica_editar = $_POST['id_entidad_economica_editar'] ?? "";
$id_entidad_economica_eliminar = $_POST['id_entidad_economica_eliminar'] ?? "";

// FORMULARIO EMPLEADO
$id_empleado = $_POST['id_empleado']??"";
$nombre = $_POST['nombre']??"";
$apellido_p = $_POST['apellido_p']??"";
$apellido_m = $_POST['apellido_m']??"";
$usuario = $_POST['usuario']??"";
$clave = $_POST['clave']??"";
$fecha_alta = $_POST['fecha_alta']??"";

switch ($funcion){
    /** DIRECCIOON - DIEGO*/
    // Direccion registrar
    case "direccion_registrar":
        // Consultar la base de datos para verificar si el usuario y la contraseña son válidos
        $sql = "INSERT INTO `direccion` (`id_direccion`, `colonia`, `calle`, `numero_interior`, `numero_exterior`) VALUES ($id_direccion, '$colonia', '$calle', $numero_interior, $numero_exterior)";
        if ($conn->query($sql) === TRUE) {
            echo "Nuevo registro insertado correctamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        // Cerrar la conexión
        $conn->close();
        break;

    // Casos de y direccion_eliminar
    // Direccion actualizar
    case "direccion_actualizar":
         // Sentencia SQL
        $sql = "UPDATE `direccion` SET
            `id_direccion`= $id_direccion_editar,
            `colonia` = '$colonia',
            `calle` = '$calle',
            `numero_interior` = $numero_interior,
            `numero_exterior` = $numero_exterior
            WHERE `id_direccion` = $id_direccion_editar";
            if ($conn->query($sql) === TRUE) {
                echo "Nuevo registro insertado correctamente";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            // Cerrar la conexión
            $conn->close();
            break;


        // Direccion eliminar
        case "direccion_eliminar":
            // Sentencia SQL
            $sql = "DELETE FROM `direccion` WHERE `id_direccion` = $id_direccion_eliminar";
            if ($conn->query($sql) === TRUE) {
                echo "Nuevo registro insertado correctamente";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            // Cerrar la conexión
            $conn->close();
            break;



    /** SOLICITANTE - OCTAVIO */
    // El Tavo es gei
    case "solicitante_registrar":
        // Insersion de datos
        $sql = "INSERT INTO `solicitante` (`rfc_solicitante`, `nombre`,`apellido_p`,`apellido_m`,`numero_telefonico`,`correo_electronico`) VALUES ('$rfc_solicitante','$nombre','$apellido_p','$apellido_m',$numero_telefonico,'$correo_electronico')";
        if ($conn->query($sql) === TRUE) {
            echo "Nuevo registro insertado correctamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        // Cerrar la conexión
        $conn->close();
        break;

    //Solicitante Actualizar
    case "solicitante_actualizar":
        //Actualización de un solicitante existe
        $sql = "UPDATE `solicitante` set
                `rfc_solicitante` = '$rfc_solicitante_editar',
                `nombre` = '$nombre',
                `apellido_p` = '$apellido_p',
                `apellido_m` = '$apellido_m',
                `numero_telefonico` = $numero_telefonico,
                `correo_electronico` = '$correo_electronico'
            WHERE `rfc_solicitante` = '$rfc_solicitante_editar'";

        if ($conn->query($sql) === TRUE) {
                    echo "Datos de solicitante actualizados correctamente";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
    break;

    //Solicitante Eliminar
    case "solicitante_eliminar":
        //Eliminacion de un solicitante existente
        $sql = "DELETE FROM `solicitante` WHERE `rfc_solicitante` = '$rfc_solicitante_eliminar'";
              if ($conn->query($sql) === TRUE) {
                  echo "Solicitante eliminado correctamente";
              } else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
              }
              $conn->close();
    break;




    /** ENTIDAD ECONOMICA - ERICK */
    // Casos de entidad economica (insertar, actualizar y eliminar)
    case "entidad_economica_registar":
            // Consultar la base de datos para verificar si el usuario y la contraseña son válidos
            $sql = "INSERT INTO `unidad_economica` (`id_unidad_e`, `denominacion`, `giro`, `rfc_solicitante`, `id_direccion`) VALUES ($id_unidad_e, '$denominacion', '$giro', '$rfc_solicitante', $id_direccion)";
            if ($conn->query($sql) === TRUE) {
                echo "Nueva entidad economica insertado correctamente";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            // Cerrar la conexión
            $conn->close();
            break;

    case "entidad_economica_actualizar":
        // Actualización de un trámite existente
        $sql = "UPDATE `unidad_economica`
                SET `id_unidad_e` = $id_entidad_economica_editar,
                    `denominacion` = '$denominacion',
                    `giro` = '$giro',
                    `rfc_solicitante` = '$rfc_solicitante',
                    `id_direccion` = $id_direccion
                WHERE `id_unidad_e` = $id_entidad_economica_editar";
        if ($conn->query($sql) === TRUE) {
            echo "Entidad economica actualizado correctamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
        break;

        // Direccion eliminar
    case "entidad_economica_eliminar":
        // Sentencia SQL
        $sql = "DELETE FROM `unidad_economica` WHERE `id_unidad_e` = $id_entidad_economica_eliminar";
        if ($conn->query($sql) === TRUE) {
            echo "Nuevo registro insertado correctamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        // Cerrar la conexión
        $conn->close();
        break;
    /** TRAMITE - CHRISTIAN*/
    // Casos de tramite (insertar, actualizar y eliminar)

  case "tramite_registrar":
      // Registro de un nuevo trámite
      $sql = "INSERT INTO `tramite` (`folio`, `fecha_inicio`, `duracion`, `estado`, `costo`, `id_unidad_e`, `id_empleado`) VALUES ('$folio', '$fecha_inicio', '$duracion', '$estado', '$costo', '$id_unidad_e', '$id_empleado')";
      if ($conn->query($sql) === TRUE) {
          echo "Nuevo trámite registrado correctamente";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
      $conn->close();
      break;

  case "tramite_actualizar":
      // Actualización de un trámite existente
      $sql = "UPDATE `tramite` SET `estado` = '$estado' WHERE `folio` = '$folio'";
      if ($conn->query($sql) === TRUE) {
          echo "Trámite actualizado correctamente";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
      $conn->close();
      break;

  case "tramite_eliminar":
      $folio_eliminar = $_POST['folio_eliminar'] ?? "";
      // Validación adicional si es necesario

      $sql = "DELETE FROM `tramite` WHERE `folio` = '$folio_eliminar'";
      if ($conn->query($sql) === TRUE) {
          echo "Trámite eliminado correctamente";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
      $conn->close();
      break;

    /** EMPLEADO - ALAN*/
    // Casos de empleado (insertar, actua a lizar y eliminar)


   // Casos de empleado (insertar, actualizar y eliminar)

    case "empleado_insertar":
        // Inserción de datos en empleado
        $id_empleado = $_POST['id_empleado_insertar'];
        $nombre = $_POST['nombre_insertar'];
        $apellido_p = $_POST['apellido_p_insertar'];
        $apellido_m = $_POST['apellido_m_insertar'];
        $usuario = $_POST['usuario_insertar'];
        $clave = $_POST['clave_insertar'];
        $fecha_alta = $_POST['fecha_alta_insertar'];

        if (!empty($id_empleado) && !empty($nombre) && !empty($apellido_p) && !empty($apellido_m) && !empty($usuario) && !empty($clave) && !empty($fecha_alta)) {
            $sql = "INSERT INTO `empleado` (`id_empleado`, `nombre`, `apellido_p`, `apellido_m`, `usuario`, `clave`, `fecha_alta`) VALUES ('$id_empleado', '$nombre', '$apellido_p', '$apellido_m', '$usuario', '$clave', '$fecha_alta')";

            if ($conn->query($sql) === TRUE) {
                echo "Registro insertado correctamente";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Algunos campos no tienen valores válidos";
        }
        // Cerrar conexión
        $conn->close();
        break;

    case "empleado_actualizar":
        // Modificación de datos de empleado
        $id_empleado = $_POST['id_empleado_actualizar'];
        $nombre = $_POST['nombre_actualizar'];
        $apellido_p = $_POST['apellido_p_actualizar'];
        $apellido_m = $_POST['apellido_m_actualizar'];
        $usuario = $_POST['usuario_actualizar'];
        $clave = $_POST['clave_actualizar'];
        $fecha_alta = $_POST['fecha_alta_actualizar'];

        if (!empty($id_empleado) && !empty($nombre) && !empty($apellido_p) && !empty($apellido_m) && !empty($usuario) && !empty($clave) && !empty($fecha_alta)) {
            $sql = "UPDATE `empleado` SET `nombre`='$nombre', `apellido_p`='$apellido_p', `apellido_m`='$apellido_m', `usuario`='$usuario', `clave`='$clave', `fecha_alta`='$fecha_alta' WHERE `id_empleado`= $id_empleado";
            if ($conn->query($sql) === TRUE) {
                echo "Registro actualizado correctamente";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Algunos campos no tienen valores válidos";
        }
        // Cerrar conexión
        $conn->close();
        break;

    case "empleado_eliminar":
        // Eliminación de datos de empleado
        $id_empleado = $_POST['id_empleado_eliminar'];

        if (!empty($id_empleado)) {
            $sql = "DELETE FROM `empleado` WHERE `id_empleado`= $id_empleado";
            if ($conn->query($sql) === TRUE) {
                echo "Registro eliminado correctamente";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "El campo 'id_empleado' no tiene un valor válido";
        }
        // Cerrar conexión
        $conn->close();
        break;
}
?>