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
		print 'Not Logged In';
		exit;
	}else{
		$json_received = file_get_contents('php://input');
		$decoded_json = json_decode($json_received, true);
		$posterUserName = $decoded_json['poster'];
		$followMethod = $decoded_json['followMethod'];

		if($followMethod == 'follow'){
		DB::insert('following', array(
		'follower' => $_SESSION['userName'],
		'poster' => $posterUserName
	));
		print 'following';
		exit;
	}else if($followMethod == 'unfollow'){
		DB::delete('following', 'follower =%s AND poster=%s', $_SESSION['userName'],$posterUserName);
		print 'unfollowing';
		exit;
	}
}
	print 'nothing happened';



?>