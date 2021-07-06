<?php

class Solicitacao
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
    
    public function cadastrar($nome, $sobrenome, $nome_rest, $telefone, $email, $endereco, $categoria, $categoria_sec)
    {
        global $pdo;
        //verificar se o restaurante já esta cadastrado 
        $sql = $pdo->prepare("SELECT id_solic FROM solicitacao WHERE nome_rest_solic = :n");
        $sql->bindValue(":n",$nome_rest);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false; //restaurante já solicitado
        }else
        {
            
            $sql = $pdo->prepare("INSERT INTO solicitacao (nome_solic, sobrenome_solic, nome_rest_solic, telefone_solic, email_solic, endereco_solic, categoria_solic, categoria_sec_solic) VALUES (:n, :s, :nr, :t, :e, :en, :c, :cs)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":s",$sobrenome);
            $sql->bindValue(":nr",$nome_rest);
            $sql->bindValue(":t",$telefone);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":en",$endereco);
            $sql->bindValue(":c",$categoria);
            $sql->bindValue(":cs",$categoria_sec);
            $sql->execute();
            return true;
        }


    }
    
}