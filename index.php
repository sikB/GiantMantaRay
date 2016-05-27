<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	require_once 'includes/head.php';
	$all_posts = DB::query("SELECT posts.id, posts.userName, posts.postText, posts.timeStamp, SUM(votes.voteDirection) as aggregateVotes
		FROM posts posts
		left join votes votes on posts.id = votes.pid
		group by posts.id;");

	// if($_GET['post'] == 'success'){
		// print "Your post came through";
	// }
?>
<html ng-app='gmrApp'>
<body ng-controller='gmrController'>
	<div class="container col-sm-12">
		<div class="background">
			<div class="row">
				<img src="img/gmrBackground.jpeg">
			</div>
		</div>
		<div class="mission">
			<div class="row color">
				<h1 class="text-center">My Mission..</h1>
				<div class="missionText">
					<h2>My mission is to stop this:</h2>
					<img src="img/mantaHunters.png">
					<h4 class="pStuff threats">Threats to GMRs</h4>
					<p class="col-sm-5 pStuff">Just like all wild animals mantas, have a number of natural predators. Certain species of sharks, as well as orcas and false killer whales have all been recorded predating upon manta rays. Shark bites are seen within every population of manta rays that are studied. Often these bites are taken from the trailing edges of the manta's wings and in many cases these heal up quite well and leave the manta with no lasting damage.<br>

In addition to natural predation, mantas face significant threats from humans and our activities. Fishing line can cause severe entanglement resulting in deep, and often life threatening lacerations if mantas become entangled in it. Gill nets and other fishing nets also cause mantas to become entangled, usually resulting in death. Unfortunately, mantas cannot swim backwards and so attempts to disentangle themselves often result in greater entrapment. Mantas which become entangled in nets quickly die because they are unable to actively pump oxygen rich water over their gills in order to respire.<br>

	<em><strong>Most recently mantas rays have become a desirable catch in a number of countries around the world. The reason for this increase in demand is the manta ray's gill plates which have become highly desirable in the Chinese medicine trade. The manta's gill plates are cartilaginous finger-like projections that branch off the gill arch and are used by the mantas to filter their planktonic prey from the water. The trade in these plates has increased significantly in recent years, posing a worrying threat to manta and mobula populations around the world.</strong></em></p>
				</div>
			</div>
		</div>
		<h1 class="text-center">Do you have a solution?</h1>
		<?php if(isset($_SESSION['userName'])): ?>
			<form action="post_process.php" method="post">
				<div class="form-group text-center">
					<label for="postText" class="solutionLabel">Your soution to save the Giant Mantas</label><br>
					<textarea id="postText" name="postText" class="col-sm-6 col-sm-offset-3"></textarea><br>
				</div><br>
				<button type="submit" class="btn btn-default col-sm-offset-6">Post</button>
			</form>
		<?php else: ?>
			<h3>You must be <a href="login.php">Logged In </a>to make a post</h3>
		<?php endif; ?>
		<?php foreach($all_posts as $post): ?>
			<?php 
				date_default_timezone_set('America/New_York');
				$timestamp_as_unix = strtotime($post['timeStamp']);
				$formatted_date = date('D F j, Y, h:ia', $timestamp_as_unix);
			?>
			<div class="post">
				<div class="left-container">
					<div class="user"><?php print $post['userName']; ?></div>
					<div class="text"><?php print $post['postText']; ?></div>
					<div class="date"><?php print $formatted_date; ?></div>
				</div>			
				<div class="right-container" id="<?php print $post['id'];?>">
					<div class="arrowUp" ng-click='processVote($event, 1)'>X</div>
					<div class="voteCount"><?php print $post['aggregateVotes'];?></div>
					<div class="arrowDown" ng-click='processVote($event, -1)'>Z</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>


</body>
</html>