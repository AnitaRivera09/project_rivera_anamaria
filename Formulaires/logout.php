<?php
session_start(); // Asegúrate de iniciar la sesión

session_destroy(); // Destruye la sesión

// Redirige a la página de inicio
header("Location: ../Formulaires/home.php");
exit; // Asegúrate de detener la ejecución del script después de la redirección
?>