<?php
class ExplorerModel extends BaseModel
{
    public function index()
    {   
        $this->viewModel->set("pageTitle","Explorer");
        return $this->viewModel;
    }

    public function setKeyspaceList($keyspaceList){
    	$this->viewModel->set("keyspaceList",$keyspaceList);
    }
}
?>
