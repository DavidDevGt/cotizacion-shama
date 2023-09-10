<?php
session_start();

// Si el usuario ya ha iniciado sesión, redirige a index.php
if (isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit();
}

$error = false;

// Verifica si se está enviando el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include './app/conexion.php';
    include './includes/funciones.php';

    $accion = "iniciar_sesion";
    $respuesta = require './includes/funciones.php';

    // Analizamos la respuesta del proceso en funciones.php
    $datos_respuesta = explode('|', $respuesta);

    if ($datos_respuesta[0] == '1') {
        $_SESSION['usuario_id'] = $usuario['usuario_id'];
        header('Location: index.php');
        exit();
    } else {
        $error = true;
    }


    if ($usuario_id) {
        $_SESSION['usuario_id'] = $usuario_id;
        header('Location: index.php');
        exit();
    } else {
        $error = true;
    }
}

// Inclusión de componentes
include 'assets/header.php';
?>

<div class="container mt-5">
    <h2>Iniciar sesión</h2>

    <?php if ($error) : ?>
        <div class="alert alert-danger">
            Las credenciales proporcionadas son incorrectas.
        </div>
    <?php endif; ?>

    <form action="login.php" method="post">
        <div class="mb-3">
            <label for="correo" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="correo" name="correo" required>
        </div>
        <div class="mb-3">
            <label for="contrasena" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="contrasena" name="contrasena" required>
        </div>
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
</div>

<?php
// Inclusión del footer
include 'assets/footer.php';
?>