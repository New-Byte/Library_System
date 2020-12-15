<?php
include('header.php');
title("Student");
?>
<div class="span12">
  <div class="widget">
    <div class="widget-header"> <i class="icon-bookmark"></i>
      <h3>Manage Student</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content">
      <div class="shortcuts"> 
        <a href="#myModal" role="button" data-toggle="modal" class="shortcut"><i class="shortcut-icon icon-plus-sign"></i><span class="shortcut-label">Add Student</span> </a>
        <a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-upload-alt"></i> <span class="shortcut-label">Import Student Data</span> </a>
        <a href="#myModal2" role="button" data-toggle="modal" class="shortcut"><i class="shortcut-icon icon-remove-sign"></i> <span class="shortcut-label">Remove Student</span> </a>
        <a href="gt.php" class="shortcut"> <i class="shortcut-icon icon-search"></i><span class="shortcut-label">Search Students</span> </a>
        <a href="#myModal1" role="button" data-toggle="modal" class="shortcut"><i class="shortcut-icon icon-filter"></i><span class="shortcut-label">Filter Students</span> </a>
      </div>
      <!-- /shortcuts --> 
    </div>
    <!-- /widget-content --> 
  </div>
  <!-- /widget -->
  <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="myModalLabel">Add New Student</h3>
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
          <label class="control-label" for="prn">PRN</label>
          <div class="controls">
            <input type="text" class="span3" id="prn" value="" name="prn">
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
          <label class="control-label" for="name">Address</label>
          <div class="controls">
            <input type="text" class="span3" id="address" value="" name="address">
          </div> <!-- /controls -->       
        </div>
        <div class="control-group">                     
          <label class="control-label" for="name">Gender</label>
          <div class="controls">
            <input type="text" class="span3" id="gender" value="" placeholder="Male/Female" name="gender">
          </div> <!-- /controls -->       
        </div>
        <div class="control-group">                     
          <label class="control-label" for="branch">Branch</label>
          <div class="controls">
            <input type="text" class="span3" id="branch" value="" name="branch">
          </div> <!-- /controls -->       
        </div>
        <div class="control-group">                     
          <label class="control-label" for="date">Admission Date</label>
          <div class="controls">
            <input type="date" class="span3" id="date" value="" name="date">
          </div> <!-- /controls --> 
          <input class="btn" type="submit" name="add1" value="Add">      
        </div>
      </form>
    </div>
  </div>
  <div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="myModalLabel">Remove Student</h3>
    </div>
    <div class="modal-body">
      <form  action="op.php" method="post" class="form-horizontal" >
        <div class="control-group">     
          <label class="control-label" for="radiobtns">Student PRN</label>
          <div class="controls">
            <div class="input-append">           
              <input class="span2 m-wrap" id="appendedInputButton" type="text" name="prn124" autocomplete="off">
              <input class="btn" type="submit" name="remove" value="Remove">
            </div>
          </div>  <!-- /controls -->      
        </div>
      </form>
    </div>
  </div>

  <div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="myModalLabel">Filter Student</h3>
    </div>
    <div class="modal-body">
      <form  name="search" action="filter.php" method="POST" class="form-horizontal" >
        <div class="control-group">
        <table width="600" border="2" class="srch">     
          <div class="controls">
            <div class="input-append">
              <tr>
            <table width="500" border="1" class="srch">           
              <thead>
                <tr>
                  <th><center>Filter By Branch</center></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <input type="checkbox" value="Computer" name="branch10[]">Computer Engineering<br />
                    <input type="checkbox" value="Mechanical" name="branch10[]">Mechanical Engineering<br />
                    <input type="checkbox" value="Electrical" name="branch10[]">Electrical Engineering<br />
                    <input type="checkbox" value="Civil" name="branch[]">Civil Engineering<br />
                    <input type="checkbox" value="Electronics" name="branch10[]">Electronics Engineering<br />
                    <input type="checkbox" value="Instrumentation" name="branch10[]">Instrumentation Engineering<br />
                  </td>
                </tr>
              </tbody>
              <br><br>
            </table>
          </tr>
            </div>
          </div>  <!-- /controls -->  
          <tr><td colspan="3" align="center">
              <input class="btn" type="submit" name="remove" value="Apply"></td></tr>
          </table>    
        </div>
      </form>
    </div>
  </div>

  <div class="widget">
    <div class="widget-header"> <i class='icon-list'></i> 
      <h3><?php
      $result=select("*","student","WHERE 1");
      $row=mysqli_num_rows($result);
      if($row!=0){ ?>
        <form  action="student.php" method="GET" >
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
      <h2>Student Data</h2> 

      <table class="table table-striped">
        <thead>
          <tr>
            <th><center>PRN</center></th>
            <th><center>Name</center></th>
            <th><center>Year</center></th>
            <th><center>Branch</center></th>
            <th><center>Status</center></th>
            <th><center>Mobile</center></th>
            <th><center>Gender</center></th>
            <th><center>Address</center></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $cnt = 5;
          if(isset($_GET['cnt']))
            $cnt = $_GET['cnt'];

          $result=select("*","student","WHERE stid <= $cnt ORDER BY prn");
          while($std=mysqli_fetch_assoc($result))
          {
            echo "<tr>
            <td><center> ".$std['prn']."</center></td>
            <td><center> ".$std['Name']."</center></td> 
            <td><center> ".(diff_date($std['admi_year'],date("Y-m-d H:i:s"),"Y")+1)."</center></td> 
            <td><center> ".$std['branch']."</center></td>       
            <td><center>
            <b> ";?>
            <?php 
            if($std['status']!="1"){echo "Not Registered";}else{echo "Registered";}
            echo "</b>";
            if($std['status']!="1"){
              echo "<a href='reg.php?prn=".$std['prn']."' title='Register' name='register' class='btn btn-mini btn-success'><i class='btn-icon-only icon-ok' style='margin: 0px 0px 20px;'></i>";}

              echo "</a></center></td>
              <td><center> ".$std['mobile']."</center></td>
              <td><center> ".$std['Gender']."</center></td>
              <td><center> ".$std['Address']."</center></td>
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