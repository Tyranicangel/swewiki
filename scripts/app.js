var app=angular.module("cookieCutter",["ui.router"]);

app.controller('MainCtrl', ['$scope','$rootScope','$state', function($scope,$rootScope,$state){
	$rootScope.apiend="api/public/";
	$rootScope.showloader=false;
	$rootScope.showerror=false;
	$rootScope.error="Hello";

	$scope.logout=function(){
		localStorage.removeItem('cookietoken');
		$state.go('login');
	}
}]);

app.directive('fileChange', function() {
	return {
		restrict: 'A',
		link: function(scope, element, attrs) {
			element.bind('change', function() {
				scope.$apply(function() {
				scope[attrs['fileChange']](element[0].files);
				});
			});
		},
	}
});

app.factory('Dates',function(){
	return{
		getDate:function(str1)
		{
			if(!str1)
			{
				return "";
			}
			else
			{
				var dt1=str1.substring(8,10);
				var mon1=str1.substring(5,7);
				var yr1=str1.substring(0,4);
				return dt1+'/'+mon1+'/'+yr1;
			}
		}
	}
});

app.factory('Commas', ['', function(){
	return {
		getcomma:function(nums){
			if(nums)
			{
				nums=nums+'';
				var splite = nums.split(".");
				nums = splite[0];
				if(nums)
				{
					var num1=nums.toString();
					if(num1.length>7)
					{
						numstart=num1.substr(0,num1.length-7);
						numstart=numstart+',';
						num=num1.substr(-7);
					}
					else
					{
						num=num1;
						numstart="";
					}
					if(num.length>4)
					{
						num1=num.substr(0,num.length-3);
						if(num1.length%2==0)
						{
							var num2 = num1.match(/(.{1,2})/g);
							num2.push(num.substr(-3));
							fin=num2.join();
						}
						else
						{
							var num2=num1.substr(1);
							var num3 = num2.match(/(.{1,2})/g);
							num3.push(num.substr(-3));
							fin=num3.join();
							fin=num.substr(0,1)+','+fin;
						}
					}
					else
					{
						fin=num;
					}
					if(!splite[1])
					{
						splite[1]='00';
					}
					return numstart+fin+"."+splite[1];
				}
				else
				{
					return " ";
				}
			}
			else
			{
				return '0.00';
			}
		}
	}
}])