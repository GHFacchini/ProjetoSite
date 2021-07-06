
<?php

    session_start();
    if(!isset($_SESSION['id_usuario']))
    {
        header("Location: index.php");
        exit;
    }
    
    require_once 'CLASSES/solicitacao.php';
    $s = new Solicitacao;

?>
<html lang="pt-br">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap"
      rel="stylesheet"/>
    <link rel="stylesheet" href="css/main.css" />

    <title>THELIVERY</title>
  </head>
  <body>
    <!--HEADER-->
    <div id="header">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
          <a class="navbar-brand" href="site.php">
            <span id="logo">THElivery</span>
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
            >
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" href="site.php">Página Inicial</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="site.php#servicos">Restaurantes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contato</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="sair.php">Sair</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
    <!--//HEADER-->

    <!--SERVICOS-->
    <div class="container">
      <main>
        <div class="py-5 text-center">
          <p class="lead">Deseja cadastrar o seu estabelecimento em nosso site? Basta preencher o formulário com os seus dados e logo nós entraremos em contato!</p>
        </div>
        <div class="row g-5">
          <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">Insira os seus dados</h4>
            <form method ="POST">
              <div class="row g-3">
                <div class="col-sm-6">
                  <label for="nome" class="form-label">Nome</label>
                  <input type="text" name="nome" class="form-control" id="nome" placeholder="" required>
                </div>

                <div class="col-sm-6">
                  <label for="sobrenome" class="form-label">Sobrenome</label>
                  <input type="text" name="sobrenome" class="form-control" id="sobrenome" placeholder="" required>
                </div>

                <div class="col-sm-6">
                  <label for="restaurante" class="form-label">Nome do estabelecimento</label>
                  <input type="text" name="restaurante" class="form-control" id="restaurante" placeholder="" required>
                </div>

                <div class="col-sm-6">
                  <label for="telefone" class="form-label">Telefone</label>
                  <input type="tel" name="telefone" class="form-control" id="telefone" placeholder="" required>
                </div>

                <div class="col-12">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="email@exemplo.com" required>
                </div>

                <div class="col-12">
                  <label for="endereco" class="form-label">Endereço</label>
                  <input type="text" name="endereco" class="form-control" id="endereco" placeholder="Rua abc 123" required>
                </div>

                <div class="col-md-5">
                  <label for="categoria" class="form-label">Categoria</label>
                  <select class="form-select" name="categoria" id="categoria" required>
                    <option value="">Escolha</option>
                    <option value="Hamburguer">Hamburguer</option>
                    <option value="Pizza">Pizza</option>
                    <option value="Doce">Doce</option>
                    <option value="Salgado">Salgado</option>
                    <option value="Caseira">Caseira</option>
                    <option value="Japonesa">Japonesa</option>
                    <option value="Outro">Outro</option>
                  </select>
                </div>

                <div class="col-md-5">
                  <label for="categoria_sec" class="form-label">Categoria secundária<span class="text-muted">(Opcional)</span></label>
                  <select class="form-select" name="categoria_sec" id="categoria_sec" >
                    <option value="">Escolha</option>
                    <option value="Hamburguer">Hamburguer</option>
                    <option value="Pizza">Pizza</option>
                    <option value="Doce">Doce</option>
                    <option value="Salgado">Salgado</option>
                    <option value="Caseira">Caseira</option>
                    <option value="Japonesa">Japonesa</option>
                    <option value="Outro">Outro</option>
                  </select>
                </div>
              </div>
              <hr class="my-4">
              <button class="w-100 btn btn-lg btn-primary mb-3" type="submit" value="Cadastrar">Cadastrar</button>
              <hr class="my-4">
              <hr class="my-4">
              <hr class="my-4">
              <hr class="my-4">
              <hr class="my-4">
            </form>
            
            <?php
            
                //verificar POST
                if(isset($_POST['nome']))
                {
                    $nome = addslashes($_POST['nome']);
                    $sobrenome = addslashes($_POST['sobrenome']);
                    $nome_rest = addslashes($_POST['restaurante']);
                    $telefone = addslashes($_POST['telefone']);
                    $email = addslashes($_POST['email']);
                    $endereco = addslashes($_POST['endereco']);
                    $categoria = addslashes($_POST['categoria']);
                    $categoria_sec = addslashes($_POST['categoria_sec']);


                    if(!empty($nome) &&  !empty($sobrenome) && !empty($nome_rest) && !empty($telefone)
                    && !empty($email) &&!empty($endereco) && !empty($categoria))
                    {
                        $s->conectar("projeto_web", "localhost", "root", "");
                        if($s->msgErro == "") //deu tudo certo
                        {
                                if($s->cadastrar($nome, $sobrenome, $nome_rest, $telefone, $email, $endereco, $categoria, $categoria_sec))
                                {
                                    ?>
                                    <div class="alert alert-success text-center" role="alert">
                                        Cadastrado com sucesso!
                                    </div>

                                    <?php
                                }else
                                {
                                    ?>
                                    <div class= "alert alert-warning text-center" role="alert">
                                        Restaurante já cadastrado!"
                                    </div>
                                    <?php
                                }
                            
                        }else
                        {
                            ?>
                            <div class= "alert alert-warning text-center" role="alert">
                                <?php echo "Erro: ".$r->msgErro;?>
                            </div>
                            <?php
                        }
                    }else
                    {
                        ?>
                        <div class= "alert alert-warning position-absolute top-100 start-50 translate-middle" role="alert">
                            Preencha todos os campos!
                        </div>
                        <?php
                    }
                }
                ?>
          </div>
        </div>
      </main>
    </div>
        <!--JS-->
            <script src="js/bootstrap.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="js/isotope.pkgd.min.js"></script>
            <script src="js/main.js"></script>
        <!--//JS--> 

  </body>
</html>
