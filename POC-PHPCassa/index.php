<?
require_once(__DIR__.'/lib/autoload.php');

use phpcassa\Connection\ConnectionPool;
use phpcassa\SystemManager;
use phpcassa\ColumnFamily;
use cassandra\KsDef;
use cassandra\CfDef;

$sys = new SystemManager('127.0.0.1');

echo "<pre>";
$ksdef = $sys->describe_keyspace("kstest");
//print_r($ksdef);
echo "</pre>";

echo "<hr/>";

foreach ($ksdef->cf_defs as $columnFamily){
	echo $columnFamily->name . "<br/>";
}

echo "<hr/>";

$pool = new ConnectionPool('kstest', array('127.0.0.1'));
$users = new ColumnFamily($pool, 'Users');

$rows = $users->get_range("", "", 100);
foreach($rows as $key => $columns) {
    echo $key . " ".$columns["name"]." ".$columns["password"] . "<br/>";
}