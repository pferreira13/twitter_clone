<?php
    $erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
?>

<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">

        <title>Twitter clone</title>

        <!-- jquery - link cdn -->
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
            integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
            crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="css/estilo.css">

        <script src="js/twitter.js"></script>

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
              <img src="imagens/icone_twitter.png" />
            </div>

            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="inscrevase.php">Inscrever-se</a></li>
                <li class="<?= $erro == 1 ? 'open' : '' ?>">
                    <a id="entrar" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Entrar</a>
                    <ul class="dropdown-menu" aria-labelledby="entrar">
                        <div class="col-md-12">
                            <p>Você possui uma conta?</h3>
                            <br />
                            <form method="post" action="validar_acesso.php" id="formLogin">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="Usuário" />
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha" />
                                </div>

                                <button type="buttom" class="btn btn-primary" id="btn_login">Entrar</button>

                                <br /><br />

                                <?php
                                    if ($erro == 1) {
                                        echo "<font color='#FF000'>
                                        Usuário ou senha inválidos!</font>";
                                    }
                                ?>

                            </form>
                        </form>
                      </ul>
                </li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>


        <div class="container">

          <!-- Main component for a primary marketing message or call to action -->
          <div class="jumbotron">
            <h1>Bem vindo ao twitter clone</h1>
            <p>Veja o que está acontecendo agora...</p>
            <div class='block'>
                <progress class='inline-block'></progress>
                <span class='inline-block'>Indeterminate</span>
            </div>
          </div>

          <div class="clearfix"></div>
        </div>


        </div>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    </body>
</html>
