<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
	<link rel="stylesheet" href="/plugin/node_modules/materialize-css/dist/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="/operator/css/operator.css">
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
						<h4 class="left">Orders</h4>
						<div class="categoryHeaderSearch right">
							<input placeholder="Search" type="text" class="validate" ng-model="orderFilter" ng-focus="focus=true" ng-blur="focus=false">
						</div>
					</div>
					<table>
						<tr>
							<th>Customer name</th>
							<th>Amount</th>
							<th>Payment</th>
							<th>Operator</th>
							<th>Order date</th>
						</tr>
						<tr ng-repeat="order in orders|filter:orderFilter">
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
				<div class="order-details">
					items
				</div>
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