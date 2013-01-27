<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $viewModel->get('pageTitle'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?=Config::$BASE_URL?>/assets/css/bootstrap.css" rel="stylesheet">
    <style>
      body { padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */ }
    </style>
    <link href="<?=Config::$BASE_URL?>/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
    </script>
    <![endif]-->
  </head>
  <body>
    <div class="navbar navbar-fixed-top navbar-inverse">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="brand" href="<?=Config::$BASE_URL?>">
            PHPCassAdmin
          </a>
          <ul class="nav">
          </ul>
        </div>
      </div>
    </div>
    <?php require($this->viewFile); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js">
    </script>
    <script src="assets/js/bootstrap.js">
    </script>
  </body>
</html>