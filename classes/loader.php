<?php
class Loader {
    private $controllerName;
    private $controllerClass;
    private $action;
    private $urlValues;

    public function __construct() {
        $this->urlValues = $_GET;
        
        if ($this->urlValues['controller'] == "") {
            $this->controllerName = "explorer";
            $this->controllerClass = "ExplorerController";
        } else {
            $this->controllerName = strtolower($this->urlValues['controller']);
            $this->controllerClass = ucfirst(strtolower($this->urlValues['controller'])) . "Controller";
        }
        
        if ($this->urlValues['action'] == "") {
            $this->action = "index";
        } else {
            $this->action = $this->urlValues['action'];
        }
    }
                  
    public function createController() {
        if (file_exists("controllers/" . $this->controllerName . ".php")) {
            require("controllers/" . $this->controllerName . ".php");
        } else {
            require("controllers/error.php");
            return new ErrorController("badurl",$this->urlValues);
        }
                
        if (class_exists($this->controllerClass)) {
            $parents = class_parents($this->controllerClass);
            
            if (in_array("BaseController",$parents)) {   
                if (method_exists($this->controllerClass,$this->action))
                {
                    return new $this->controllerClass($this->action,$this->urlValues);
                } else {
                    require("controllers/error.php");
                    return new ErrorController("badurl",$this->urlValues);
                }
            } else {
                require("controllers/error.php");
                return new ErrorController("badurl",$this->urlValues);
            }
        } else {
            require("controllers/error.php");
            return new ErrorController("badurl",$this->urlValues);
        }
    }
}

?>
