<?php
//possible post approval page
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	// require_once 'includes/db_connect.php';
	session_start();
require_once 'includes/meekrodb.2.3.class.php';
DB::$user = 'x';
DB::$password = 'x';
DB::$dbName = 'GiantMantaRay';
DB::$host = '127.0.0.1';	
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;
	require_once 'includes/head.php';
	$all_posts = DB::query("SELECT * FROM posts");
	foreach($all_posts as $post): ?>
	<?php endforeach; ?>

?>