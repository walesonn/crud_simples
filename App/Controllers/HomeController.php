<?php

namespace App\Controllers;

use App\Models\Contact;

class HomeController extends Controller{

    public function index()
    {
        $contacts = Contact::read();
        return $this->view( "home", ["contacts"=>$contacts] );
    }

    public function cadastro()
    {
        if( $this->validar() )
        {
            $c = new Contact( $_REQUEST['nome'], $_REQUEST['email'], $_REQUEST['tel'] );
            $contatoSalvo = Contact::read();
            
            foreach($contatoSalvo as $contato)
            {
                // verifica se o email passado no formulario ja está cadastrado para não recadastrá-lo
                if( $contato->getEmail() === $_REQUEST['email'] )
                {
                    echo "duplicate";
                    return;
                }
            }
            // salva no banco de dados
            return $c->create($c)? $this->index() : "error ao salvar contato";
        }
    }

    public function validar()
    {
        if( !preg_match("/^[a-z0-9 ]+$/i",$_REQUEST['nome']) )
        {
            echo "c1"; // campo 1 inválido 
            return;
        }
        elseif( !preg_match("/^[a-z0-9_\.\-]+@[a-z_\-\.]+\.[a-z]+$/i",$_REQUEST['email']) )
        {
            echo "c2"; // campo 2 inválido
            return;
        }
        elseif( !preg_match("/^[0-9\(\-\)]+$/",$_REQUEST['tel']) )
        {
            echo "c3"; // campo 3 inválido
            return;
        }
        return true;
    }

    public function visualizar()
    {
        $contato = Contact::read($_REQUEST['n']);
        return $this->view( "visualizar", ["contato"=>$contato] );
    }

    public function editar()
    {
       if( isset( $_REQUEST['id'] ) )
       {
            if( $this->validar() )
            {
                $c = new Contact( $_REQUEST['nome'], $_REQUEST['email'], $_REQUEST['tel'], $_REQUEST['id'] );
                $contatoSalvo = Contact::read();
                
                foreach($contatoSalvo as $contato)
                {
                    // verifica se o email passado no formulario ja está cadastrado para não recadastrá-lo
                    if( $contato->getEmail() === $_REQUEST['email'] && $contato->getId() != $_REQUEST['id'] )
                    {
                        echo "duplicate";
                        return;
                    }
                }
                return $c->update( $c )? $this->index() : "Error ao editar";
            }
       }

       $contato = Contact::read( $_REQUEST['n'] );

       return $this->view( "editar", ["contato"=>$contato] );
    }

    public function delete()
    {
        if( !isset($_REQUEST['n']) || $_REQUEST['n'] < 1 )
        {
            echo "err1";
            return;
        }

        $c = Contact::read( $_REQUEST['n'] );
        
        if( !empty($c) && is_object( $c ) )
        {
            $contato = new Contact( $c->getNome(), $c->getEmail(), $c->getTel(), $c->getId() );

            return $contato->delete( $contato )? $this->index(): "err2";
        }

        echo "err3";
        return;
    }

}