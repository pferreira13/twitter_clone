<?php
    require_once 'db.class.php';
    session_start();

    if (!isset($_SESSION['usuario'])) {
        header('Location: index.php?erro=2');
    }

    $id_usuario = $_SESSION['id_usuario'];

    $objDB = new DB();
	$link = $objDB->conecta_mysql();


    //TWEETS

    $sql = "SELECT COUNT(t.ID) AS QTD_TWEET
              FROM TWEET t
             WHERE t.ID_USUARIO = $id_usuario";

    $resultado_id = mysqli_query($link, $sql);
    //echo $sql;
    $qtd_tweet = 0;
    if ($resultado_id) {
        $registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
        //var_dump($qtd_tweet);
        $qtd_tweet = $registro['QTD_TWEET'];
    } else {
        echo "Erro ao consultar banco de dados";
    }

    //SEGUIDORES

    $sql = "SELECT COUNT(us.ID_SEGUIDOR) AS QTD_SEGUIDOR
              FROM USUARIOS_SEGUIDORES us
             WHERE us.ID_SEGUIDOR = $id_usuario";

    $resultado_id = mysqli_query($link, $sql);
    //echo $sql;
    $qtd_seguidor = 0;
    if ($resultado_id) {
        $registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
        //var_dump($qtd_tweet);
        $qtd_seguidor = $registro['QTD_SEGUIDOR'];
    } else {
        echo "Erro ao consultar banco de dados";
    }
?>
<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Twitter clone</title>

		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <script src="js\tweet.js"></script>
	</head>

	<body>

		<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
              <a href="home.php">
                  <img src="imagens/icone_twitter.png" />
              </a>

	        </div>

	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="sair.php">Sair</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">

	    	<div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>
                            <?= $_SESSION['usuario'] ?>
                        </h4>
                        <hr />
                        <div class="col-md-6">
                            Tweets
                            <br />
                            <?= $qtd_tweet?>
                        </div>
                        <div class="col-md-6">
                            Seguidores
                            <br />
                            <?= $qtd_seguidor?>
                        </div>
                    </div>
                </div>
            </div>
	    	<div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form id="form_tweet" class="input-group">
                            <input type="text" class="form-control" placeholder="O que está acontecendo agora?"
                            maxlength="140" id="texto_tweet" name="texto_tweet">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button" id="btn_tweet" name="btn_tweet">
                                    Tweet
                                </button>
                            </span>
                        </form>
                    </div>
                </div>

                <div id="tweets" class="list-group">

                </div>
			</div>
			<div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>
                            <a href="procurar_pessoas.php">Procurar</a>
                        </h4>
                    </div>
                </div>
            </div>

		</div>

	    </div>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	</body>
</html>
