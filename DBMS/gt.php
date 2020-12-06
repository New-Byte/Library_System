<?php
include('header.php');
title("Students");
?>
<div class="span12">    
	<div class="widget ">
		<div class="widget-header">
			<i class="icon-user"></i>
			<h3>Search student</h3>
		</div> <!-- /widget-header -->
		<div class="widget-content">
			<div class="tabbable">
				<div class="tab-content">
					<div class="tab-pane active" id="formcontrols">
						<form  action="gt.php" method="GET" class="form-horizontal" >
							<div class="control-group">			
								<label class="control-label" for="radiobtns">Student PRN  </label>
								<div class="controls">
									<div class="input-append">
										<input class="span2 m-wrap" id="appendedInputButton" type="text" name="prn" autocomplete="off">
										<button class="btn" type="submit" name="submit">Search!</button>
									</div>
								</div>	<!-- /controls -->			
							</div>
						</form>
					</div>
				</div>
			</div>
		</div> <!-- /widget-content -->
	</div> <!-- /widget -->
	<?php
  message();
	if(!empty($_GET['prn']) && $_SERVER['REQUEST_METHOD'] == 'GET'){
		$prn=$_GET['prn'];
		?>
		<div class="widget widget-table action-table">
			<div class="widget-header"> <i class="icon-th-list"></i>
				<h3>Student Information</h3>
			</div>
			<!-- /widget-header -->
			<div class="widget-content">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th> PRN</th>
							<th> Name</th>
							<th> Year </th>
							<th> Branch </th>
							<th> Status</th>
							<th> Mobile</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$result=select("*","student","WHERE prn='$prn' LIMIT 1");
						while($std=mysqli_fetch_assoc($result))
						{
							echo "<tr>
							<td> ".$std['prn']." </td>
							<td> ".$std['Name']."</td>	
							<td> ".$std['admi_year'] ."</td>	
							<td> ".$std['branch']."</td>				
							<td>
							<b> ";?>
							<?php 
							if($std['status']!="1"){echo "Not Registered";}else{echo "Registered";}
							echo "</b>";
							if($std['status']!="1"){
							echo "<a href='reg.php?prn=".$std['prn']."' title='Register' name='register' class='btn btn-mini btn-success'><i class='btn-icon-only icon-ok'></i>";}

							echo "
							</a>
							</td>
							<td> ".$std['mobile']."</td>
							</tr>";
							$status=$std['status'];
							$prn=$std['prn'];
						}
						?>
					</tbody>
				</table>
			</div>
			<?php 
			$row=mysqli_num_rows($result);
			if($row==0){echo "<div class='alert alert-info'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			<center><strong>Warning!</strong> No PRN Found</center>
			</div>";}
			?><br />
			<!-- /widget-content --> 
			<div class="widget-header"> <i class="icon-th-list"></i>
				<h3>Student Books Detail <a href=""></a>
					<!-- Button to trigger modal -->
					<?php if($row!=0 && $status=="1"){ ?>
						&emsp;<a href="#myModal" role="button" class="btn" data-toggle="modal"> Add Book<i class="btn-icon-only icon-plus"></i></a>
						<?php } ?>
					<!-- Modal -->
					<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h3 id="myModalLabel">Add New Book</h3>
						</div>
						<div class="modal-body">
							<form  action="op.php" method="post" class="form-horizontal" >
							<div class="control-group">			
								<label class="control-label" for="radiobtns">Book Name</label>
								<div class="controls">
									<div class="input-append">
										<?php if($row!=0){ ?>								
										<input type="hidden" name="prn" value="<?php echo($prn) ?>">
										<?php } ?>
										<input class="span2 m-wrap" id="appendedInputButton" type="text" name="book" autocomplete="off">
										<button class="btn" type="submit" name="add">Add</button>
									</div>
								</div>	<!-- /controls -->			
							</div>
						</form>
						</div>
					</div>
				</h3>
			</div>
			<!-- /widget-header -->
			<div class="widget-content">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<!-- <th> Sr.No.</th> -->
							<th> Book ID </th>
							<th> Book Name</th>
							<th> Purchase date </th>
							<th> Return Date</th>
							<th> Renew Date</th>
							<th> Return / Renew</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$result=select("*","student_book","WHERE prn=$prn");
						while($stb = mysqli_fetch_assoc($result)) {
							echo "<tr><td> ".$stb['book_id']." </td>
							<td> ".$stb['book_name']." </td>
							<td> ".$stb['took']."</td>			
							<td> ".$stb['returned']."</td>
							<td> ".$stb['renew']."</td>
							<td class='td-actions'>
							<form action='op.php' method='post'>
							<input type='hidden' name='prn' value='".$prn."'>
							<input type='hidden' name='book' value='".$stb['book_name']."'>
							
							";?>
							<?php if($row!=0 && $status=="1"){ 
							echo"<button type='submit' title='Return' name='return' class='btn btn-small btn-success'><i class='btn-icon-only icon-ok'> </i></button>
							<button type='submit' title='Renew' name='renew' class='btn btn-primary btn-small'><i class='btn-icon-only icon-large icon-repeat'></i></button>"; 
							echo "</form>
							</td></tr>"; }
						}
						?>						
					</tbody>
				</table>
			</div>
			<?php 
			$row=mysqli_num_rows($result);
			if($row==0){echo "<div class='alert alert-info'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			<center><strong>Warning!</strong> No Data Found</center>
			</div>";}
			?>
		</div>
	<?php }  ?>
</div>
<?php
include('footer.php');
?>