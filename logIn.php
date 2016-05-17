<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'includes/meekrodb.2.3.class.php';
require_once 'includes/head.php';
?>

<form action="login_process.php" method="post">
     <div class="form-group">
    <label for="userName">User Name</label>
    <input type="text" class="form-control" name="userName" id="userName" name="userName" placeholder="User Name">
  </div>
   <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" id="password" name="password" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="password2">Confirm Password</label>
    <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
  </form>




