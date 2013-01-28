<div class="container-fluid">
  <div class="row-fluid">
    <div class="span3">
      <div class="well sidebar-nav">
        <ul class="nav nav-list">
          <li class="nav-header">Column Families</li>
          <li></li>
          <?php
          foreach ($viewModel->get('columnFamilyList') as $columnFamily){
            echo "<li><a href='".Config::$BASE_URL."explorer/columnfamily/".$columnFamily."'>".$columnFamily."</li></a>";
          }
          ?>
        </ul>
      </div>
    </div>
    <div class="span9">
      <h3><?=$viewModel->get('columnFamilyName');?></h3>
      <?php
      foreach($viewModel->get('rowkeyList') as $key => $columns) {
      ?>
        <div class="well well-small">
          <h4>
            <?= $key; ?>
          </h4>
          <?php     
          foreach($columns as $name => $value) {
          ?>                
            <span class="label label-info">
              <?=$name?> : <?=$value?>
            </span>
          <?php
          }
          ?>
        </div>
      <?php            
      }
      ?>

    </div>
  </div>
</div>