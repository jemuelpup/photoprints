var loginEnabled = 1;
var strictModeEnabled = 1;

operations.controller('operator',function($scope,$http,$timeout,dbOperations,systemOperations){

	var newOrderQueued = false;
	var orderPrinted = false;
	/* Testing sessions */
	if(loginEnabled){
		systemOperations.getAccessID().then(function(res){
			if(res.data==='0'){ window.location.href = '/'; }
		});
	}
	if(strictModeEnabled){
		systemOperations.getAccessPosition().then(function(res){
			// console.log(res.data);
			if(!(res.data==='2'||res.data==='6')){ window.location.href = '/'; }
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
	$scope.orderID = "";
	$scope.showQueuedMessage = false;
	$scope.orderNotes = "";
	

 	dbOperations.items("getCategoriesAndItems","").then(function(res) {
 		initCatAndItems = res;
 		$scope.catAndItems = res;
 		// console.log(res);
 	})

	$scope.searchKeyword = function(){
		console.log($scope.wordSearch);
	}
	

	$scope.addToOrder = function(itemID,quantity=1,itemName,code,discount=0,price){
		// discount = !discount ? 1 : discount;
		if(!newOrderQueued){
			var itemTotalPrice = (price*quantity*(100-discount)/100);
			if(quantity>0){
				$scope.orders.push({quantity:quantity,itemID:itemID,itemName:itemName,code:code,discount:discount,price:price,itemTotalPrice:itemTotalPrice});
				// $scope.totalPrice += itemTotalPrice;
				updateTotal();
				// processDataprocessData
			}
			else{
				alert("please enter the right quantity");
			}
			// console.log($scope.orders);
		}
	}
	$scope.customPrice = function(orderIndex,price){
		$scope.orders[orderIndex].price = price;
		// console.log(price);
		updateTotal();
	}

	function updateTotal(){
		$scope.totalPrice = 0;
		($scope.orders).forEach(function(e){
			$scope.totalPrice += (e.price*e.quantity*(100-e.discount)/100);
		});
	}

	$scope.done = function(){
		if(orderPrinted){
			console.log(($scope.orders).length);
			orderData = {};
			$scope.customerName = "";
			$scope.downPayment = "";
			$scope.orders = [];
			$scope.totalPrice = 0;
			newOrderQueued = false;
			$scope.disableEditting = false;
			$scope.showQueuedMessage = false;
			orderPrinted = false;
			$scope.orderNotes = "";
		}
		else{
			alert("Print the order slip first");
		}
	}
	$scope.printOrderSlip = function(){
		if(($scope.orders).length){
			if($scope.disableEditting){
				window.print();
				orderPrinted = true;
			}
			else{
				alert("Save order first");
			}
		}
		else{
			alert("Place order and save it first");
		}
	}
	$scope.saveOrder = function(){
		if(($scope.orders).length){
			$scope.disableEditting = true;
			if(($scope.orders).length){
				if(!newOrderQueued ){//&& false){ // remove the false here
					$scope.downPayment = $scope.downPayment ? $scope.downPayment:0;
					var orderData = {
						cashier_fk:1,
						branch_fk:1,
						operator_fk:1,
						total_amount:$scope.totalPrice,
						customer_name:$scope.customerName,
						down_payment:$scope.downPayment,
						items:$scope.orders,
						notes:$scope.orderNotes
					}
					$scope.showQueuedMessage = true;
					console.log($scope.showQueuedMessage, "ito yun");

					$timeout(function(){
						$scope.showQueuedMessage = false;

					}, 2000);
					console.log(orderData);
					dbOperations.processData("addOrder",orderData).then(function(res){
						console.log(res);
						$scope.orderID = res.orderID;
						newOrderQueued = true;
					},function(res){
						alert(res);
					});
				}
			}
			
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
	$scope.logout = function(){
		dbOperations.processData("Logout","").then(function(res){
			window.location.href = '/';
		});
	}

});

operations.controller('cashier',function($scope,$http,$interval,dbOperations,systemOperations){
	if(loginEnabled){
		systemOperations.getAccessID().then(function(res){
			if(res.data==='0'){ window.location.href = '/'; }
		});
	}
	if(strictModeEnabled){
		systemOperations.getAccessPosition().then(function(res){
			if(!(res.data==='1'||res.data==='6')){ window.location.href = '/'; }
		});
	}
	$scope.orders = [];
	$scope.order = {};
	$scope.orderItems = [];
	$scope.change = 0;
	// check the update per second
	var excecuteGet = true;
	// var receiptPrinted = false; // for printing the receipt
	function getUnclaimedOrders(){
		dbOperations.unclaimedOrders("getUnclaimedOrders","").then(function(res) {
	 		$scope.orders = res;
	 	});
	}
	$scope.viewItemsOrdered = function(order,orderLine){
		$scope.order = order;
		$scope.orderItems = orderLine;
		$scope.change = $scope.order.down_payment - $scope.order.total_amount;
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
			$scope.cash = "";
			alert("Not enough money");
		}
	}
	$scope.logout = function(){
		dbOperations.processData("Logout","").then(function(res){
			window.location.href = '/';
		});
	}


	$scope.stream = $interval(function checkUpdate(){
		// $scope.stream.cancel(stream);
		if(excecuteGet){
			excecuteGet = false;
			$http({
				method: 'get', url: "/operations.json",
				headers: { 'Cache-Control': 'no-cache', 'Pragma':'no-cache' }
			})
			.then(function (res) {
		        if(res.data.hasNewOrders){
		        	getUnclaimedOrders();
		        	// console.log("may new orders");
		        }
				excecuteGet = true;
		    });
		}
	}, 2000);


	getUnclaimedOrders();

});