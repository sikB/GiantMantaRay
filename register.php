<?php 

require_once 'includes/meekrodb.2.3.class.php';
require_once 'includes/head.php';
require_once 'includes/header.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- <script type="text/javascript" src='js'></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
</head>
<body>
	<form action="register_process.php" method="post">
	 <div class="form-group">
    <label for="legaName">Legal Name</label>
    <input type="text" class="form-control" name="legalName" id="legalName" name="legalName" placeholder="Legal Name">
  </div>
   <div class="form-group">
    <label for="userName">User Name</label>
    <input type="text" class="form-control" name="userName" id="userName" name="email" placeholder="User Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword2">Confirm assword</label>
    <input type="password" class="form-control" name="password2" id="exampleInputPassword2" placeholder="Confirm Password">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
<?php require_once ('includes/footer.php'); ?>
</body>