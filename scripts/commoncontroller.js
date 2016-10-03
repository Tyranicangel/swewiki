app.controller('LoginCtrl', ['$scope','$rootScope','$http','$state', function($scope,$rootScope,$http,$state){
	$scope.loginuser={};
	$scope.login=function(){
		$rootScope.showloader=true;
		$http({
			method:'POST',
			url:$rootScope.apiend+'login',
			data:$scope.loginuser
		}).success(function(result){
			$rootScope.showloader=false;
			if(result['statusCode']=="202")
			{
				localStorage.setItem("swewikitoken",result['message']);
				$state.go(result['link']);
			}
			else
			{
				$rootScope.showerror=true;
				$rootScope.error=result['message'];
			}
		});
	}
}]);

app.controller('UserCtrl', ['$scope','$rootScope','$http', function($scope,$rootScope,$http){
	$http({
		method:'GET',
		url:$rootScope.apiend+'checkuser',
		headers:{'JWT-AuthToken':localStorage.getItem('swewikitoken')}
	}).success(function(result){
		console.log(result);
	}).error(function(err,data){
		$scope.logout();
	});
}]);