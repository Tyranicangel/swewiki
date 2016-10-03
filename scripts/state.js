app.config(function($stateProvider,$urlRouterProvider){
	$urlRouterProvider.otherwise("/login");

	$stateProvider.
		state('login',{
			url: '/login',
			views:{
				"main":{
					templateUrl:"partials/common/login.html",
					controller:'LoginCtrl'
				}
			}
		}).
		state('admin',{
			views:{
				"main":{
					templateUrl:"partials/admin/common.html",
					controller:'UserCtrl'
				}
			}
		}).
		state('admin.main',{
			url: '/admin/main',
			views:{
				"content":{
					templateUrl:"partials/admin/main.html",
					controller:'AdminMainCtrl'
				}
			}
		});
});