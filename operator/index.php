<!DOCTYPE html>
<html>
<head>
	<title>Operator</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/plugin/node_modules/materialize-css/dist/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="/common/css/common.css">
	<link rel="stylesheet" href="/operator/css/operator.css">
	<script src="/plugin/node_modules/angular/angular.min.js"></script>
</head>
<body ng-app="operations" ng-controller="operator">




	<div class="container">
		<h1>Operator</h1>
		<p>This is a paragraph.</p>
		<ul class="category-list">
			<li ng-repeat="category in catAndItems" ng-click="showCategoryIndex($index)">{{category.categoryName}}</li>
		</ul>
		<div class="row">
			<div class='col l7 ms12'>
				<div class="row">
					<div class='col s12' ng-repeat="category in catAndItems">
						<div class='categories z-depth-2' ng-class="{active: $index==activeCategoryIndex}">
							<div class="data-header">
								<h4 class="left w50p">{{category.categoryName}}</h4>
								<div class="headerSearch right w50p">
									<input placeholder="Search" id="{{category.categoryName}}" type="text" class="validate" ng-model="itemFilter" ng-focus="focus=true" ng-blur="focus=false">
								</div>
							</div>
							<div class='menu'>
								<table>
									<tr>
										<th>Name</th>
										<!-- <th>Code</th> -->
										<th>Price</th>
										<th>Quantity</th>
										<th>Multiplyer</th>
										<th>Discount(%)</th>
									</tr>
									<!-- <p><input type="text" ng-model="test"></p> -->
									<tr ng-repeat="item in category.items | filter:itemFilter">
										<td>{{item.name}}</td>
										<!-- <td>{{item.item_code}}</td> -->
										<td>{{item.price}}</td>
										<td><input ng-model="quantity" type='number'/></td>
										<td><input ng-model="multiplyer" type='number' ng-value="string"/></td>
										<td><input ng-model="discount" type='number'/></td>
										<td><button ng-click='addToOrder(item.id,quantity,item.name,item.item_code,multiplyer,discount,item.price,itemDesc)'>Add</button></td>
										<td></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col l5 ms12">
				<div class="row">
					<div class="col s12">
						<div id="section-to-print">
							<div class="ordered-items z-depth-2">
								<div class="data-header">
									<div class="showOnPrint">
										<p>OrderSlip</p>
									</div>
									<h4>Ordered Items</h4>
								</div>
								<div class="orders">
					        		<input placeholder="Customer name" id="customer-name" type="text" class="validate" ng-model="customerName">
					        		<input placeholder="Down payment" id="down-payment" type="number" class="validate" ng-model="downPayment" min="0">
									<table>
										<tr>
											<th>Item</th>
											<th>Desc</th>
											<th>Price</th>
											<th>Qty</th>
											<th>Disc</th>
											<th>Total</th>
										</tr>
										<tr ng-repeat="order in orders" class="show-on-hover" ng-init="active = false" ng-class="{'noHover':disableEditting}">
											<td><button class="edit-btn" ng-click="active=true">Edit Price</button>{{order.itemName}}-{{order.multiplyer}}
											</td>
											<td>
													<input ng-model="itemDesc" type="text" ng-keyup = "orderedItemDesc($index,itemDesc)">
											</td>
											<td>{{order.price*order.multiplyer}}
												<div class="customPrice" ng-class="{'active': active === true}">
													<input ng-model="cPrice" type="number" ng-keyup = "customPrice($index,cPrice)">
												</div>
											</td>
											<td> x {{order.quantity}}</td>
											<td>{{order.discount}}%</td>
											<td>{{order.itemTotalPrice}} <button class="close-btn" ng-click="removeItem(orders.indexOf(order),order.itemTotalPrice);">x</button></td>
										</tr>
									</table>

									<p>Total: Php. {{totalPrice}}</p>
									<p>Down payment: Php. {{downPayment ? downPayment : 0}}</p>
									<p>------------------------</p>
									<!-- create table here and remove orders
									{{orders}}
									{{databaseData}} -->
									<button ng-click="printOrderSlip()">Print order slip</button>
									<button ng-click="addToQueue()">Set orders</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- <div class="category" ng-repeat=""></div> -->

<script src="/plugin/node_modules/jquery/dist/jquery.min.js"></script>
	<script src="/common/js/angularFiles/modules.js"></script>
	<script src="/common/js/angularFiles/services.js"></script>
	<!-- <script src="/common/js/angularFiles/directives.js"></script>
	<script src="/common/js/angularFiles/filters.js"></script> -->
	<script src="/common/js/angularFiles/controllers.js"></script>
	<script>
		// $(document).ready(function() {
	 //    Materialize.updateTextFields();
	 //  });
	</script>
		
</body>
</html>