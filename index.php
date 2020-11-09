<?php

require  __DIR__."/vendor/autoload.php";
require __DIR__."/Conf/paths.php";
require __DIR__."/Conf/database.php";

session_start();

use App\Controllers\HomeController;
use App\Models\Contact;

$page = isset($_GET['p'])? $_GET['p'] : "home";
$controller = new HomeController();

switch($page)
{
    case "home":
        $controller->index();
    break;
    case "cadastro":
        $controller->cadastro();
    break;
    case "visualizar":
        $controller->visualizar();
    break;
    case "editar":
        $controller->editar();
    break;
    case "delete":
        $controller->delete();
    break;
    default:
        echo "<h1 style='color: red; text-align: center;'>ERROR HTTP 404 PAGE NOT FOUND</h1>";
    break;
}

