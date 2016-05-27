<?php
session_start();
require_once 'includes/meekrodb.2.3.class.php';
DB::$user = 'x';
DB::$password = 'x';
DB::$dbName = 'GiantMantaRay';
DB::$host = '127.0.0.1';
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;
	if(!isset($_SESSION['userName'])){
		//you aren't logged in. You should not be here. Goodbye.
		header('Location: login.php');
		exit;
	}
	DB::insert('posts', array(
		'userName' => $_SESSION['userName'],
		'postText' => $_POST['postText']
	));
	header('Location: index.php?post=success');
?>