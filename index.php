<?php
require_once(__DIR__.'/lib/autoload.php');

use phpcassa\Connection\ConnectionPool;
use phpcassa\SystemManager;
use phpcassa\ColumnFamily;
use cassandra\KsDef;
use cassandra\CfDef;

$keyspace = "kstest";

$sys = new SystemManager('127.0.0.1');
$ksdef = $sys->describe_keyspace($keyspace);
?>

<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="utf-8">
    <title>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <style>
      body { padding-top: 60px; /* 60px to make the container go all the way
      to the bottom of the topbar */ }
    </style>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
      </script>
    <![endif]-->
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <style>
    </style>
  </head>
  <body>
    <div class="navbar navbar-fixed-top navbar-inverse">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="brand" href="#">
            PHPCassAdmin
          </a>
          <ul class="nav">
          </ul>
        </div>
      </div>
    </div>
    <ul class="breadcrumb">
      <li class="">
        <a href="index.php">
          kstest
        </a>
      </li>
      <span class="divider">
        /
      </span>
      <li class="active">
          <?php echo isset($_GET['cf']) ? $_GET['cf'] : ""?>
      </li>
    </ul>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">
                Column Families
              </li>
              <?php
              foreach ($ksdef->cf_defs as $columnFamily){
                echo '<li class=""><a href="?cf=' . $columnFamily->name . '">' . $columnFamily->name . '</a></li>';
              }
              ?>
            </ul>
          </div>
        </div>

<?php
        if(isset($_GET['cf'])){
          $pool = new ConnectionPool($keyspace, array('127.0.0.1'));
          $users = new ColumnFamily($pool, $_GET['cf']);
?>

        <div class="span9">
          <div class="btn-group pull-right">
            <button class="btn">Action</button>
            <button class="btn dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
              <li><a href="#">Faire un truc</a></li>
              <li><a href="#">Faire un autre truc</a></li>
            </ul>
          </div>
          <h3>
              <?=$_GET['cf'];?>
          </h3>
<?php
          $rows = $users->get_range("", "", 100);
          foreach($rows as $key => $columns) {
?>
            <div class="well well-small">
              <h4>
                <a href="#"><?= $key; ?></a>
              </h4>
<?php     
              foreach($columns as $name => $value) {
?>                
                <span class="label label-info">
                  "<?=$name?>" : "<?=$value?>"
                </span>
            
<?php
              }
?>
            </div>
<?php            
          }
?>

      </div>
<?php
    }
?>

    </div>

    <style>
      
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js">
    </script>
    <script src="assets/js/bootstrap.js">
    </script>
  </body>
</html>
