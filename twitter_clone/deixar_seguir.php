<?php
    require_once 'db.class.php';
    session_start();

    if (!isset($_SESSION['id_usuario'])) {
        header('Location: index.php?erro=2');
    }

    $id_seguidor = $_POST['id_seguidor'];
    $id_usuario = $_SESSION['id_usuario'];

    if ($id_usuario == '' || $id_seguidor == '') {
        die();
    }
    //echo $texto_tweet;

    $objDB = new DB();
	$link = $objDB->conecta_mysql();

    $sql = "DELETE FROM USUARIOS_SEGUIDORES
             WHERE ID_USUARIO = $id_usuario
               AND ID_SEGUIDOR = $id_seguidor";
    //echo $sql;
    mysqli_query($link, $sql);
?>
