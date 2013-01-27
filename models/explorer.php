<?php
class ExplorerModel extends BaseModel
{
    public function index()
    {   
        $this->viewModel->set("pageTitle","Explorer");
        return $this->viewModel;
    }

    public function keyspace()
    {   
        $this->viewModel->set("pageTitle","Explorer - Keyspace");
        return $this->viewModel;
    }

    public function columnfamily()
    {   
        $this->viewModel->set("pageTitle","Explorer - Column Family");
        return $this->viewModel;
    }

    public function setKeyspaceList($keyspaceList){
        $this->viewModel->set("keyspaceList",$keyspaceList);
    }

    public function setColumnFamilyList($cfList){
        $this->viewModel->set("columnFamilyList",$cfList);
    }

    public function setColumnFamilyName($cfname){
        $this->viewModel->set("columnFamilyName",$cfname);
    }

    public function setRowkeyList($rowkeyList){
        $this->viewModel->set("rowkeyList",$rowkeyList);
    }
}
?>
