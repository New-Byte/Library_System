<?php
include('security.php');
securityforpage();
include('fun.php');
// if (isset($_POST['logout_btn'])) 
// { 
	$username=$_SESSION['username'];
	echo("<script>alert('Logout Success');</script>");
	session_destroy();
	session_unset();
	if (isset($_COOKIE['username']) and isset($_COOKIE['password'])) 
	{
		$username=$_COOKIE['username'];
		$password=$_COOKIE['password'];
		setcookie('username', time()-1);
		setcookie('password', time()-1);
	}
	header('Location:login.php');
// }
?>