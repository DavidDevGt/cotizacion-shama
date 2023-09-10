<?

$host = '';
$user = '';
$pass = '';
$db = '';

$conexion = new mysqli($host, $user, $pass, $db);

if ($conexion->connect_error) {
    die('Error conectando a la base de datos: ' . $conexion->connect_error);
}

function dbQuery($query) {
    global $conexion;
    return $conexion->query($query);
}

function dbFetchAssoc($resultado) {
    return $resultado->fetch_assoc();
}