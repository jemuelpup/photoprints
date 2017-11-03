<?php

	class Item{
		function Item($id,$name){
			$this->id = $id;
			$this->name = $name;
		}
	}
	require $_SERVER['DOCUMENT_ROOT'].'/common/dbconnect.php';
	$categoryArray = [];
	$res = $conn->query("SELECT id,name FROM `category_tbl` WHERE 1");

	$categories = [];
	if($res->num_rows>0){
		while($row = $res->fetch_assoc()){
			array_push($categories, (new Item($row['id'],$row['name'])));
		}
	}
	
?>

<!DOCTYPE html>
<html>
<head>
<title>Operator</title>
	<link rel="stylesheet" href="/plugin/node_modules/materialize-css/dist/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="/operator/css/operator.css">
	<script src="/plugin/node_modules/angular/angular.min.js"></script>
</head>
<body ng-app="operations" ng-controller="operator">




	<div class="container">
		<h1>This is a Heading</h1>
		<p>This is a paragraph.</p>
		<ul class="category-list">
			<li ng-repeat="category in catAndItems" ng-click="showCategoryIndex($index)">{{category.categoryName}}</li>
		</ul>
		<div class="row">
			<div class='col s8'>
				<div class="row">
					<div class='col s12' ng-repeat="category in catAndItems">
						<div class='categories z-depth-2' ng-class="{active: $index==activeCategoryIndex}">
							<div class="data-header">
								<h4 class="left">{{category.categoryName}}</h4>
								<div class="categoryHeaderSearch right">
									<input placeholder="Search" id="{{category.categoryName}}" type="text" class="validate" ng-model="itemFilter" ng-focus="focus=true" ng-blur="focus=false">
								</div>
							</div>
							
							
							<div class='menu'>
								<table>
									<tr>
										<th>Name</th>
										<th>Code</th>
										<th>Price</th>
										<th>Quantity</th>
										<th>Multiplyer</th>
										<th>Discount(%)</th>
									</tr>
									<!-- <p><input type="text" ng-model="test"></p> -->
									<tr ng-repeat="item in category.items | filter:itemFilter">
										<td>{{item.name}}</td>
										<td>{{item.item_code}}</td>
										<td>{{item.price}}</td>
										<td><input ng-model="quantity" type='number'/></td>
										<td><input ng-model="multiplyer" type='number' ng-value="string"/></td>
										<td><input ng-model="discount" type='number'/></td>
										<td><button ng-click='addToOrder(item.id,quantity,item.name,item.item_code,multiplyer,discount,item.price)'>Add</button></td>
										<td></td>
									</tr>
								</table>
							</div>
						</div>
					</div>





				</div>
			</div>
			<div class="col s4">
				<div class="row">
					<div class="col s12">
						<div class="ordered-items z-depth-2">
							<div class="data-header">
								<h4>Ordered Items</h4>
							</div>
							<div class="orders">
				          <input placeholder="Customer name" id="customer-name" type="text" class="validate" ng-model="customerName">
								<table>
									<tr>
										<th>Item</th>
										<th>Price</th>
										<th>Qty</th>
										<th>Disc</th>
										<th>Total</th>
									</tr>
									<tr ng-repeat="order in orders" class="show-on-hover">
										<td>{{order.itemName}}-{{order.multiplyer}}</td>
										<td>{{order.price*order.multiplyer}}</td>
										<td> x {{order.quantity}}</td>
										<td>{{order.discount}}%</td>
										<td>{{order.itemTotalPrice}} <button class="close-btn" ng-click="removeItem(orders.indexOf(order),order.itemTotalPrice);">x</button></td>

									</tr>
								</table>

								<p>Total:{{totalPrice}}</p>
								<p>------------------------</p>
								<!-- create table here and remove orders
								{{orders}}
								{{databaseData}} -->
								<button ng-click="addToQueue()">Set orders</button>
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