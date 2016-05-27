<?php 
session_start();
require_once 'includes/meekrodb.2.3.class.php';
require_once 'includes/head.php';

DB::$user = 'x';
DB::$password = 'x';
DB::$dbName = 'GiantMantaRay';
DB::$host = '127.0.0.1';

$followingArray = DB::queryOneColumn('poster','SELECT poster FROM following where follower = %s', $_SESSION['userName']);

$peopleUserIsFollowingAsString = implode("','", $followingArray);

$notFollowingArray = DB::queryOneColumn('userName',"SELECT userName FROM users where userName != %s AND userName NOT IN('".$peopleUserIsFollowingAsString."')", $_SESSION['userName']);
?>

	<div class="wrapper" ng-controller='gmrController'>
		<div class="container">
				<div class="row">
					<h3>Users you are following</h3>
						<div class="col-sm-8 col-sm-offset-2">
							<?php foreach($followingArray as $user):?>
								<div class="col-sm-8"><?php print $user;?></div>
								<div class="col-sm-4">
								<button ng-click='follow("<?php print $user;?>","unfollow")' class="btn btn-danger">Unfollow</button>
								</div>
							<?php endforeach; ?>
						</div>
				</div>
		</div>	
	</div>
	<div class="container">
		<div class="row">
		<h3>Users you are not following</h3>
			<div class="col-sm-8 col-sm-offset-2">
				<div class="row">
					<?php foreach($notFollowingArray as $user): ?>
						<div class="col-sm-8"><?php print $user; ?></div>
						<div class="col-sm-4">
						<button ng-click="follow('<?php print $user;?>', 'follow')" class="btn btn-primary">Follow</button>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>



