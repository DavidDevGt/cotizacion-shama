<?php
session_start(); // Iniciar la sesión

if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['usuario_autenticado'] !== true) {
    // Si el usuario no está autenticado, redirige al login
    header("Location: login.php");
    exit;
}
