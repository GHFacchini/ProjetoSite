<?php
    require_once 'CLASSES/restaurante.php';
    $r = new Restaurante;
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <title>THElivery</title>
        <!-- Bootstrap core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        
        <!-- Custom styles for this template -->
        <link href="css/main.css" rel="stylesheet">
        <link href="css/loginsignin.css" rel="stylesheet">
    </head>
    <body class="text-center position-relative">
            
        <main class="form-signin">
            <form method ="POST" enctype="multipart/form-data">
                <h1><a class="theliveryFont" href="index.php">THElivery</a></h1>
                <h1 class="h3 mb-3 fw-normal">Cadastrar restaurante</h1>
                <!-- NOME -->
                <div class="form-floating">
                    <input type="text" name="nome" class="form-control" id="nome"
                    placeholder="Nome" minlength="2" maxlength="45" required="required">
                    <label for="nome">Nome</label>
                </div>
                <!-- TELEFONE -->
                <div class="form-floating">
                    <input type="tel" name="telefone"class="form-control" id="telefone"
                    maxlength="13" placeholder="Telefone" required="required">
                    <label for="telefone">Telefone</label>
                </div>
                <!-- ENDEREÇO -->
                <div class="form-floating">
                    <input type="text" name="endereco" class="form-control" id="endereco"
                    placeholder="Endereço" minlength="5" maxlength="60" required="required">
                    <label for="endereco">Endereço</label>
                </div>
                <!-- CATEGORIA -->
                <div class="form-floating">
                    <input type="text" name="categoria" class="form-control" id="categoria"
                    placeholder="Categoria" minlength="3" maxlength="20" required="required">
                    <label for="categoria">Categoria</label>
                </div>
                <!-- CATEGORIA SECUNDÁRIA-->
                <div class="form-floating">
                    <input type="text" name="categoria_sec" class="form-control" id="categoria_sec"
                    placeholder="Categoria Secundária" minlength="3" maxlength="20">
                    <label for="categoria_sec">Categoria secundária</label>
                </div>
                <!-- LINK-->
                <div class="form-floating">
                    <input type="text" name="link" class="form-control" id="link"
                    placeholder="Link" minlength="5" maxlength="60" required="required">
                    <label for="link">Link</label>
                </div>
                <!-- IMAGEM -->
                <div>
                    <label class="form-label" for="imagem">Imagem do restaurante</label>
                    <input type="file" name="imagem" class="form-control" id="imagem"
                    required="required">   
                </div>
                
                
                <button class="w-100 btn btn-lg btn-primary mb-3" type="submit" value="Cadastrar">Cadastrar</button>
            </form>
        </main>
        <?php 

            //verificar POST
            if(isset($_POST['nome']))
            {
                $nome = addslashes($_POST['nome']);
                $telefone = addslashes($_POST['telefone']);
                $endereco = addslashes($_POST['endereco']);
                $categoria = addslashes($_POST['categoria']);
                $categoria_sec = addslashes($_POST['categoria_sec']);
                $link = addslashes($_POST['link']);
                $imagem = $_FILES['imagem'];

                if(!empty($nome) && !empty($telefone) && !empty($endereco) && !empty($categoria) 
                && !empty($link) && !empty($imagem))
                {
                    $r->conectar("projeto_web", "localhost", "root", "");
                    if($r->msgErro == "") //deu tudo certo
                    {
                            if($r->cadastrar($nome, $telefone, $endereco, $categoria, $categoria_sec, $link, $imagem))
                            {
                                ?>
                                <div class="alert alert-success position-absolute top-100 start-50 translate-middle" role="alert">
                                    Cadastrado com sucesso!
                                </div>
                                <?php
                                header("refresh: 5;cadastra_restaurante.php");
                            }else
                            {
                                ?>
                                <div class= "alert alert-warning position-absolute top-100 start-50 translate-middle" role="alert">
                                    Restaurante já cadastrado!"
                                </div>
                                <?php
                            }
                        
                    }else
                    {
                        ?>
                        <div class= "alert alert-warning position-absolute top-100 start-50 translate-middle" role="alert">
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

    </body>
</html>
