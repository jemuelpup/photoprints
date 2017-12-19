<!DOCTYPE html>
<html>
<head>
	<title>Operator</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/plugin/materialize-css/dist/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="/common/css/common.css">
	<link rel="stylesheet" href="/operator/css/operator.css">
	<script src="/plugin/angular/angular.min.js"></script>
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
										<th>Price</th>
										<th>Quantity</th>
										<th>Discount(%)</th>
									</tr>
									<tr ng-repeat="item in category.items | filter:itemFilter">
										<td>{{item.name}}</td>
										<td>{{item.price}}</td>
										<td><input ng-model="quantity" type='number'/></td>
										<td><input ng-model="discount" type='number'/></td>
										<td><button ng-click='addToOrder(item.id,quantity,item.name,item.item_code,discount,item.price,itemDesc)'>Add</button></td>
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
								<div class="queuedDataMsg hideOnPrint" ng-class="showQueuedMessage===true ? 'active' : ''">
									<p class="center-align">New orders queued. Print the order slip.</p>
								</div>
								<div class="data-header pr-pb0">
									<div class="showOnPrint center-align">
										<img src="/common/images/logoForReceipt.png" alt="PHOTOPRINTS">
									</div>
									<div class="showOnPrint">
										<p class="centerOnPrint pr-mb4">OrderSlip</p>
										<p class="left-align b">Order id: {{orderID}}</p>
									</div>
									<h4 class="hideOnPrint">Ordered Items</h4>
								</div>
								<div class="orders pr-pt0">
									<p class="showOnPrint pr-m0">Cutomer name:</p>
			        		<input placeholder="Customer name" id="customer-name" type="text" class="validate" ng-model="customerName">
			        		<input placeholder="Down payment" id="down-payment" type="number" class="validate hideOnPrint" ng-model="downPayment" min="0">
			        		<h4 class="text14pxOnPrint showOnPrint">Ordered Items</h4>
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
											<td><button class="edit-btn" ng-click="active=true">Edit Price</button>{{order.itemName}}
											</td>
											<td>
												<input ng-model="itemDesc" type="text" ng-keyup = "orderedItemDesc($index,itemDesc)">
											</td>
											<td>{{order.price}}
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
									<div class="hideOnPrint">
										<button ng-click="saveOrder()">Save</button>
										<button ng-click="printOrderSlip()">Print order slip</button>
										<button ng-click="done()">Done</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- <div class="category" ng-repeat=""></div> -->

<script src="/plugin/jquery/dist/jquery.min.js"></script>
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