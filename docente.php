<?php
    session_start();
    if (!isset($_SESSION["usuario"]) || $_SESSION["rol"] != 1)
        header("location:login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido, profesor/a <?php echo($_SESSION["nombre"]); ?></title>
</head>
<body>
    <h1>Bienvenido Profesor/a <?php echo($_SESSION["nombre"]) ?></h1>
    <p>Página solo de docentes</p>
    <a href="php/cerrarSesion.php">Cerrar Sesión</a>
</body>
</html>