<?php

namespace App\Controllers;

abstract class Controller{

    public function view(string $view,array $array= null):Controller
    {
        if(!empty($array))
        {
            foreach($array as $key => $value)
            {
                $$key = $value;
            }
        }
        include DIR_VIEWS."/Layout/header.php";
        include DIR_VIEWS."/View/".$view.".php";
        include DIR_VIEWS."/Layout/footer.php";

        return $this;
    }

}