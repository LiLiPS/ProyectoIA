<!DOCTYPE html>
<html lang="es">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <form action="php/compruebaLogin.php" method="POST">
        <h1>Inicia Sesión</h1>
        <input type="text" name="usuario" placeholder="Usuario">
        <input type="password" name="pass" placeholder="Contraseña">
        <input type="submit" name="enviar" value="Inicia Sesión">
    </form>
</body>
</html>