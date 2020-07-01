<?php
    session_start();


    $usuario_atenticado = false;
    $usuario_id = null;
    $perfis = array(1 => 'adm', 2 => 'usuario'); 
    $usuario_perfil_id = null; 

    $usuarios_app = array(
        array('id' => 1, 'email' => 'caah.sfc@live.com', 'senha' => '123', 'perfil_id' => 1),
        array('id' => 2, 'email' => 'nokylevs@gmail.com', 'senha' => '123', 'perfil_id' => 1),
        array('id' => 3, 'email' => 'usuario@usuario.com', 'senha' => '123', 'perfil_id' => 2)
    );

    foreach ($usuarios_app as $user) {
        if($user['email'] == $_POST['email'] &&
            $user['senha'] == $_POST['senha']){
                $usuario_atenticado = true;
                $usuario_id = $user['id'];
                $usuario_perfil_id = $user['perfil_id'];
        } 
    }

    if($usuario_atenticado){
        echo 'usuário autenticado';
        $_SESSION['autenticado'] = 'sim';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        header('Location: home.php');
    } else {
        //FORÇA O REDIRECIONAMENTO
        $_SESSION['autenticado'] = 'não';
        header('Location: index.php?login=erro');
    }

?>