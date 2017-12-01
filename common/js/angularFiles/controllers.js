var loginEnabled = 0;
var strictModeEnabled = 0;

operations.controller('operator',function($scope,$http,dbOperations,systemOperations){

	var orderSlipPrinted = false;
	var lockAddToQueue = false;
	/* Testing sessions */
	if(loginEnabled){
		systemOperations.getAccessID().then(function(res){
			if(res.data==='0'){ window.location.href = '/'; }
		});
	}
	if(strictModeEnabled){
		systemOperations.getAccessPosition().then(function(res){
			console.log(res.data);
			if(!(res.data==='2')){ window.location.href = '/'; }
		});
	}
	/* Initial datas: */
	var initCatAndItems = [];
	/* /Testing sessions */
	$scope.catAndItems = [];
	$scope.orders = [];
	$scope.totalPrice = 0;
	$scope.wordSearch = "";
	$scope.customerName = "";
	$scope.databaseData = {};
	$scope.activeCategoryIndex = 0;
	$scope.disableEditting = false;
	

 	dbOperations.items("getCategoriesAndItems","").then(function(res) {
 		initCatAndItems = res;
 		$scope.catAndItems = res;
 	})

	$scope.searchKeyword = function(){
		// console.log($scope.wordSearch);
	}
	

	$scope.addToOrder = function(itemID,quantity=1,itemName,code,multiplyer=1,discount=0,price,itemDesc=""){
		// discount = !discount ? 1 : discount;
		var itemTotalPrice = (multiplyer*price*quantity*(100-discount)/100);
		if(quantity>0){
			$scope.orders.push({quantity:quantity,itemID:itemID,itemName:itemName,code:code,multiplyer:multiplyer,discount:discount,price:price,itemTotalPrice:itemTotalPrice,desc:itemDesc});
			// $scope.totalPrice += itemTotalPrice;
			updateTotal();
			// processDataprocessData
		}
		else{
			alert("please enter the right quantity");
		}
		console.log($scope.orders);
	}
	
	$scope.orderedItemDesc = function(orderIndex,itemDesc){
		$scope.orders[orderIndex].desc = itemDesc;
		console.log(itemDesc);
	}
	$scope.customPrice = function(orderIndex,price){
		$scope.orders[orderIndex].price = price;
		console.log(price);
		updateTotal();
	}

	function updateTotal(){
		$scope.totalPrice = 0;
		($scope.orders).forEach(function(e){
			$scope.totalPrice += (e.multiplyer*e.price*e.quantity*(100-e.discount)/100);
		});
	}
	$scope.addToQueue = function(){
		// console.log(($scope.orders).length);
		if(!lockAddToQueue)
		if(($scope.orders).length){
			if(orderSlipPrinted){
				if($scope.customerName==""){
					alert("Please place the cutomer name");
				}
				else{

					$scope.downPayment = $scope.downPayment ? $scope.downPayment:0;
					var orderData = {
						cashier_fk:1,
						branch_fk:1,
						operator_fk:1,
						total_amount:$scope.totalPrice,
						customer_name:$scope.customerName,
						down_payment:$scope.downPayment,
						items: $scope.orders
					}
					dbOperations.processData("addOrder",orderData).then(function(res){
						if((res.indexOf("DatabaseConnectionError"))==-1){
							orderData = {};
							$scope.customerName = "";
							$scope.downPayment = 0;
							$scope.orders = [];
							$scope.totalPrice = 0;
						}
						else{
							alert("Something wrong in intranet connection. Check the server.");
						}
						lockAddToQueue = true;
					},function(res){
						alert(res);
						lockAddToQueue = true;
					});
				}
			}
			else{	alert("Print the order slip first");	}
		}
		else{	alert("place order first");	}
	}
	$scope.showCategoryIndex = function(index){
		$scope.activeCategoryIndex=index;
	}
	$scope.removeItem = function(index,itemTotalPrice){
		// $scope.totalPrice -= itemTotalPrice; 
		$scope.orders.splice(index, 1);
		updateTotal();
	}
	$scope.printOrderSlip = function(){
		if(($scope.orders).length){
			if($scope.customerName==""){
				alert("Please place the cutomer name");
			}
			else{

				$scope.disableEditting = true;
				orderSlipPrinted = true;
				window.print();
			}
		}
		else{	alert("place order first");	}
	}
});

operations.controller('cashier',function($scope,$http,dbOperations,systemOperations){
	if(loginEnabled){
		systemOperations.getAccessID().then(function(res){
			if(res.data==='0'){ window.location.href = '/'; }
		});
	}
	if(strictModeEnabled){
		systemOperations.getAccessPosition().then(function(res){
			if(!(res.data==='1')){ window.location.href = '/'; }
		});
	}
	$scope.orders = [];
	$scope.order = {};
	$scope.orderItems = [];
	$scope.change = 0;
	// var receiptPrinted = false; // for printing the receipt
	

	function getUnclaimedOrders(){
		dbOperations.unclaimedOrders("getUnclaimedOrders","").then(function(res) {
	 		console.log(res);
	 		$scope.orders = res;
	 		console.log(res)
	 	});
	}

	$scope.viewItemsOrdered = function(order,orderLine){
		$scope.order = order;
		$scope.orderItems = orderLine;
		$scope.change = $scope.order.down_payment - $scope.order.total_amount;
		console.log($scope.order,"ito na ako");

	}
	$scope.printReceipt = function(){
		if(($scope.cash-$scope.order.total_amount)>-1){
			window.print();
			// receiptPrinted = true; // for printing the receipt
		}
		else{
			alert("Not enough money");
		}
	}
	$scope.setOrderPaid = function(){
		$scope.cash = $scope.cash ? $scope.cash : 0;
		if(($scope.change+$scope.cash)>=0){
			// if(receiptPrinted){ // for printing the receipt
				$scope.order.cash = $scope.cash;
				dbOperations.processData("orderPaid",$scope.order).then(function(res){
					getUnclaimedOrders();
					$scope.order = {};
					$scope.orderItems = [];
					$scope.cash = 0;
					$scope.cash = "";
					receiptPrinted = false;
					$scope.change = 0;
				})
			// } // for printing the receipt
			// else{ // for printing the receipt
			// 	alert("Print the receipt first"); // for printing the receipt
			// } // for printing the receipt
			
		}
		else{
			alert("Not enough money");
		}
		/**/
		
	}


	getUnclaimedOrders();

});