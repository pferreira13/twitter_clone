<?php
    require_once 'db.class.php';
    session_start();

    if (!isset($_SESSION['id_usuario'])) {
        header('Location: index.php?erro=2');
    }

    $id_usuario = $_SESSION['id_usuario'];
    $nome_pessoa = $_POST['nome_pessoa'];

    $objDB = new DB();
	$link = $objDB->conecta_mysql();

    $sql = "SELECT *
              FROM USUARIOS u
              LEFT JOIN USUARIOS_SEGUIDORES us
                ON $id_usuario = us.ID_USUARIO
               AND u.ID = us.ID_SEGUIDOR
             WHERE USUARIO LIKE '%$nome_pessoa%'
               AND ID <> $id_usuario";
    //echo $sql;
    $resultado_id = mysqli_query($link, $sql);
    if ($resultado_id) {
        while ($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)) {
            //var_dump($registro);
            //<a href="#" class="list-group-item">
            //</a>
            /*<button type="button" class="btn btn-primary btn_deixar_seguir"
            data-id_usuario="'.$registro['ID'].'">
                Deixar de seguir
            </button>*/
            $seguindo_usuario = isset($registro['ID_SEGUIDOR']) && !empty($registro['ID_SEGUIDOR'])
                                ? true : false;
            $btn_seguir_display = ($seguindo_usuario) ? 'none' : 'block';
            $btn_deixar_seguir_display = ($seguindo_usuario) ? 'block' : 'none';

            echo '
                <a href="#" class="list-group-item">
                    <strong>'.$registro['USUARIO'].'</strong> <small> - '.$registro['EMAIL'].'</small>
                    <p class="list-group-item-text pull-right">
                        <button type="button" class="btn btn-default btn_seguir"
                        data-id_usuario="'.$registro['ID'].'" style="display:'.$btn_seguir_display.'"
                        id="btn_seguir_'.$registro['ID'].'">
                            Seguir
                        </button>
                        <button type="button" class="btn btn-primary btn_deixar_seguir"
                        data-id_usuario="'.$registro['ID'].'"style="display:'.$btn_deixar_seguir_display.'"
                        id="btn_deixar_seguir_'.$registro['ID'].'">
                            Deixar de seguir
                        </button>
                    </p>
                    <div class="clearfix">

                    </div>
                </a>';
        }
    } else {
        echo "Erro ao executar consulta no banco de dados!";
    }
?>
