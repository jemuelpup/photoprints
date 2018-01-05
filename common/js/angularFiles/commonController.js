var reports = function($scope,$http,dbOperations,$interval){
	$scope.selectedDate = new Date();
	$scope.transactions = [];
	$scope.totalSales = 0;
	$scope.transactionNotes = "";
	$scope.reportFilters = [
		{"name":"Daily","id":"d1","val":1},
		{"name":"Weekly","id":"d2","val":2},
		{"name":"Monthly","id":"d3","val":3},
		{"name":"Yearly","id":"d4","val":4},
	];
	getTotalSalesOn($scope.selectedDate);
	getTransationsOn($scope.selectedDate);
	
	console.log($scope.selectedDate);
	function getTotalSalesOn(selectedDate){
		dbOperations.getData('getTotalSales',selectedDate).then(function(res) {
			$scope.totalSales = res.data;
		});
	}
	function getTransationsOn(selectedDate){
		dbOperations.getData('getTransationsData',selectedDate).then(function(res) {
			$scope.transactions = res.data;
			// console.log(res);
		});
	}
	$scope.getTransactionNotes = function(i){
		$scope.transactionNotes = $scope.transactions[i].notes;
	}
	$scope.getTransactionData = function(){
		getTotalSalesOn($scope.selectedDate);
		getTransationsOn($scope.selectedDate);
	}
}
