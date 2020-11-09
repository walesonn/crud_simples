<?php

namespace App\Models;

use App\Models\Crud;

class Contact implements Crud {

    private $id;
    private $nome;
    private $email;
    private $tel;

    public function __construct(string $nome, string $email, string $tel, $id = null )
    {
        $this->id = isset($id)? $id : null;
        $this->nome = $nome;
        $this->email = $email;
        $this->tel = $tel;
    }

    //Responsavel por inserir um objeto do tipo contato no banco de dados
    public function create( Contact $contato )
    {
        $sql = "INSERT INTO contatos ( nome, email, tel )";
        $sql .= "VALUES ( :nome, :email, :tel )";

        try
        {
            $cmd = Connection::connect()->prepare( $sql );
            $cmd->bindValue( ":nome", $contato->getNome() );
            $cmd->bindValue( ":email", $contato->getEmail() );
            $cmd->bindValue( ":tel", $contato->getTel() );
            return $cmd->execute()? true : false;
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }

    //Responsavel por retornar os dados do Contato
    public static function read( $id = null )
    {
        if(!empty($id))
        {
            $sql = "SELECT * FROM contatos WHERE id = :id";

            try
            {
                $cmd = Connection::connect()->prepare( $sql );
                $cmd->bindValue( ":id", $id );
                $cmd->execute();
                if( $cmd->rowCount() > 0 )
                {
                    $result = $cmd->fetch(\PDO::FETCH_OBJ);
                    //retornará um contato
                    return new Contact( $result->nome, $result->email, $result->tel, $result->id );
                }
                return false;
            }
            catch(\Exception $e)
            {
                return $e->getMessage();
            }
        }

        try{
            $cmd = Connection::connect()->prepare( "SELECT * FROM contatos" );
            $cmd->execute();

            if( $cmd->rowCount() > 0 )
            {
                $result = $cmd->fetchAll(\PDO::FETCH_OBJ);

                foreach( $result as $contato )
                {
                    $lista[] = new Contact( $contato->nome, $contato->email, $contato->tel,$contato->id );
                }
                //retornara um array de contatos
                return $lista;
            }
            return []; //caso não haja nenhum contato salvo retornaremos um array vazio
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function update( Contact $contato )
    {
        $sql = "UPDATE contatos SET nome = :n, email = :e, tel = :t WHERE id = :id";
        try
        {
            $cmd = Connection::connect()->prepare( $sql );
            $cmd->bindValue( ":n", $contato->getNome() );
            $cmd->bindValue( ":e", $contato->getEmail() );
            $cmd->bindValue( ":t", $contato->getTel() );
            $cmd->bindValue( ":id", $contato->getId() );
            return $cmd->execute()? true : false;
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function delete( Contact $contato)
    {
        $sql = "DELETE FROM contatos WHERE id = :id";
        try
        {
            $cmd = Connection::connect()->prepare( $sql );
            $cmd->bindValue( ":id", $contato->getId() );
            return $cmd->execute()? true : false;
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getTel()
    {
        return $this->tel;
    }
}