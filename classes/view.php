<?php
class View {     
    protected $viewFile;
    
    public function __construct($controllerClass, $action) {
        $controllerName = str_replace("Controller", "", $controllerClass);
        $this->viewFile = "views/" . $controllerName . "/" . $action . ".php";
    }
               
    public function output($viewModel, $template = "maintemplate") {
        
        $templateFile = "views/".$template.".php";
        
        if (file_exists($this->viewFile)) {
            if ($template) {
                if (file_exists($templateFile)) {
                    require($templateFile);
                } else {
                    require("views/error/badtemplate.php");
                }
            } else {
                require($this->viewFile);
            }
        } else {
            require("views/error/badview.php");
        }
    }
}
?>