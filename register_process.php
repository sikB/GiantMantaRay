<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'includes/meekrodb.2.3.class.php';
DB::$user = 'x';
DB::$password = 'x';
DB::$dbName = 'GiantMantaRay';
DB::$host = '127.0.0.1';
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;
//checks if the userNmae already exists
$result = DB::query('SELECT * FROM users where userName = %s', $_POST['userName']);
if(!$result){
	$can_register = true;
}else{
	$can_register = false;
}
if($can_register && ($_POST['password'] == $_POST['password2'])){
$hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
try{
DB::insert('users', array(
	'userName' => $_POST['userName'],
	'password' => $hashedPassword,
	'email' => $_POST['email'],
	'legalName' => $_POST['legalName']
	));
	$_SESSION['userName'] = $_POST['userName'];
	$_SESSION['email'] = $_POST['email'];
	header('Location: index.php?welcome=yes');
	exit;
	}catch(MeekroDBException $e){
		header('Location: /register.php?error=yes');
		exit;
			}
	}else{
		header('Location: /register.php?error=userNameexists');
}
?>