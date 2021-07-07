<?php
    //Encerrando Sessão
    session_start();
    session_unset();
    session_destroy();
    header('Location: login.php');
?>