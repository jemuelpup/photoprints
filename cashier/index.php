<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
	<link rel="stylesheet" href="/plugin/node_modules/materialize-css/dist/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="/common/css/common.css">
	<link rel="stylesheet" href="/operator/css/operator.css">
	<link rel="stylesheet" href="/cashier/css/cashier.css">
	<link rel="stylesheet" href="/cashier/css/print.css">
	<script src="/plugin/node_modules/angular/angular.min.js"></script>
</head>
<body ng-app="operations" ng-controller="cashier">
	
	<div class="container">
		<h1>This is a Heading</h1>
		<p>This is a paragraph.</p>
		<div class="row">
			<div class="col s8">
				<div class="orders">
					<div class="data-header">
						<h4 class="left w50p">Orders</h4>
						<div class="headerSearch right w50p">
							<input placeholder="Search" type="text" class="validate" ng-model="orderFilter" ng-focus="focus=true" ng-blur="focus=false">
						</div>
					</div>
					<table class="table-data">
						<tr>
							<th>Customer name</th>
							<th>Amount</th>
							<th>Payment</th>
							<th>Operator</th>
							<th>Order date</th>
						</tr>
						<tr ng-repeat="order in orders|filter:orderFilter" ng-click="viewItemsOrdered(order,order.order_line)">
							<td>{{order.customer_name}}</td>
							<td>{{order.total_amount}}</td>
							<td>{{order.payment}}</td>
							<td>{{order.operator_fk}}</td>
							<td>{{order.order_date}}</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="col s4">
				<div id="section-to-print">
					<div class="order-details">
						<div class="data-header">
							<h4 class="left">Items</h4>
							<div class="headerInput">
								<input placeholder="Cash" type="number"  ng-model="cash">
							</div>
						</div>
					</div>
					<table>
						<tr>
							<th>Item</th>
							<th>Price</th>
							<th>Qty</th>
							<th>Disc</th>
							<th>Total</th>
						</tr>
						<tr ng-repeat="orderItem in orderItems">
							<td>{{orderItem.name}}-{{orderItem.multiplyer}}</td>
							<td>{{orderItem.price*orderItem.multiplyer}}</td>
							<td> x {{orderItem.quantity}}</td>
							<td>{{orderItem.discount}}%</td>
							<td>{{orderItem.price*orderItem.quantity*(100-orderItem.discount)/100}}</td>
						</tr>
					</table>
					<p>Total: Php. {{order.total_amount}}</p>
					<p>Cash: Php. {{cash}}</p>
					<p>Change: Php. <span>{{cash-order.total_amount}}</span></p>
					<p>------------------------</p>
				</div>
				 <button class="btn waves-effect waves-light" name="action" ng-click="printReceipt()">Print<i class="material-icons right">local_printshop</i></button>
				 <button class="btn waves-effect waves-light right" name="action" ng-click="setOrderPaid(order.id);">Paid<i class="material-icons right">payment</i></button>
			</div>
		</div>
		
	</div>


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