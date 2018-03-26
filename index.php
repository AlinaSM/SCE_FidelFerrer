<?php
    require 'logic\conexion.php';
    require 'login.php';
   
    if(!empty($_POST["txtUsuario"]) && !empty($_POST["txtContrasena"])){
        consultarUsuario($conexion, $_POST["txtUsuario"], $_POST["txtContrasena"]);
    }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets\css\estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <title>SCE: Fidel Ferrer</title>
</head>
<body>

    <header>
        <div class = "head-inicio">
            <h1>Sistema de Control Escolar</h1>
            <h2>Fidel Ferrer</h2>
            <img class="logo-escuela" src="assets\img\logo.jpg">

        </div>
    </header>

    <div>
         <h2> Inicio de Sesion </h2>
        <form action="#" method="POST" autocomplete="off" class="login-form" >
            <label class="login-form__label">Usuario</label>
            <input class="login-form__input" type="text" name="txtUsuario" required > 
            <label class="login-form__label">Contraseña</label>
            <input class="login-form__input" type="password" name="txtContrasena" required> 
            <input class="login-form__submit" type="submit" class="button" value="Enviar">
        </form>
    </div>

    

</body>
</html>