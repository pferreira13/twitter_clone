<?php
    require_once 'db.class.php';
    session_start();

    if (!isset($_SESSION['id_usuario'])) {
        header('Location: index.php?erro=2');
    }

    $texto_tweet = $_POST['texto_tweet'];
    $id_usuario = $_SESSION['id_usuario'];

    if ($id_usuario == '' || $texto_tweet == '') {
        die();
    }
    //echo $texto_tweet;

    $objDB = new DB();
	$link = $objDB->conecta_mysql();

    $sql = "INSERT INTO TWEET(ID_USUARIO, TWEET) VALUES('$id_usuario', '$texto_tweet')";
    //echo $sql;
    mysqli_query($link, $sql);
?>
