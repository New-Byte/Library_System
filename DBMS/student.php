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
        <a href="add_student.php" class="shortcut"><i class="shortcut-icon icon-plus-sign"></i><span class="shortcut-label">Add Student</span> </a>
        <a href="#" class="shortcut"><i class="shortcut-icon icon-upload-alt"></i> <span class="shortcut-label">Import Student Data</span> </a>
        <a href="remove.php" class="shortcut"><i class="shortcut-icon icon-remove-sign"></i> <span class="shortcut-label">Remove Student</span> </a>
        <a href="gt.php" class="shortcut"> <i class="shortcut-icon icon-search"></i><span class="shortcut-label">Search Students</span> </a>
        <a href="#" class="shortcut"><i class="shortcut-icon icon-filter"></i><span class="shortcut-label">Filter Students</span> </a>
      </div>
      <!-- /shortcuts --> 
    </div>
    <!-- /widget-content --> 
  </div>
  <!-- /widget -->
</div>

<div class="span12">
  <div class="widget">
    <div class="widget-header"> <i class='icon-list'></i> 
      <h3>Student List<a href=""></a>
       <?php 
       $result=select("*","student","WHERE 1");
  		$row=mysqli_num_rows($result);
       if($row!=0){ ?>
							&emsp;<a href="#myModal" role="button" class="btn" data-toggle="modal"> Load records<i class="btn-icon-only icon-plus"></i></a>
						<?php } ?>
						<!-- Modal -->
						<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h3 id="myModalLabel">Load Records</h3>
							</div>
							<div class="modal-body">
								<form  action="student.php" method="post" class="form-horizontal" >
									<div class="control-group">			
										<label class="control-label" for="radiobtns">Add number of records</label>
										<div class="controls">
											<div class="input-append">
												<input class="span2 m-wrap" id="appendedInputButton" type="text" name="cnt" autocomplete="off" placeholder="Records">
												<br><br>
												<button class="btn" type="submit" name="add">Load</button>
											</div>
										</div>	<!-- /controls -->			
									</div>
								</form>
							</div>
						</div></h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content">
      <div class="container">
  <h2>Student Data</h2> 

  <table class="table table-striped">
    <thead>
      <tr>
        <th>PRN</th>
        <th>Name</th>
        <th>Year</th>
        <th>Branch</th>
        <th>Status</th>
        <th>Mobile</th>
      </tr>
    </thead>
    <tbody>
      <?php
      	$cnt = 5;
      	if(isset($_POST['cnt']))
      	$cnt = $_POST['cnt'];

		$result=select("*","student","WHERE stid <= $cnt");
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
					<td><center> ".$std['mobile']."</center></td></tr>";
							}
							?>
    </tbody>
  </table>
</div>
    </div>
    <!-- /widget-content --> 
  </div>
  <!-- /widget -->
</div>

<?php
include('footer.php');
?>