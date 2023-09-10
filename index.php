<?php
session_start();

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

// Aquí asumo que guardas el nombre del usuario en la sesión. Si no es el caso, ajusta la línea siguiente.
$nombreUsuario = $_SESSION['nombre'];

// Inclusión de componentes
include 'assets/header.php';
?>

<!-- Contenido principal -->
<div class="container mt-5">
    <h1>Bienvenido, <?php echo $nombreUsuario; ?>!</h1>
    <p>Has ingresado al Sistema de Cotizaciones Shama.</p>

    <!-- Aquí puedes agregar más contenido relevante para tu página de inicio -->

</div>

<?php
// Inclusión del footer
include 'assets/footer.php';
?>
