<?php
include('header.php');
title("Dashboard");
?>
<div class="span3">
	<div class="widget widget-nopad">
		<div class="widget-header"> <i class="icon-list-alt"></i>
			<h3> Manage Student</h3>
		</div>
		<!-- /widget-header -->
		<a href="student.php?page=Dashboard">
		<div class="widget-content" style="background: #6D6F6A;">
			<div class="widget big-stats-container">
				<div class="widget-content" style="background: #6D6F6A;">
					<div id="big_stats" class="cf">
						<div class="stat"> <img src="images/student.png" width="80px"><br></div> 
					</div>
				</div>
				<!-- /widget-content --> 				
			</div>
		</div>
		</a>
	</div>
	<!-- /widget -->
</div>
<div class="span3">
	<div class="widget widget-nopad">
		<div class="widget-header"> <i class="icon-list-alt"></i>
			<h3> Manage Fines</h3>
		</div>
		<!-- /widget-header -->
		<a href="fine.php?page=Dashboard">
		<div class="widget-content" style="background:#6D6F6A;">
			<div class="widget big-stats-container">
				<div class="widget-content" style="background:#6D6F6A;">
					<div id="big_stats" class="cf">
						<div class="stat"> <img src="images/fine.png" width="80px"><br></div> 
					</div>
				</div>
				<!-- /widget-content --> 				
			</div>
		</div>
		</a>
	</div>
	<!-- /widget -->
</div>
<!--Manage Staff  -->
<div class="span3">
	<div class="widget widget-nopad">
		<div class="widget-header"> <i class="icon-list-alt"></i>
			<h3> Manage Staff</h3>
		</div>
		<!-- /widget-header -->
		<a href="staff.php?page=Dashboard">
		<div class="widget-content" style="background: #6D6F6A;">
			<div class="widget big-stats-container">
				<div class="widget-content" style="background: #6D6F6A;">
					<div id="big_stats" class="cf">
						<div class="stat"> <img src="images/staff.png" width="90px"><br></div> 
					</div>
				</div>
				<!-- /widget-content --> 				
			</div>
		</div>
		</a>
	</div>
</div>
<!--Manage Books  -->
<div class="span3">
	<div class="widget widget-nopad">
		<div class="widget-header"> <i class="icon-list-alt"></i>
			<h3> Manage Books</h3>
		</div>
		<!-- /widget-header -->
		<a href="books.php?page=Dashboard">
		<div class="widget-content" style="background: #6D6F6A;">
			<div class="widget big-stats-container">
				<div class="widget-content" style="background: #6D6F6A;">
					<div id="big_stats" class="cf">
						<div class="stat"> <img src="images/books.png" width="80px"><br></div> 
					</div>
				</div>
				<!-- /widget-content --> 			
			</div>
		</div>
		</a>
	</div>
</div>
<div class="span3">
	<div class="widget widget-nopad">
		<div class="widget-header"> <i class="icon-list-alt"></i>
			<h3> Manage Magazines</h3>
		</div>
		<!-- /widget-header -->
		<a href="Magazine.php?page=Dashboard">
		<div class="widget-content" style="background: #6D6F6A;">
			<div class="widget big-stats-container">
				<div class="widget-content" style="background: #6D6F6A;">
					<div id="big_stats" class="cf">
						<div class="stat"> <img src="images/mag.png" width="80px"><br></div> 
					</div>
				</div>
				<!-- /widget-content --> 				
			</div>
		</div>
		</a>
	</div>
</div>
<?php
include('footer.php');
?>