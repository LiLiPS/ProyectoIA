<?php
    $preguntas = [];
    $palabrasClave = [];
    for ($i=0; $i < count($_POST)/2; $i++) {
        $preguntas[$i] = $_POST["p" . $i];
        $palabrasClave[$i] = $_POST["pc" . $i];
    }
?>