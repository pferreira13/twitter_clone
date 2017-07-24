<?php

	require_once 'db.class.php';
	$usuario = $_POST['usuario'];
	$email = $_POST['email'];
	$senha = md5($_POST['senha']);

	$objDB = new DB();
	$link = $objDB->conecta_mysql();

    $usuario_existe = false;
    $email_existe = false;

    $sql = "SELECT * FROM USUARIOS WHERE USUARIO = '$usuario'";
    if ($resultado_id = mysqli_query($link, $sql)){
        $dados_usuario = mysqli_fetch_array($resultado_id);
        if (isset($dados_usuario['USUARIO'])) {
            $usuario_existe = true;
        }

    } else {
        echo "Erro ao tentar localizar usuário!";
    }

    $sql = "SELECT * FROM USUARIOS WHERE EMAIL = '$email'";
    if ($resultado_id = mysqli_query($link, $sql)){
        $dados_usuario = mysqli_fetch_array($resultado_id);
        if (isset($dados_usuario['EMAIL'])) {
            $email_existe = true;
        }

    } else {
        echo "Erro ao tentar localizar usuário!";
    }

    if ($usuario_existe || $email_existe) {
        $retorno_get;
        if ($usuario_existe) {
            $retorno_get.= "erro_usuario=1&";
        }
        if ($email_existe) {
            $retorno_get.= "erro_email=1&";
        }

        header("Location: inscrevase.php?".$retorno_get);
        die();
    }

	$sql = "INSERT INTO USUARIOS(USUARIO, EMAIL, SENHA) VALUES ('$usuario','$email','$senha')";

	if (mysqli_query($link, $sql)){
		echo "Usuário registrado com sucesso!";
	} else {
		echo "Erro ao cadastrar!";
	}
?>
