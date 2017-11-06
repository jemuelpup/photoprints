operations.controller('login',function($scope){
	
});

operations.controller('operator',function($scope,$http,dbOperations){
	$scope.catAndItems = [];
	$scope.orders = [];
	$scope.totalPrice = 0;
	$scope.wordSearch = "";
	$scope.customerName = "";
	$scope.databaseData = {};
	$scope.activeCategoryIndex = 0;
	

 	dbOperations.items("getCategoriesAndItems","").then(function(res) {
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
			if($scope.customerName==""){
				alert("Please place the cutomer name");
			}
			else{
				var orderData = {
					cashier_fk:1,
					branch_fk:1,
					operator_fk:1,
					total_amount:$scope.totalPrice,
					customer_name:$scope.customerName,
					items: $scope.orders
				}

				dbOperations.processData("addOrder",orderData,function newTransaction(){
					orderData = {};
					$scope.customerName = "";
					$scope.orders = [];
					$scope.totalPrice = 0;
				})


				$scope.databaseData = {
					customerName:$scope.customerName,
					items:$scope.orders
				}
				// console.log("push the order to the table...");
			}
		}
		else{
			alert("place order first");
			console.log("push order first");
		}
	}
	$scope.showCategoryIndex = function(index){
		$scope.activeCategoryIndex=index;
	}
	$scope.removeItem = function(index,itemTotalPrice){
		$scope.totalPrice -= itemTotalPrice; 
		$scope.orders.splice(index, 1);
	}
});

operations.controller('cashier',function($scope,$http,dbOperations){

	$scope.orders = [];
	$scope.order = {};
	$scope.orderItems = [];
	var receiptPrinted = false;
	

	function getUnclaimedOrders(){
		dbOperations.unclaimedOrders("getUnclaimedOrders","").then(function(res) {
	 		// console.log(res);
	 		$scope.orders = res;
	 		console.log(res)
	 	});
	}

	$scope.viewItemsOrdered = function(order,orderLine){
		// console.log(itemsOrdered);
		$scope.order = order;
		$scope.orderItems = orderLine;
	}
	$scope.printReceipt = function(){
		if(($scope.cash-$scope.order.total_amount)>-1){
			window.print();
			receiptPrinted = true;
		}
		else{
			alert("Not enough money");
		}
	}
	$scope.setOrderPaid = function(){
		if(($scope.cash-$scope.order.total_amount)>-1){
			if(receiptPrinted){
				dbOperations.processData("orderPaid",$scope.order,function paidTransaction(){
					getUnclaimedOrders();
					$scope.order = {};
					$scope.orderItems = [];
					$scope.cash = 0;
					$scope.cash = "";
					receiptPrinted = false;
				})
			}
			else{
				alert("Print the receipt first");
			}
			// console.log("transaction success");
		}
		else{
			alert("Not enough money");
		}
		
	}


	getUnclaimedOrders();

	// var beforePrint = function () {
 //            alert('Functionality to run before printing.');
 //        };

 //    var afterPrint = function () {

 //        alert('Functionality to run after printing');
 //    };

 //    if (window.matchMedia) {
 //        var mediaQueryList = window.matchMedia('print');

 //        mediaQueryList.addListener(function (mql) {
 //            //alert($(mediaQueryList).html());
 //            if (mql.matches) {
 //                beforePrint();
 //            } else {
 //                afterPrint();
 //            }
 //        });
 //    }



	// printing area ....
    // var beforePrint = function() {
    //     console.log('Functionality to run before printing.');
    // };

    // var afterPrint = function() {
    // 	console.log($scope.order.id," ito yung nai-print");
    //     console.log('Functionality to run after printing');
    // };

    // if (window.matchMedia) {
    //     var mediaQueryList = window.matchMedia('print');
    //     mediaQueryList.addListener(function(mql) {
    //     	console.log(mql)
    //         if (mql.matches) {
    //             beforePrint();
    //         } else {
    //             afterPrint();
    //         }
    //     });
    // }

    // window.onbeforeprint = beforePrint;
    // window.onafterprint = afterPrint;

});