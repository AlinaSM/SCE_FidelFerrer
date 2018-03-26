<?php
    session_start(); //Inicia una nueva sesión o reanuda la existente 
    session_destroy();// Destruye toda la información registrada de una sesión

    header('location: index.php');//Redirecciona a la página de login
?>