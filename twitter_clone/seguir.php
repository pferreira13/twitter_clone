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

    $sql = "INSERT INTO USUARIOS_SEGUIDORES(ID_USUARIO, ID_SEGUIDOR)
            VALUES($id_usuario, $id_seguidor)";
    //echo $sql;
    mysqli_query($link, $sql);
?>
