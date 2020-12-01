<?php
    session_start();
    if (!isset($_SESSION["usuario"]) || $_SESSION["rol"] != 2)
        header("location:../../login.php");

    $idExamen = $_GET["idExamen"];
    $nombre = $_GET["nombre"];

    include("../conexion.php");
    $conexion = $base->query("SELECT * FROM Pregunta WHERE id_examen= $idExamen");
    $preguntas = $conexion->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen</title>
</head>
<body>
    <h1><?php echo($nombre); ?></h1>

    <form action="../docente/revisarExamen.php" method="post">
        <input type="hidden" name="id_examen" value="<?php echo($idExamen);?>">
        <?php $i = 0; foreach($preguntas as $pregunta): ?>
        <p>
            <?php echo("$pregunta->pregunta"); ?>
            <input type="text" name="<?php echo("r$i"); ?>" id="<?php echo("r$i"); ?>">
        </p>
        <?php $i++; endforeach; ?>
        <input type="submit" value="Enviar">
    </form>
    <a href="../cerrarSesion.php">Cerrar Sesión</a>
</body>
</html>