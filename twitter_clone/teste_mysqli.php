<?php

	require_once 'db.class.php';

    $objDB = new DB();
    $link = $objDB->conecta_mysql();

    $sql = "SELECT * FROM USUARIOS";
    $resultado_id = mysqli_query($link, $sql);
    //echo $sql;

    if($resultado_id){
        //MYSQLI_NUM
        $dados_usuario = array();
        while ($linha = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)) {
            $dados_usuario[] = $linha;
        }
        foreach ($dados_usuario as $d) {
            var_dump($d);
            echo "<br />";
        }
        //var_dump($dados_usuario);

    } else {
        echo "Erro na execução da consulta!";
    }
?>
