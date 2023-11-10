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

// Obtener los datos del formulario
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

// Aplicar cifrado SHA1 a la contraseña ingresada
$clave_sha1 = sha1($clave);

// Consultar la base de datos para verificar si el usuario y la contraseña son válidos
$sql = "SELECT * FROM empleado WHERE usuario='$usuario' AND clave='$clave_sha1'";
$result = $conn->query($sql);
$datos = $result->fetch_assoc();

// Verificar si se encontraron resultados
if ($datos['usuario'] == $usuario && $datos['clave'] == $clave_sha1 ) {
    // Iniciar sesión y redirigir a la página de inicio
    session_start();
    $_SESSION['username'] = $usuario;
    $_SESSION['estado'] = true;
    header('Location: panel.html');
} else {
    // Si el nombre de usuario o la contraseña son incorrectos, mostrar un mensaje de error
    echo "Nombre de usuario o contraseña incorrectos. Vuelve a intentarlo.";
}

// Cerrar la conexión
$conn->close();
?>
