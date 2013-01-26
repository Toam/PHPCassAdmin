<?php
abstract class BaseController {
    protected $urlValues;
    protected $action;
    protected $model;
    protected $view;
    
    public function __construct($action, $urlValues) {
        $this->action = $action;
        $this->urlValues = $urlValues;
        $this->view = new View(get_class($this), $action);
    }
    
    public function executeAction() {
        return $this->{$this->action}();
    }
}

?>
