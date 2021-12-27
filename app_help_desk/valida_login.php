<?php

session_start();

$usuario_id = null;
$autenticado = false;

// perfil_id 1 = administrativo
// perfil_id 2 = usuario normal

$usuarios = array(
    array('id' => '1','email' => 'adm@teste.com.br', 'senha' => '123456', 'perfil_id' => '1'),
    array('id' => '2','email' => 'user@teste.com.br', 'senha' => 'abcd', 'perfil_id' => '1'),
    array('id' => '3','email' => 'jose@teste.com.br', 'senha' => 'abcd', 'perfil_id' => '2'),
    array('id' => '4','email' => 'maria@teste.com.br', 'senha' => 'abcd', 'perfil_id' => '2'),
);


foreach ($usuarios as $usuario) {
    if ($_POST['email'] == $usuario['email'] && $_POST['senha'] == $usuario['senha']) {
        $autenticado = true;
        $usuario_id = $usuario['id'];
        $usuario_perfil_id = $usuario['perfil_id'];
    }
}

if ($autenticado) {
    header('location:home.php');
    $_SESSION['autenticado'] = 'sim';
    $_SESSION['id'] = $usuario_id;
    $_SESSION['perfil_id'] = $usuario_perfil_id;
} else {
    header('location: index.php?login=erro');
    $_SESSION['autenticado'] = 'nao';
}
