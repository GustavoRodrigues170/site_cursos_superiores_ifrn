<?php
    
    session_start();

    unset($_SESSION['emailUsuario']);
    unset($_SESSION['senhaUsuario']);

    header('Location: login.php');

?>