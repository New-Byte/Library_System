<?php
include('header.php');
title("Books");
?>
<div class="span12">
  <div class="widget">
    <div class="widget-header"> <i class="icon-bookmark"></i>
      <h3>Manage Books</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content">
      <div class="shortcuts"> 
        <a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-plus-sign"></i><span class="shortcut-label">Add Magazines</span> </a>
        <a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-upload-alt"></i> <span class="shortcut-label">Import Magazine Data</span> </a>
        <a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-remove-sign"></i> <span class="shortcut-label">Remove Magazine</span> </a>
        <a href=" javascript:;" class="shortcut"> <i class="shortcut-icon icon-search"></i><span class="shortcut-label">Search Magazines</span> </a>
        <a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-filter"></i><span class="shortcut-label">Filter Magazines</span> </a>
      </div>
      <!-- /shortcuts --> 
    </div>
    <!-- /widget-content --> 
  </div>
  <!-- /widget -->
</div>
<?php
include('footer.php');
?>