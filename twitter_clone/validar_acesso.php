<?php

    session_start();

	require_once 'db.class.php';

    $usuario = $_POST['usuario'];
    $senha = md5($_POST['senha']);

    $objDB = new DB();
    $link = $objDB->conecta_mysql();

    $sql = "SELECT * FROM USUARIOS WHERE USUARIO = '$usuario' AND SENHA = '$senha'";
    $resultado_id = mysqli_query($link, $sql);
    //echo $sql;

    if($resultado_id){
        $dados_usuario = mysqli_fetch_array($resultado_id);
        //var_dump($dados_usuario);
        if(isset($dados_usuario['USUARIO'])){
            //echo "Usuário existe";

            $_SESSION['usuario'] = $dados_usuario['USUARIO'];
            $_SESSION['email'] = $dados_usuario['EMAIL'];
            $_SESSION['id_usuario'] = $dados_usuario['ID'];

            header('Location: home.php');
        } else {
            //echo "Usuário não existe";
            header('Location: index.php?erro=1');
        }
    } else {
        echo "Erro na execução da consulta!";
    }
?>
