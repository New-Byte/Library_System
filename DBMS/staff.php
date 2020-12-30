<?php
include('header.php');
title("Staff");
?>
<div class="span12">
  <div class="widget">
    <div class="widget-header"> <i class="icon-bookmark"></i>
      <h3>Manage Staff</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content">
      <div class="shortcuts"> 
        <a href="#myModal" role="button" data-toggle="modal" class="shortcut"><i class="shortcut-icon icon-plus-sign"></i><span class="shortcut-label">Add Staff</span> </a>
        <a href="#myModal3" role="button" data-toggle="modal" class="shortcut"><i class="shortcut-icon icon-upload-alt"></i><span class="shortcut-label">Upload Staff Data</span> </a>
        <a href="#myModal2" role="button" data-toggle="modal" class="shortcut"><i class="shortcut-icon icon-remove-sign"></i> <span class="shortcut-label">Remove Staff</span> </a>
        <a href="gt7.php?page=IMPORT-EXPORT" class="shortcut"> <i class="shortcut-icon icon-search"></i><span class="shortcut-label">Search Staff</span> </a>
        <a href="#myModal1" role="button" data-toggle="modal" class="shortcut"><i class="shortcut-icon icon-filter"></i><span class="shortcut-label">Filter Staff</span> </a>
      </div>
      <!-- /shortcuts --> 
    </div>
    <!-- /widget-content --> 
  </div>
  <!-- /widget -->


 <!-- Add Staff -->
  <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="myModalLabel">Add New Staff Member</h3>
    </div>
    <div class="modal-body">
      <form  action="op.php" method="POST" class="form-horizontal" >
        <div class="control-group">                     
          <label class="control-label" for="name">Complete Name</label>
          <div class="controls">
            <input type="text" class="span3" id="name" value="" name="name">
          </div> <!-- /controls -->       
        </div>
        <div class="control-group">                     
          <label class="control-label" for="email">Email</label>
          <div class="controls">
            <input type="email" class="span3" id="email" value="" name="email">
          </div> <!-- /controls -->       
        </div>
        <div class="control-group">                     
          <label class="control-label" for="mobile">Mobile</label>
          <div class="controls">
            <input type="text" class="span3" id="mobile" value="" maxlength="10" minlength="10" name="mobile">
          </div> <!-- /controls -->  
        </div>
        <div class="control-group">                     
          <label class="control-label" for="pass">Password</label>
          <div class="controls">
            <input type="password" class="span3" id="pass" name="pass">
          </div> <!-- /controls -->  

        </div>
        <div class="control-group">                     
          <label class="control-label" for="branch">Branch</label>
          <div class="controls">
            <input type="text" class="span3" id="branch" value="" name="branch">
          </div> <!-- /controls -->       
        </div>
        <div class="control-group">                     
          <label class="control-label" for="date">Recrute Date</label>
          <div class="controls">
            <input type="date" class="span3" id="date" value="" name="date">
          </div> <!-- /controls --> 
          <Button class="btn" type="submit" name="op" value="AddSTF">ADD</Button>     
        </div>
      </form>
    </div>
  </div>
<!-- Remove Staff -->
<div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="myModalLabel">Remove Staff</h3>
    </div>
    <div class="modal-body">
      <form  action="op.php" method="post" class="form-horizontal" >
        <div class="control-group">     
          <label class="control-label" for="radiobtns">Email</label>
          <div class="controls">
            <div class="input-append">           
              <input class="span2 m-wrap" id="appendedInputButton" type="email" name="stid" autocomplete="off">
              <br><br>
              <!-- <input class="btn" type="submit" name="op" value="Remove all pass-outs"> -->
            </div>
          </div>  <!-- /controls -->
          <label class="control-label" for="radiobtns">Staff Name</label>
          <div class="controls">
            <div class="input-append">           
              <input class="span2 m-wrap" id="appendedInputButton" type="text" name="stnm" autocomplete="off"><br><br>
              <!-- <input class="btn" type="submit" name="op" value="Remove all pass-outs"> -->
            </div>
          </div>  <!-- /controls -->  
          <input class="btn" type="submit" name="op" value="Remove Staff">    
        </div>
      </form>
    </div>
  </div>
  <!-- Upload data-->
  <div id="myModal3" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="myModalLabel">Upload Staff Data</h3>
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
            <input type="submit" class="btn btn-primary" name="importStaff" value="Upload">
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
<!-- Filter Staff-->
<div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Filter Staff</h3>
  </div>
  <div class="modal-body">
    <form  name="search" action="filter1.php" method="POST" class="form-horizontal" >
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Check</th>
              <th>Branch</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><input type="checkbox" value="Computer Engineering" name="branch10[]"></td>
              <td>Computer Engineering</td>
            </tr>
            <tr>
              <td><input type="checkbox" value="Mechanical Engineering" name="branch10[]"></td>
              <td>Mechanical Engineering</td>
            </tr>
            <tr>
              <td><input type="checkbox" value="Electrical Engineering" name="branch10[]"></td>
              <td>Electrical Engineering</td>
            </tr>
            <tr>
              <td><input type="checkbox" value="Civil Engineering" name="branch10[]"></td>
              <td>Civil Engineering</td>
            </tr>
            <tr>
              <td><input type="checkbox" value="Electronics & Telecommunication" name="branch10[]"></td>
              <td>Electronics & Telecommunication Engineering</td>
            </tr>
            <tr>
              <td><input type="checkbox" value="Instrumentation Engineering" name="branch10[]"></td>
              <td>Instrumentation Engineering</td>
            </tr>
          </tbody>
        </table><input class="btn" type="submit" name="remove" value="Apply">
      </form>
    </div>
  </div>
<!-- Display staff -->
<div class="widget">
    <div class="widget-header"><i class='icon-list'></i> 
      <h3><?php
      $result=select("*","staff","WHERE 1");
      $row=mysqli_num_rows($result);
      if($row!=0){ ?>
        <form  action="staff.php" method="GET" >
          Student List 
          &emsp;<input class="span4 m-wrap" type="number" name="cnt" autocomplete="off" placeholder="Enter records number to show">
          <input type="hidden" name="page" value="Dashboard">
        </form>
      <?php } ?>
    </h3>
  </div>
  <!-- /widget-header -->
  <div class="widget-content">
    <div class="container">
      <h2>Staff Data</h2> 

      <table class="table table-striped">
        <thead>
          <tr>
            <th><center>Name</center></th>
            <th><center>Branch</center></th>
            <th><center>Email</center></th>
            <th><center>Mobile</center></th>
            <th><center>Date of recruitment</center></th>
            <th><center>Status</center></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $cnt = 5;
          if(isset($_GET['cnt']))
            $cnt = $_GET['cnt'];

          $result=select("*","staff","ORDER BY sid LIMIT $cnt");
          while($std=mysqli_fetch_assoc($result))
          {
            echo "<tr>
            <td><center> ".$std['Name']."</center></td> 
            <td><center> ".$std['branch']."</center></td>
            <td><center> ".$std['Email']."</center></td>
            <td><center> ".$std['mobile']."</center></td>
            <td><center> ".$std['Date']."</center></td>      
            <td><center>
            <b> ";?>
            <?php 
            if($std['Category']!="1"){echo "Administrator";}else{echo "Staff Member";}
            echo "</b>";
            ?>
          }
          </tbody>
        </table>
      </div>
    </div>
    <!-- /widget-content --> 
  </div>
<?php
include('footer.php');
?>
</div>
 