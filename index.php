<?php
require("classes/basecontroller.php");  
require("classes/basemodel.php");
require("classes/view.php");
require("classes/viewmodel.php");
require("classes/loader.php");

$loader = new Loader();
$controller = $loader->createController();
$controller->executeAction();
?>