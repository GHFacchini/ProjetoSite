<?php

class Restaurante
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
    
    public function cadastrar($nome, $telefone, $endereco, $categoria, $categoria_sec, $link, $imagem)
    {
        global $pdo;
        //verificar se o restaurante já esta cadastrado 
        $sql = $pdo->prepare("SELECT id_rest FROM restaurantes WHERE nome_rest = :n");
        $sql->bindValue(":n",$nome);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false; //restaurante já esta cadastrado
        }else
        {
            //Armazena a imagem na pasta documentos e insere o caminho na coluna imagem
            if($imagem !== null){
                    
                preg_match("/\.(png|jpg|jpeg){1}$/i", $imagem["name"], $ext);
            
                if($ext == true) {
                    $nome_imagem = $nome . "." . $ext[1];
            
                    $caminho_imagem = "documentos/" . $nome_imagem;
            
                    move_uploaded_file($imagem["tmp_name"], $caminho_imagem);
                }
            }
            
            $sql = $pdo->prepare("INSERT INTO restaurantes (nome_rest, telefone_rest, endereco_rest, categoria_rest, categoria_sec, link_rest, imagem_rest) VALUES (:n, :t, :e, :c, :cs, :l, :i)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":t",$telefone);
            $sql->bindValue(":e",$endereco);
            $sql->bindValue(":c",$categoria);
            $sql->bindValue(":cs",$categoria_sec);
            $sql->bindValue(":l",$link);
            $sql->bindValue(":i",$caminho_imagem);
            $sql->execute();
            return true;
        }


    }
    
}