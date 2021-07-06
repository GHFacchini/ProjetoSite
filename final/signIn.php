<?php
    session_start();
    if(isset($_SESSION['id_usuario']))
    {
        header("Location: site.php");
        exit;
    }
    require_once 'CLASSES/usuarios.php';
    $u = new Usuario;
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
            <form method ="POST">
                <h1><a class="theliveryFont" href="index.php#">THElivery</a></h1>
                <h1 class="h3 mb-3 fw-normal">Cadastre-se</h1>
                <!-- NOME -->
                <div class="form-floating">
                    <input type="text" name="nome" class="form-control" id="nome"
                    minlength="2" maxlength="30" required="required">
                    <label for="nome">Nome</label>
                </div>
                <!-- SOBRENOME -->
                <div class="form-floating">
                    <input type="text" name="sobrenome" class="form-control" id="sobrenome"
                    minlength="2" maxlength="40" required="required">
                    <label for="sobrenome">Sobrenome</label>
                </div>
                <!-- CPF -->
                <div class="form-floating">
                    <input type="text" name="cpf" class="form-control" id="cpf"
                    maxlength="14" required="required">
                    <label for="sobrenome">CPF</label>
                </div>
                <!-- EMAIL -->
                <div class="form-floating">
                    <input type="email" name="email" class="form-control" id="email"
                    maxlength="40" required="required">
                    <label for="email">Email</label>
                </div>
                <!-- IDADE -->
                <div class="form-floating">
                    <input type="number" name="idade" class="form-control" id="idade"
                    min="10" maxlength="3"required="required">
                    <label for="idade">Idade</label>
                </div>
                <!-- TELEFONE -->
                <div class="form-floating">
                    <input type="tel" name="telefone"class="form-control" id="telefone"
                    maxlength="20"  required="required">
                    <label for="telefone">Telefone</label>
                </div>
                <!-- SENHA -->
                <div class="form-floating">
                    <input type="password" name="senha" class="form-control" id="senha"
                    minlength="6" required="required">
                    <label for="senha">Senha</label>
                </div>
                <!-- CONFIRMAR SENHA -->
                <div class="form-floating">
                    <input type="password" name="confSenha"class="form-control" id="confirma-senha"
                    required="required">
                    <label for="confirma-senha">Confirmar Senha</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary mb-3" type="submit" value="Cadastrar">Cadastrar</button>
            </form>
        </main>
        <?php 

            //verificar POST
            if(isset($_POST['nome']))
            {
                $nome = addslashes($_POST['nome']);
                $sobrenome = addslashes($_POST['sobrenome']);
                $cpf = addslashes($_POST['cpf']);
                $email = addslashes($_POST['email']);
                $idade = addslashes($_POST['idade']);
                $telefone = addslashes($_POST['telefone']);
                $senha = addslashes($_POST['senha']);
                $confirmaSenha = addslashes($_POST['confSenha']);

                if(!empty($nome) && !empty($sobrenome) && !empty($cpf) && !empty($email)
                && !empty($idade) && !empty($telefone) && !empty($senha) && !empty($confirmaSenha))
                {
                    $u->conectar("projeto_web", "localhost", "root", "");
                    if($u->msgErro == "") //deu tudo certo
                    {
            
                        if($senha == $confirmaSenha) //se a senha é igual a confirmação vai para o cadastro
                        {
                            if($u->cadastrar($nome, $sobrenome, $cpf, $email, $idade, $telefone, $senha))
                            {
                                ?>
                                <div class="alert alert-success position-absolute top-100 start-50 translate-middle" role="alert">
                                    Cadastrado com sucesso!
                                </div>
                                <?php
                                header("refresh: 5;index.php"); //manda para a página principal do site
                            }else
                            {
                                ?>
                                <div class= "alert alert-warning position-absolute top-100 start-50 translate-middle" role="alert">
                                    Email já cadastrado.
                                </div>
                                <?php
                            }
                        }else
                        {
                            ?>
                            <div class= "alert alert-warning position-absolute top-100 start-50 translate-middle" role="alert">
                                Senha e confirmar senha não correspondem.
                            </div>
                            <?php
                        }
                        
                    }else
                    {
                        ?>
                        <div class= "alert alert-warning position-absolute top-100 start-50 translate-middle" role="alert">
                            <?php echo "Erro: ".$u->msgErro;?>
                        </div>
                        <?php
                    }
                }else
                {
                    ?>
                    <div class= "alert alert-warning position-absolute top-100 start-50 translate-middle" role="alert">
                        Preencha todos os campos.
                    </div>
                    <?php
                }
            }
        ?>

    </body>
</html>
