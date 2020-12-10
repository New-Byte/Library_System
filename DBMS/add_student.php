<!DOCTYPE html>
<html lang="en">
  
 <head>
    <meta charset="utf-8">
    <title>Add_Student</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/pages/signin.css" rel="stylesheet" type="text/css">

</head>

<body>
	
	<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="index.html">
				Library Management System				
			</a>
	
		</div> <!-- /container -->

		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->

<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">        
        <li class=" <?php if($selpage=='Dashboard'){ echo 'active';} ?>active"><a href="index.php"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
        <li class="<?php if($selpage=='Students'){ echo 'active';} ?>active"><a href="gt.php"><i class="icon-list-alt"></i><span>Students</span> </a> </li>
        <li class="<?php if($selpage=='Books'){ echo 'active';} ?>active"><a href="gt1.php"><i class="icon-book"></i><span>Books</span> </a> </li>
        <li class="<?php if($selpage=='Statistics'){ echo 'active';} ?>active"><a href="gt2.php"><i class="icon-bar-chart"></i><span>Statistics</span> </a> </li>
        <?php ?>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->



<div class="account-container register">
	
	<div class="content clearfix">
		
		<form action="student.php" method="post">
		
			<h1>Add Student Data</h1>			
			
			<div class="login-fields">

				<div class="field">
					<label for="name">Full Name:</label>
					<input type="text" id="firstname" name="name" value="" placeholder="Full Name" class="login" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="name">PRN:</label>
					<input type="number" id="firstname" name="prn" value="" placeholder="PRN" class="login" />
				</div> <!-- /field -->

				<div class="field">
					<label for="brc">Branch:</label>
					<input type="text" id="email" name="brc" value="" placeholder="Branch" class="login"/>
				</div> <!-- /field -->

				<div class="field">
					<label for="ady">Addmission Year:</label>
					<input type="text" id="email" name="ady" value="" placeholder="Addmission Year" class="login"/>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="email">Email Address:</label>
					<input type="text" id="email" name="email" value="" placeholder="Email" class="login"/>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="num">Mobile Number:</label>
					<input type="number" id="password" name="num" value="" placeholder="Mobile Number" class="login"/>
				</div> <!-- /field -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
									
				<button class="button btn btn-primary btn-large">Register</button>
				
			</div> <!-- .actions -->
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->

<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/bootstrap.js"></script>

<script src="js/signin.js"></script>

</body>

 </html>
