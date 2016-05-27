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
	}else{
		$json_received = file_get_contents('php://input');
	$decoded_json = json_decode($json_received, true);
	$postID = $decoded_json['idOfPost'];
	$voteDirection = $decoded_json['voteDirection'];

	$didVote = DB::query('SELECT * FROM votes WHERE userName = %s AND pid =%i', $_SESSION['userName'], $postID);

	if(DB::count() != 0){
		print 'Already Voted';
		exit;
	}

	DB::insert('votes', array(
		'userName' => $_SESSION['userName'],
		'voteDirection' => $voteDirection,
		'pid' => $postID
	));
	$totalVotes = DB::query("SELECT SUM(voteDirection) as voteTotal from votes where pid =".$postID);
	print json_encode($totalVotes[0]['voteTotal']);
	}
	?>