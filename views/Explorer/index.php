<div class="container-fluid">
  <div class="row-fluid">
    <div class="span3">
      <div class="well sidebar-nav">
        <ul class="nav nav-list">
          <li class="nav-header">Select a keyspace</li>
          <li></li>
          <?php
            foreach ($viewModel->get('keyspaceList') as $keyspace){
              echo "<li><a href=' ".$BASE_URL." explorer/keyspace/".$keyspace."'>".$keyspace."</li>";
            }
          ?>
        </ul>
      </div>
    </div>
  </div>
</div>