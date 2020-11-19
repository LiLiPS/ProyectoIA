<?php
    try {
        $base = new PDO("mysql:host=localhost; dbname=examen;", "root", "");
        $base -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM Usuario WHERE usuario= :login AND contrasenia= :password";
        $resultado = $base->prepare($sql);
        $login = htmlentities(addslashes($_POST["usuario"]));
        $password = htmlentities(addslashes($_POST["pass"]));
        
        $resultado->bindValue(":login", $login);
        $resultado->bindValue(":password", $password);
        $resultado->execute();
        
        $registro = $resultado->fetch(PDO::FETCH_ASSOC);

        $noRegistros = $resultado->rowCount();

        if ($noRegistros != 0) {
            session_start();
            $_SESSION["usuario"] = $_POST["usuario"];
            $_SESSION["nombre"] = $registro["nombre"];
            $_SESSION["rol"] = $registro["id_rol"];

            if ($registro["id_rol"] == 1)
                header("location:../docente.php");
            else
                header("location:../alumno.php");
        } else
            header("location:../login.php");
    } catch (Exception $e) {
        die("Error: " . $e -> getMessage());
    }
?>