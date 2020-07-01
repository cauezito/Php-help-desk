<?php
    //sempre utilizar quando for trabalhar com sessão
    session_start();

    
    session_destroy();
    header('Location: index.php');
?>