<?php
    session_start();
    include("../conexion.php");

    $idExamen = $_POST["id_examen"];
    $idUsuario = $_SESSION["id_usuario"];

    $conexion = $base->query("SELECT id_pregunta FROM Pregunta WHERE id_examen = $idExamen");
    $preguntas = $conexion->fetchAll(PDO::FETCH_OBJ);

    for ($i=1; $i < count($_POST); $i++) {
        $respuestas[$i-1] = $_POST["r" . ($i-1)];
    }

    $sql = "SELECT id_alumno FROM Alumno WHERE id_usuario = $idUsuario";
    $resultado = $base->prepare($sql);
    $resultado->execute();
    $alumno = $resultado->fetch(PDO::FETCH_ASSOC);

    for ($i=0; $i < count($respuestas); $i++) {
        $insertRespuesta = "INSERT INTO Respuesta_alumno (id_examen, id_pregunta, id_alumno, respuesta) VALUES (:idE, :idP, :idA, :resp)";
        $resultado = $base->prepare($insertRespuesta);
        $resultado->execute(array(":idE"=>$idExamen, ":idP"=>$preguntas[$i]->id_pregunta, ":idA"=>$alumno["id_alumno"], "resp"=>$respuestas["$i"]));
    }


    //Falta calificar Examen
    header("Location:../../alumno.php");
?>