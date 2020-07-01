<?php
    session_start();


    $usuario_atenticado = false;

    $usuarios_app = array(
        array('email' => 'caah.sfc@live.com', 'senha' => '134679'),
        array('email' => 'nokylevs@gmail.com', 'senha' => 'abc')
    );

    foreach ($usuarios_app as $user) {
        if($user['email'] == $_POST['email'] &&
            $user['senha'] == $_POST['senha']){
                $usuario_atenticado = true;
        } 
    }

    if($usuario_atenticado){
        echo 'usuário autenticado';
        $_SESSION['autenticado'] = 'sim';
    } else {
        //FORÇA O REDIRECIONAMENTO
        $_SESSION['autenticado'] = 'não';
        header('Location: index.php?login=erro');
    }

?>