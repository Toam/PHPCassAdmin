<div class="container-fluid">
  <div class="row-fluid">
    <div class="span3">
      <div class="well sidebar-nav">
        <ul class="nav nav-list">
          <li class="nav-header">Column Families</li>
          <li></li>
          <?php
            foreach ($viewModel->get('columnFamilyList') as $columnFamily){
              echo "<li><a href=' ".Config::$BASE_URL."explorer/columnfamily/".$columnFamily."'>".$columnFamily."</li></a>";
            }
          ?>
        </ul>
      </div>
    </div>
  </div>
</div>