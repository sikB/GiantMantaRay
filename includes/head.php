<?php 
session_start();
require_once 'includes/meekrodb.2.3.class.php';
DB::$user = 'x';
DB::$password = 'x';
DB::$dbName = 'GiantMantaRay';
DB::$host = '127.0.0.1';
?>

<!DOCTYPE html>
<html ng-app='gmrApp'>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
	<script type="text/javascript" src="js/controller.js"></script>
</head>
<body ng-controller='gmrController'>
	<nav class="navbar navbar-inverse daNav fixed-top">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <a class="navbar-brand" href="#">GMR</a>
			    </div>
			    <ul class="nav navbar-nav">
			      <li class="active"><a href="index.php">Home</a></li>
			    </ul>
			    <ul class="nav navbar-nav navbar-right">
			    <?php
			    	if(isset($_SESSION['userName'])){
			    		print '<li>Welcome ' . $_SESSION['userName'] . '</li>';
			    		print '<li><a href = "post.php">Make a post</a></li>';
			    		print '<li><a href = "logout.php">Logout</a></li>';
			    	}else{
			    		print '<li><a href="register.php"><span class="glyphicon glyphicon-user"></span>Register</a></li>';
			    		print '<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>';
			    	}
			    ?>
			    <li><a href="follow.php">Follow Someone</a> </li>
			    </ul>
			  </div>
			</nav>
</body>