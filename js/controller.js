var gmrApp = angular.module('gmrApp', []);
gmrApp.controller('gmrController', function($scope, $http){

	$scope.follow = function(userName, followMethod){
			$http.post('processFollow.php', {
				poster: userName,
				followMethod: followMethod
		}).then(function successCallback(response){
			console.log(response);
		}, function errorCallback(response){
			console.log(response);
		});
	};

	$scope.processVote = function(element, vote){
		$http.post('processVote.php', {
			voteDirection: vote,
			idOfPost: element.target.parentElement.id
		}).then(function successCallback(response){
			if(response.data == 'alreadyVoted'){

			}
			else if(vote == 1){
				if(response.data == 'notLoggedIn'){
				element.target.nextElementSibling.innerHTML = 'You must be logged in';
				}else{
				element.target.nextElementSibling.innerHTML = response.data;
				}
			}else if(vote == 0){
				if(response.data == 'notLoggedIn'){
				element.target.previousElementSibling.innerHTML = 'You must be logged in';
				}else{
				element.target.previousElementSibling.innerHTML = response.data;
			}
		} function errorCallback(response){
			console.log(response);
		};
	});
}


});




