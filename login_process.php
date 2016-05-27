<?php
session_start();
require_once 'includes/meekrodb.2.3.class.php';
DB::$user = 'x';
DB::$password = 'x';
DB::$dbName = 'GiantMantaRay';
DB::$host = '127.0.0.1';	
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;
	$result = DB::query("SELECT * FROM users WHERE userName = %s", $_POST['userName']);
	$hashedPassword = $result[0]['password'];
	$password_verify = password_verify($_POST['password'], $hashedPassword);
	if($password_verify){
		//The passwords match!!
		$_SESSION['userName'] = $_POST['userName'];
		$_SESSION['uid'] = $result[0]['id'];
		header ('Location: index.php?welcome=yes');
	}else{
		header('Location: login.php?error=nomatch');
	}