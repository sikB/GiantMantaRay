<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
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

$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["avatar"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		//Check if image file is a actual image or fake image
		$check = getimagesize($_FILES["avatar"]["tmp_name"]);
		if($check !== false) {
		    echo "File is an image - " . $check["mime"] . ".";
		    $uploadOk = 1;
		} else {
		    echo "File is not an image.";
		    $uploadOk = 0;
		    header('Location: register.php?error=fakeimage');
		    exit;
		}
	    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }


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