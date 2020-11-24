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
    <title>Nuevo Examen</title>
</head>
<body>
    <h1>Nuevo Examen</h1>
    <h4>Presione + para agregar una nueva pregunta</h4>
    <h4>Separe las palabras clave por comas (,).</h4>

    <form action="php/docente/crearExamen.php" method="POST">
        <input type="button" value="+" onClick="display()">
        <br>
        <div id="preguntas"></div>
        <input type="submit" value="Crear">
    </form>
    <a href="php/cerrarSesion.php">Cerrar Sesión</a>
    <script src="js/script.js"></script>
</body>
</html>