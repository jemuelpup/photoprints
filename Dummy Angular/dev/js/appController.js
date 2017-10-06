app.controller("cards",function($http,$scope){
	
	$scope.profileCard01Active = "";

	$http.get('db/members.php').then(function(res){
		$scope.data = res.data;
	});

	
  $scope.setActive = function(){
  	$scope.profileCard01Active = $scope.profileCard01Active  === "active" ?"":"active";
  };
});

app.controller("svg",function($scope,animate){
	// animate.animateLogo();
	angular.element(document.getElementById("#Layer_1")).css("height",'200px');
	console.log("jemuel");
	// angular.element(document.getElementByID("#Layer_1")).css('width','10px');
})