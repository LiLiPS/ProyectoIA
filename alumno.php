<?php
    session_start();
    if (!isset($_SESSION["usuario"]) || $_SESSION["rol"] != 2)
        header("location:login.php");

    include("php/conexion.php");
    $conexion = $base->query("SELECT * FROM vista_alumno_grupo");
    $resultado = $conexion->fetch(PDO::FETCH_ASSOC);
    $idGrupo = $resultado["id_grupo"];

    $conexion = $base->query("SELECT * FROM vista_examen_grupo WHERE id_grupo = $idGrupo");
    $examenes = $conexion->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido, <?php echo($_SESSION["nombre"]); ?></title>
</head>
<body>
    <h1>Bienvenido Joven <?php echo($_SESSION["id_usuario"]); ?></h1>
    <h3>Alumno del grupo <?php echo($idGrupo); ?></h3>
    <h2 align="center">Tabla de Exámenes</h2>

    <table align="center" border="1" width="50%">
        <tr>
            <th>Id</th>
            <th>Examen</th>
            <th>+</th>
        </tr>

        <?php foreach($examenes as $examen): ?>
        <tr>
            <td><?php echo($examen->id_examen); ?></td>
            <td><?php echo($examen->nombre); ?></td>
            <td><a href="php/alumno/responderExamen.php?idExamen=<?php echo($examen->id_examen);?>&nombre=<?php echo($examen->nombre);?>">Ir a Examen</a></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <a href="php/cerrarSesion.php">Cerrar Sesión</a>
</body>
</html>