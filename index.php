<?php

require  __DIR__."/vendor/autoload.php";
require __DIR__."/Conf/paths.php";
require __DIR__."/Conf/database.php";

session_start();

use App\Controllers\HomeController;
use App\Models\Contato;

$c = new Contato( "thales", "thalles@gmail.com", "(00)11121-2323",2);

if($c->update( $c ))
{
    echo "update";
}

$page = isset($_GET['p'])? $_GET['p'] : "home";
$controller = new HomeController();

switch($page)
{
    case "home":
        $controller->index();
    break;
    default:
        echo "<h1 style='color: red; text-align: center;'>ERROR HTTP 404 PAGE NOT FOUND</h1>";
    break;
}

