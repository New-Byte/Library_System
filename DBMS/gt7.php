<?php
include('header.php');
title("IMPORT-EXPORT");
if(isset($_GET['prn'])){
	$prn=$_GET['prn'];
}else{$prn="";}
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
								<label class="control-label" for="radiobtns">Email ID </label>
								<div class="controls">
									<div class="input-append">
										<input type="hidden" name="page" value="IMPORT-EXPORT">
										<input class="span2 m-wrap" value="<?php echo $prn;?>" id="appendedInputButton" type="email" name="prn" autocomplete="off">
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
				<h3>Staff Information</h3>
			</div>
			<!-- /widget-header -->
			<div class="widget-content">
				<table class="table table-striped table-bordered">
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
						  $result=select("*","staff","WHERE Email='$prn'");
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
							?>
						</tbody>
					</table>
				</div>
					</div>
		<?php }  ?>

	</div>
	<?php
	include('footer.php');
	?>