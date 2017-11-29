operations.controller('login',function($scope,$http,dbOperations){
	console.log("nasa login ako");
	var loading = false;
	// access working...
	$scope.validateAcess = function(){
		
		
		console.log($scope.loginForm);

		dbOperations.access($scope.loginForm).then(function(res){
			// console.log(res);
			console.log(res.position);
			var access = "";
			switch(res.position){
				case "1":{
					access = "/cashier";
				}break;
				case "2":{
					access = "/operator";
				}break;
				case "3":{
					access = "/admin";
				}break;
				default:{
					access = "/";
				}break;
			}
			if(res.position){
				window.location.href = access;
			}
			else{
				// make ivalid access message here
			}
		});


		
	}
});