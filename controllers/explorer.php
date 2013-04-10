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
        //Get Keyspace list
        $sys = new SystemManager(Config::$CASSANDRA_HOST);
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
        if (empty($_GET['id'])){
            echo "No Keyspace";
            die();
        }else{
            $keyspace = $_GET['id'];
            $_SESSION['keyspace'] = $keyspace;
        }

        //Get Column Family list
        $sys = new SystemManager(Config::$CASSANDRA_HOST);
        $ksdef = $sys->describe_keyspace($keyspace);
        $columnFamilyList = array();
        foreach ($ksdef->cf_defs as $cf){
               $columnFamilyList[] = $cf->name;
        }
        $this->model->setColumnFamilyList($columnFamilyList);

        $this->view->output($this->model->keyspace());
    }

    protected function columnfamily()
    { 
        $keyspace = $_SESSION['keyspace'];

        if (empty($_GET['id'])){
            echo "No ColumnFamily";
            die();
        }else{
            $columnFamily = $_GET['id'];
        }
        $this->model->setColumnFamilyName($columnFamily);

        //Get Column Family list
        $sys = new SystemManager(Config::$CASSANDRA_HOST);
        $ksdef = $sys->describe_keyspace($keyspace);
        $columnFamilyList = array();
        foreach ($ksdef->cf_defs as $cf){
               $columnFamilyList[] = $cf->name;
        }
        $this->model->setColumnFamilyList($columnFamilyList);


        $pool = new ConnectionPool($keyspace, array(Config::$CASSANDRA_HOST));
        $content = new ColumnFamily($pool, $columnFamily);
        $rows = $content->get_range("", "", 1000);
        $rowkey = array();
        foreach($rows as $key => $columns) {
            $rowkey[$key] = $columns;
        }
        $this->model->setRowkeyList($rowkey);

        $this->view->output($this->model->columnfamily());
    }
}
?>
