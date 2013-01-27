<?php
use phpcassa\Connection\ConnectionPool;
use phpcassa\SystemManager;
use phpcassa\ColumnFamily;
use cassandra\KsDef;
use cassandra\CfDef;

class ExplorerController extends BaseController
{
    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);

        require("models/explorer.php");
        $this->model = new ExplorerModel();
    }

    protected function index()
    {
        $sys = new SystemManager("127.0.0.1");
        $cluster = $sys->describe_keyspaces();
        $keyspace = array();
        foreach($cluster as $ksdef){
            $keyspace[] = $ksdef->name;
        }
        
        $this->model->setKeyspaceList($keyspace);

        $this->view->output($this->model->index());
    }

    protected function keyspace()
    {
        $this->view->output($this->model->keyspace());
    }

    protected function columnfamily()
    {
        $this->view->output($this->model->columnfamily());
    }
}
?>
