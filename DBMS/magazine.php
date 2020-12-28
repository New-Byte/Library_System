<?php
include('header.php');
title("Magazine");
?>
<div class="span12">
  <?php message(); ?>
  <div class="widget">
    <div class="widget-header"> <i class="icon-bookmark"></i>
      <h3>Manage Magazine</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content">
      <div class="shortcuts"> 
        <a href="#myModal" role="button" data-toggle="modal" class="shortcut"><i class="shortcut-icon icon-plus-sign"></i><span class="shortcut-label">Add Magazine</span> </a>
        <a href="#myModal3" role="button" data-toggle="modal" class="shortcut"><i class="shortcut-icon icon-upload-alt"></i><span class="shortcut-label">Upload Magazine Data</span> </a>
        <a href="#myModal2" role="button" data-toggle="modal" class="shortcut"><i class="shortcut-icon icon-remove-sign"></i> <span class="shortcut-label">Remove Magazine</span> </a>
      </div>
      <!-- /shortcuts --> 
    </div>
    <!-- /widget-content --> 
  </div>
  <!-- /widget -->
  <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="myModalLabel">Add New Magazine</h3>
    </div>
    <div class="modal-body">
      <form  action="op.php" method="POST" class="form-horizontal" >
        <div class="control-group">                     
          <label class="control-label" for="name">Magazine Name</label>
          <div class="controls">
            <input type="text" class="span3" id="name" value="" name="name">
          </div> <!-- /controls -->       
        </div>
        <div class="control-group">                     
          <label class="control-label" for="author">Author</label>
          <div class="controls">
            <input type="text" class="span3" id="author" value="" name="author">
          </div> <!-- /controls -->       
        </div>
        <div class="control-group">                     
          <label class="control-label" for="date">Date</label>
          <div class="controls">
            <input type="date" class="span3" id="date" value="" name="date">
          </div> <!-- /controls --> 
          <Button class="btn" type="submit" name="op" value="AddMZ">ADD</Button>     
        </div>
      </form>
    </div>
  </div>
  <div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="myModalLabel">Remove Magazine</h3>
    </div>
    <div class="modal-body">
      <form  action="op.php" method="post" class="form-horizontal" >
        <div class="control-group">     
          <label class="control-label" for="radiobtns">Magazine Name</label>
          <div class="controls">
            <div class="input-append">           
              <input class="span2 m-wrap" id="appendedInputButton" type="text" name="mn" autocomplete="off" required="">
              <br><br>
              <input class="btn" type="submit" name="op" value="Remove_Magazine">
            </div>
          </div>  <!-- /controls -->      
        </div>
      </form>
    </div>
  </div>
  <div id="myModal3" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="myModalLabel">Upload Magazine Data</h3>
    </div>
    <div class="modal-body">
      <div class="row" align="center">
        <!-- Import link -->
        <div class="col-md-12 head">
          <div class="float-right">
            <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');"><i class="plus"></i> Import</a>
          </div>
        </div>
        <!-- CSV file upload form -->
        <div class="col-md-12" id="importFrm" style="display: none;">
          <form action="importdata.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" />
            <input type="submit" class="btn btn-primary" name="importSubmitMZ" value="IMPORT">
          </form>
        </div>
      </div>
      <!-- Show/hide CSV upload form -->
      <script>
        function formToggle(ID){
          var element = document.getElementById(ID);
          if(element.style.display === "none"){
            element.style.display = "block";
          }else{
            element.style.display = "none";
          }
        }
      </script>
    </div>
  </div>  <!-- /controls -->      
  <div class="widget">
    <div class="widget-header"><i class='icon-list'></i> 
      <h3>
        <?php
        $result=select("*","magazine","WHERE 1");
        $row=mysqli_num_rows($result);
        if($row!=0){ ?>
          <form  action="Magazine.php" method="GET" >
            Magazine List 
            &emsp;<input class="span4 m-wrap" type="text" name="mgn" placeholder="Enter Magazine Name to show">
            Magazine List 
            &emsp;<input class="span4 m-wrap" type="number" name="cnt" autocomplete="off" placeholder="Enter records number to show" value="1">
            <input type="hidden" name="page" value="Dashboard">
            &emsp;<input type="submit" class="btn-primary" value="show">
          </form>
        <?php } ?>
      </h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content">
      <div class="container">
        <h2>Magazine Data</h2> 

        <table class="table table-striped">
          <thead>
            <tr>
              <th><center>ID</center></th>
              <th><center>Magazine Name</center></th>
              <th><center>Author Name</center></th>
              <th><center>Date Of Add</center></th>
              <th><center>id-copy no</center></th>
            </tr>
          </thead>
          <tbody>
            <?php     
            function res(){$cnt=25;
                $result=select("*","magazine","ORDER BY id  LIMIT $cnt ");}       
            if(isset($_GET['cnt']) && isset($_GET['mgn']))
            {
              $mgn = trim($_GET['mgn']);
              $cnt = $_GET['cnt'];
              if($mgn == null)
              {
                res();
              }else
              {$result=select("*","magazine","WHERE name LIKE '%$mgn%' ORDER BY id ASC LIMIT $cnt ");}
            }
            else
            {
              res();
            }
            while($std=mysqli_fetch_assoc($result))
            {
              echo "<tr>
              <td><center> ".$std['id']."</center></td>
              <td><center> ".$std['name']."</center></td> 
              <td><center> ".$std['author']."</center></td>  
              <td><center> ".$std['dateadd']."</center></td>     
              <td><center> ".$std['copyid']."</center></td>
              </tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /widget-content --> 
  </div>
</div>
<?php
include('footer.php');
?>