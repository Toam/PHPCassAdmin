<?php
class HomeModel extends BaseModel
{
    public function index()
    {   
        $this->viewModel->set("pageTitle","Coucou");
        return $this->viewModel;
    }
}
?>
