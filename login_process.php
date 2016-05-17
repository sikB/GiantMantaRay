<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'includes/meekrodb.2.3.class.php';
require_once 'includes/head.php';
DB::$user = 'x';
DB::$password = 'x';
DB::$dbName = 'GiantMantaRay';
DB::$host = '127.0.0.1';
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;
try{
 $result = DB::query("SELECT * FROM users WHERE userName=%s", $_POST['userName']);
        foreach ($result as $row){
            $hash = $row['password'];
            $uid = $row['userName'];
            $_SESSION['userName'] = $row['userName'];
            $passwordVerify = password_verify($_POST['password'], $hash);
        }
    }catch(MeekroDBException $e){
        header('Location: /login.php?error=yes');
    }


    ?>