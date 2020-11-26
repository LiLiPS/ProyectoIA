<?php
    include("../conexion.php");

    $preguntas = [];
    $palabrasClave = [];
    $nombreExamen = $_POST["nombreExamen"];

    for ($i=0; $i < (count($_POST) - 1) / 2; $i++) {
        $preguntas[$i] = $_POST["p" . $i];
        $palabrasClave[$i] = $_POST["pc" . $i];
    }

    $sql = "INSERT INTO Examen (nombre) VALUES (:nom)";

    $resultado = $base->prepare($sql);
    $resultado->execute(array(":nom"=>$nombreExamen));

    $lastIDExamen = "SELECT LAST_INSERT_ID()";
    $resultado = $base->prepare($lastIDExamen);
    $resultado->execute();
    $lastIDExamen = $resultado->fetchColumn();

    for ($i=0; $i < count($preguntas); $i++) { 
        $insertPregunta = "INSERT INTO Pregunta (id_examen, pregunta) VALUES (:idE, :preg)";
        $resultado = $base->prepare($insertPregunta);
        $resultado->execute(array(":idE"=>$lastIDExamen, ":preg"=>$preguntas[$i]));

        $lastIDPregunta = "SELECT LAST_INSERT_ID()";
        $resultado = $base->prepare($lastIDPregunta);
        $resultado->execute();
        $lastIDPregunta = $resultado->fetchColumn();

        $insertPalClave = "INSERT INTO Palabras_clave (id_pregunta, palabras_clave) VALUES (:idP, :pc)";
        $resultado = $base->prepare($insertPalClave);
        $resultado->execute(array(":idP"=>$lastIDPregunta, ":pc"=>$palabrasClave[$i]));
    }
    
    header("Location:../../nuevoExamen.php");
?>