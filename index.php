<?php
//PHPCassaAutoload
require_once(__DIR__.'/lib/autoload.php');

require("config/Config.php");
require("classes/basecontroller.php");  
require("classes/basemodel.php");
require("classes/view.php");
require("classes/viewmodel.php");
require("classes/loader.php");

session_start ();

$loader = new Loader();
$controller = $loader->createController();
$controller->executeAction();
?>