<?php

namespace App\Models;

interface Crud {
    
    public function create(Contato $contato);
    public static function read();
    public function update( Contato $contato);
}