<?php
    require_once 'db.class.php';
    session_start();

    if (!isset($_SESSION['id_usuario'])) {
        header('Location: index.php?erro=2');
    }

    $id_usuario = $_SESSION['id_usuario'];

    $objDB = new DB();
	$link = $objDB->conecta_mysql();

    $sql = "SELECT DATE_FORMAT(t.DATA_INCLUSAO, '%d/%m/%Y %T') DATA_INCLUSAO,
                   t.TWEET,
                   u.USUARIO
              FROM TWEET t
             INNER JOIN USUARIOS u
                ON u.ID = t.ID_USUARIO
             WHERE t.ID_USUARIO = '$id_usuario'
                OR t.ID_USUARIO IN (
                    SELECT us.ID_USUARIO
                      FROM USUARIOS_SEGUIDORES us
                     WHERE us.ID_USUARIO = u.ID)
             ORDER BY t.DATA_INCLUSAO DESC";
    //echo $sql;
    $resultado_id = mysqli_query($link, $sql);
    if ($resultado_id) {
        while ($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)) {
            //var_dump($registro);
            //<a href="#" class="list-group-item">
            //</a>
            echo '
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">'.$registro['USUARIO'].' <small> - '.$registro['DATA_INCLUSAO'].'</small></h4>
                    <p class="list-group-item-text">
                        '.$registro['TWEET'].'
                    </p>
                </a>';
            echo "";
        }
    } else {
        echo "Erro ao executar consulta no banco de dados!";
    }
?>
