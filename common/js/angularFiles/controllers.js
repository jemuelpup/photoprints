operations.controller('login',function($scope){
	
});

var orderedItem = {
	itemID: 0,
	price: 0,
	quantity: 0
}

operations.controller('operator',function($scope,$http,dbOperations){
	$scope.catAndItems = [];
	$scope.orders = [];
	$scope.totalPrice = 0;
	$scope.wordSearch = "";
	$scope.customerName = "";
	$scope.databaseData = {};
	$scope.activeCategoryIndex = 0;
	

 	dbOperations.items("getCategoriesAndItems","",function wala(){}).then(function(res) {
 		// console.log(res);
 		$scope.catAndItems = res;
 	})

	$scope.searchKeyword = function(){
		// console.log($scope.wordSearch);
	}
	

	$scope.addToOrder = function(itemID,quantity=1,itemName,code,multiplyer=1,discount=0,price){
		// discount = !discount ? 1 : discount;
		var itemTotalPrice = (multiplyer*price*quantity*(100-discount)/100);
		if(quantity>0){
			$scope.orders.push({quantity:quantity,itemID:itemID,itemName:itemName,code:code,multiplyer:multiplyer,discount:discount,price:price,itemTotalPrice:itemTotalPrice});
			$scope.totalPrice += itemTotalPrice;

			// processDataprocessData
		}
		else{
			alert("please enter the right quantity");
		}
	}
	
	$scope.addToQueue = function(){
		// console.log($scope.orders);
		if(($scope.orders).length){

			var orderData = {
				cashier_fk:1,
				branch_fk:1,
				operator_fk:1,
				total_amount:$scope.totalPrice,
				customer_name:$scope.customerName,
				items: $scope.orders
			}

			dbOperations.processData("addOrder",orderData,function wala(){})


			$scope.databaseData = {
				customerName:$scope.customerName,
				items:$scope.orders
			}
			console.log("push the order to the table...");
		}
		else{
			console.log("push order first");
		}
	}
	$scope.showCategoryIndex = function(index){
		// console.log(index);
		$scope.activeCategoryIndex=index;
	}
});