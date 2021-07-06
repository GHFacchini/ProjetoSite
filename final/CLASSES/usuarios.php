<?php

class Usuario
{
    private $pdo;
    public $msgErro = ""; //se continuar vazio deu tudo certo

    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        global $msgErro;
        try
        {
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        } catch (PDOException $e) {
            $msgErro = $e->getMessage();
        }
        

    }
    
    public function cadastrar($nome, $sobrenome, $cpf, $email, $idade, $telefone, $senha)
    {
        global $pdo;
        //verificar se email já existe no db
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false; //email já esta cadastrado
        }else
        {
            $sql = $pdo->prepare("INSERT INTO usuarios (nome, sobrenome, cpf, email, idade, telefone, senha) VALUES (:n, :s, :c, :e, :i, :t, :p)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":s",$sobrenome);
            $sql->bindValue(":c",$cpf);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":i",$idade);
            $sql->bindValue(":t",$telefone);
            $sql->bindValue(":p",md5($senha));
            $sql->execute();
            return true;
        }


    }

    public function logar($email, $senha)
    {
        global $pdo;

        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5($senha));
        $sql->execute();
        if($sql->rowCount() > 0) //está cadastrada
        {
            
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true; //logado com sucesso
        }
        else
        {
            return false; //não foi possivel logar
        }


    }
}