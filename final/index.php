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
    <body class="text-center">
            
        <main class="form-signin">
            <form method ="POST">
                <h1><a class="theliveryFont" href="projeto.html#">THElivery</a></h1>
                <h1 class="h3 mb-3 fw-normal">Por favor faça login para entrar!</h1>

                <div class="form-floating">
                    <input type="email" name="email" class="form-control" id="email">
                    <label for="email">Email</label>
                </div>
                
                <div class="form-floating">
                    <input type="password" name="senha" class="form-control" id="password">
                    <label for="password">Senha</label>
                </div>

                <button class="w-100 btn btn-lg btn-primary mb-3" type="submit" value>Login</button>
                <a href="signIn.php" class="w-100 btn btn-lg btn-primary">Cadastrar</a>
            </form>
        </main>

        <?php 
            if(isset($_POST['email']))
            {
                $email = addslashes($_POST['email']);
                $senha = addslashes($_POST['senha']);
                if(!empty($email) && !empty($senha))
                {   
                    if($u->msgErro == "")
                    {
                        $u->conectar("projeto_web", "localhost", "root", "");

                        if($u->logar($email,$senha))
                        {
                            header("location: site.php");
                        }else
                        {
                            ?>
                            <div class= "alert alert-warning position-absolute top-100 start-50 translate-middle" role="alert">
                                Email e/ou senha incorretos.
                            </div>
                            <?php
                            
                        }
                    }else
                    {
                        echo "Erro: ".$u->msgErro;
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
