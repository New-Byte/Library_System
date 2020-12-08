<?php  
include('security.php');
include('fun.php');
securityforpage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/pages/dashboard.css" rel="stylesheet">
<title>Dashboard/Manage Students</title>
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.html">Manage Students</a> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">        
        <li class=" <?php if($selpage=='Dashboard'){ echo 'active';} ?>active"><a href="adds.php"><i class="icon-plus-sign"></i><span>Add Student</span> </a> </li>
        <li class="<?php if($selpage=='IMPORT-EXPORT'){ echo 'active';} ?>active"><a href="upload.php"><i class="icon-upload-alt"></i><span>Import Student Data</span> </a> </li>
        <li class="<?php if($selpage=='IMPORT-EXPORT'){ echo 'active';} ?>active"><a href="removes.php"><i class="icon-remove-sign"></i><span>Remove Student</span> </a> </li>
        <li class="<?php if($selpage=='IMPORT-EXPORT'){ echo 'active';} ?>active"><a href="searchs.php"><i class="icon-search"></i><span>Search Students</span> </a> </li>
        <li class="<?php if($selpage=='IMPORT-EXPORT'){ echo 'active';} ?>active"><a href="filters.php"><i class="icon-filter"></i><span>Filter Students</span> </a> </li>
        <?php ?>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->
<!-- <div class="main"> -->
  <div class="main-inner">
    <div class="container">
      <div class="row">