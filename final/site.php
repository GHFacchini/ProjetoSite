<?php
    session_start();
    if(!isset($_SESSION['id_usuario']))
    {
        header("Location: index.php");
        exit;
    }else
    {
      require_once 'CLASSES/restaurante.php';
      $r = new Restaurante;

    }


?>
<html lang="pt-br">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap"
      rel="stylesheet"/>
    <link rel="stylesheet" href="css/main.css"/>
    <title>THElivey</title>
  </head>
  <body>
    <!--HEADER-->
    <div id="header">
      <div class="container">
        <nav
          class="navbar navbar-expand-lg navbar-light justify-content-between"
        >
          <a class="navbar-brand" href="#">
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
                <a class="nav-link" href="#servicos">Restaurantes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contato.php">Contato</a>
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

    <!--SLIDER-->
    <div id="slider" class="block">
      <div class="container pt-5">
        <div class="row">
          <div class="col-lg-4 col-md-6 align-self-center mb-md-0 mb-4">
            <h1>Seja muito bem vindo!</h1>
            <h4 class="mb-4">Encontre restaurantes, docerias, lanchonetes e muito mais! </h4>
            <a
              href="#servicos"
              class="button btn btn-primary button-primary d-md-inline-block d-block mb-md-0 mb-2 mr-md-2"
              >Explorar</a
            >
            <a
              href="contato.php"
              class="button btn btn-outline-primary button-primary-outline d-md-inline-block d-block"
              >Cadastre o seu</a
            >
          </div>
          <div class="col-lg-8 col-md-6 align-self-center text-center">
            <img src="assets/thelivery.jpg" class="img-fluid" />
          </div>
        </div>
      </div>
    </div>
    <!--//SLIDER-->

    <!--RESTAURANTES-->
    <div id="servicos" class="block">
      <div class="container">
        <h2 class="title text-center">Estabelecimentos</h2>
        <h4 class="subtitle text-center mb-4">
          Et sumi kapa namur aondeai rocus pocus
        </h4>

        <div class="button-group">
          <button type="button" class="active" data-filter="*" id="btn-all">
            Todos
          </button>
          <button type="button" data-filter=".hamburguer">Hamburguer</button>
          <button type="button" data-filter=".doce">Doce</button>
          <button type="button" data-filter=".pizza">Pizza</button>
          <button type="button" data-filter=".salgado">Salgado</button>
          <button type="button" data-filter=".caseira">Caseira</button>
        </div>
        <div class="row grid">
            <?php
            $r->conectar("projeto_web", "localhost", "root", "");
            $listagem = $pdo->prepare("SELECT * FROM restaurantes");
            $listagem->execute();
            while($dado = $listagem->fetch(PDO::FETCH_ASSOC)):
            ?>
            <div class="col-lg-4 col-6 mb-4 element-item <?php echo strtolower($dado["categoria_rest"]) . " " . strtolower($dado["categoria_sec"]); ?>">
                <a href="<?php echo $dado["link_rest"]; ?>" >
                <img src="<?php echo $dado["imagem_rest"]; ?>" class="img-fluid mb-2" />
                </a>
                <h5 class="text-uppercase mb-1"><?php echo $dado["nome_rest"]; ?></h5>
                <p class="mb-0">
                <span class="badge bg-light text-dark"><?php echo $dado["categoria_rest"]; ?></span>
                <span class="badge bg-light text-dark"><?php echo $dado["categoria_sec"]; ?></span>
                </p>
            </div>
            <?php 
            endwhile;
            ?>
        </div>
      </div>
    </div>
    <!--//RESTAURANTES-->
    <!--JS-->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/main.js"></script>
    <!--//JS-->
  </body>
</html>
