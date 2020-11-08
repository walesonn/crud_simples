<?php
/**
 * arquivo onde é definido os caminhos de alguns recursos do nosso sistema
 */

$view_windows = __DIR__ . "\\..\\App\\Views";
$view_linux = __DIR__ . "/../App/Views";

if(PHP_OS === "WINNT")
{
    define("DIR_VIEWS", $view_windows);
}
else if(PHP_OS === "Linux")
{
    define("DIR_VIEWS", $view_linux);
}
