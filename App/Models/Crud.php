<?php

namespace App\Models;

interface Crud {
    
    public function create(Contact $contact );
    public static function read();
    public function update( Contact $contact );
    public function delete( Contact $contact );
}