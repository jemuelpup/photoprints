<?php
	include 'modals.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Page Title</title>
		<link rel="stylesheet" href="/plugin/node_modules/materialize-css/dist/css/materialize.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="/admin/css/style.css">
		<script src="/plugin/node_modules/angular/angular.min.js"></script>
	</head>
	<body ng-app="photoPrints">
		<header>
			<div class="sidenav fixed">
				<h1><img src="/common/images/logo.png" alt=""></h1>
				<ul class="navigation">
					<li ng-controller="productManagement">
						<a href="#" class="product-management-btn"><i class="small material-icons">note_add</i><span>Product management</span></a>
					</li>
					<li ng-controller="employeeManagement">
						<a href="#" class="employee-management-btn" ng-click="employeeManagementInit()"><i class="small material-icons">person</i><span><span>Employee management</span></a>
					</li>
					<li ng-controller="buisnessManagement">
						<a href="#" class="buisness-management-btn"><i class="small material-icons">business</i><span><span>Buisness management</span></a>
					</li>
					<li ng-controller="reports">
						<a href="#" class="reports-btn"><i class="small material-icons">library_books</i><span><span>Reports</span></a>
					</li>
				</ul>
			</div>
		</header>
		<main>
			<div class="banner-area">
				<div class="container">
					<h2>Point of sale System</h2>
				</div>
			</div>
			<section class="product-management" ng-controller="productManagement">
				<div class="container">
					<h2>Product management</h2>
					<div class="row">
						<div class="col s12">
							<?php getCategoryUpdateModal(); ?>
							<div class="row">
								<div class="col s6">
									<div class="category">
										<h3>Category</h3>
										<form action="#" ng-submit="addNewCategory()">
											<div class="input-field col s12">
											    <input ng-model="categoryFields.name" value="adasfdadsfasdf" type="text" class="validate" maxlength="50" required="">
											    <label for="name">name</label>
											</div>
											<div class="input-field col s12">
											    <input ng-model="categoryFields.category_code" value="sdfsdfsdf" type="text" class="validate" maxlength="10">
											    <label for="category_code">category_code</label>
											</div>
											<div class="input-field col s12">
											    <input ng-model="categoryFields.description" value="sdfsdfsdf" type="text" class="validate" maxlength="500">
											    <label for="description">description</label>
											</div>
							        <button class="waves-effect waves-light btn" type="submit">Add</button>
							        <a class="waves-effect waves-light btn">Clear</a>
						        </form>
					        </div>
				        </div>
				        <div class="col s6">
				        	<div class="category-list-table">
				        		<h3>Item category</h3>
				        		<div class="data-table-container">
									<table class="data-clickable">
										<tbody>
											<tr>
												<th>name</th>
												<th>category_code</th>
												<th>description</th>
											</tr>
											<tr ng-repeat="x in categories" data-id="{{x.id}}">
												<td name="name">{{x.name}}</td>
												<td name="category_code">{{x.category_code}}</td>
												<td name="description">{{x.description}}</td>
											</tr>
										</tbody>
									</table>
								</div>
					        	<button class="waves-effect waves-light btn" id="edit-category-trigger">Edit</button>
						        <a class="waves-effect waves-light btn">Delete</a>
						      </div>
				        </div>
				      </div>
						</div>
						<div class="col s12">
							<div class="row">
								<div class="col s6">
									<div class="item">
					        	<h3>Item</h3>
					        	<form action="#" ng-submit="addNewItem()">
						        	<div class="input-field col s12">
											    <input ng-model="itemFields.name" value="" type="text" class="validate" maxlength="50" required="">
											    <label for="name">name</label>
											</div>
											<div class="input-field col s12">
											    <input ng-model="itemFields.code" value="" type="text" class="validate" maxlength="10">
											    <label for="item_code">item_code</label>
											</div>
											<div class="input-field col s12">
													<select name="itemCategory" id="category" ng-model="itemFields.category">
														<option value="" disabled selected>Choose your option</option>
														<option value="{{c.id}}" ng-repeat="c in categories">{{c.name}}</option>
													</select>
											    <label>Category</label>
											</div>
											<div class="input-field col s12">
											    <input ng-model="itemFields.price" value="" type="number" class="validate" maxlength="11">
											    <label for="price">price</label>
											</div>
							        <button class="waves-effect waves-light btn" type="submit">Add</button>
						        </form>
						        <a class="waves-effect waves-light btn">Clear</a>
					        </div>
								</div>
								<div class="col s6">
									<?php getItemUpdateModal(); ?>
									<div class="item-list-table">
										<h3>Item list</h3>
										<div class="data-table-container">
											<table class="data-clickable">
											    <tbody>
											        <tr>
											            <th>name</th>
											            <th>code</th>
											            <th>category_fk</th>
											            <th>date_modified</th>
											            <th>price</th>
											        </tr>
											        <tr ng-repeat="i in items" data-id="{{x.id}}" ng-click="itemIndex($index,x.id)">
											            <td>{{i.name}}</td>
											            <td>{{i.item_code}}</td>
											            <td>{{i.category_fk}}</td>
											            <td>{{i.date_modified}}</td>
											            <td>{{i.price}}</td>
											        </tr>
											    </tbody>
											</table>
										</div>
										<a class="waves-effect waves-light btn" ng-click="editItemsTrigger()">Edit</a>
						        <a class="waves-effect waves-light btn" ng-click="deleteItem()">Delete</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="employee-management" ng-controller="employeeManagement">
				<div class="container">
					<h2>Employee management</h2>
					<div class="row">
						<div class="col s12" ng-controller="buisnessManagement">
							<?php getEmployeeModal(); ?>
							<?php getAddAccountModal(); ?>
							<a class="btn-floating btn-large waves-effect waves-light fixed-bottom-right" ng-click="newEmployee()"><i class="material-icons">add</i></a>
						</div>
						<div class="col s12">
							<div class="employee-list">
								<h3>Employee list</h3>
								<table class="data-clickable">
								    <tbody>
								        <tr>
								            <th>name</th>
								            <th>address</th>
								            <th>contact_number</th>
								            <th>email</th>
								            <th>position</th>
								            <th>branch_fk</th> 
								            <th>salary</th>
								            <th>birth_day</th>
								            <th>gender</th>
								        </tr>
								        <tr ng-click="getEmployeeInfo(employee.id)"; ng-repeat="employee in employees" data-id="{{employee.id}}">
								        	<!-- <td>{{employee}}</td> -->
								            <td>{{employee.name}}</td>
								            <td>{{employee.address}}</td>
								            <td>{{employee.contact_number}}</td>
								            <td>{{employee.email}}</td>
								            <td>{{employee.position_name}}</td>
								            <td>{{employee.branch_name}}</td>
								            <td>{{employee.salary}}</td>
								            <td>{{employee.birth_day|shortDateFromat}}</td>
								            <td>{{employee.gender|gender}}</td>
								        </tr>
								    </tbody>
								</table>
								<a class="waves-effect waves-light btn" ng-click="editEmployeeData()">Edit</a>
							  <a class="waves-effect waves-light btn" ng-click="deleteEmployee()">Delete</a>
							  <a class="waves-effect waves-light btn" ng-click="newEmployeeAccess()">Add Access</a>
						  </div>
						</div>
					</div>
				</div>
			</section>
			<section class="buisness-management" ng-controller="buisnessManagement">
				<div class="container">
					<h2>Buisness management</h2>
					<div class="row">
						<div class="col s12">
							<h3>Branch management</h3>
							<div class="row">
				      	<div class="col s6">
				      		<div class="branch">
										<h4>Add Branch</h4>
										<form action="#" ng-submit="newBranch()">
											<div class="input-field col s12">
												<input ng-model="branchFields.name" value="" type="text" class="validate" maxlength="50" required>
												<label for="name">name</label>
											</div>
											<div class="input-field col s12">
												<input ng-model="branchFields.address" value="" type="text" class="validate" maxlength="200">
												<label for="address">address</label>
											</div>
											<div class="input-field col s12">
												<input ng-model="branchFields.description" value="" type="text" class="validate" maxlength="200">
												<label for="description">description</label>
											</div>
											<div class="input-field col s12">
												<input ng-model="branchFields.branch_code" value="" type="text" class="validate" maxlength="10" required>
												<label for="branch_code">branch_code</label>
											</div>
							        <button class="waves-effect waves-light btn" type="submit">Add</button>
								      <a class="waves-effect waves-light btn">Clear</a>
							      </form>
						      </div>
					      </div>
					      <div class="col s6">
									<h4>Branch list</h4>
									<table>
										<tbody>
											<tr>
												<th>name</th>
												<th>address</th>
												<th>description</th>
												<th>branch_code</th>
											</tr>
											<tr ng-repeat="branch in branches" data-id="{{branch.id}}">
												<td name="name">{{branch.name}}</td>
												<td name="address">{{branch.address}}</td>
												<td name="description">{{branch.description}}</td>
												<td name="branch_code">{{branch.branch_code}}</td>
											</tr>
										</tbody>
									</table>
									<a class="waves-effect waves-light btn">Edit</a>
						      <a class="waves-effect waves-light btn">Delete</a>
								</div>
				      </div>
						</div>
						<div class="col s12">
							<h3>Employee position management</h3>
							<div class="row">
				      	<div class="col s6">
				      		<div class="position">
					      		<form action="#" ng-submit="newPosition()">
											<h4>Add Employee Position</h4>
											<div class="input-field col s12">
											    <input ng-model="positionFields.name" value="" type="text" class="validate" maxlength="50" required="">
											    <label for="name">name</label>
											</div>
											<div class="input-field col s12">
											    <input ng-model="positionFields.description" value="" type="text" class="validate" maxlength="500">
											    <label for="description">description</label>
											</div>
							        <button class="waves-effect waves-light btn" type="submit">Add</button>
								      <a class="waves-effect waves-light btn">Clear</a>
							      </form>
						      </div>
					      </div>
					      <div class="col s6">
									<h4>Employee Position list</h4>
									<table>
										<tbody>
											<tr>
												<th>name</th>
												<th>description</th>
											</tr>
											<tr ng-repeat="position in positions" data-id="{{x.id}}">
												<td name="name">{{position.name}}</td>
												<td name="description">{{position.description}}</td>
											</tr>
										</tbody>
									</table>
									<a class="waves-effect waves-light btn">Edit</a>
						      <a class="waves-effect waves-light btn">Delete</a>
								</div>
				      </div>
						</div>
					</div>
				</div>
			</section>
			<section class="reports-management" ng-controller="reports">
				<div class="container">
					<div class="row">
						<div class="col s6">
							<h2>Sales</h2>
							<input type="date" ng-model="selectedDate" ng-change="getTransactionData()" class="datepicker">
							<form action="#">
						    <ul>
						    	<li ng-repeat="repFilter in reportFilters">
						    		<input name="reportFilter1" class="filled-in" type="radio" id={{repFilter.id}} />
						      	<label for={{repFilter.id}}>{{repFilter.name}}</label>
						    	</li>
						    </ul>
						  </form>
							<p>Total sales : {{totalSales}}</p>
						</div>
						<div class="col s6">
							<h2>Transactions</h2>
							<table>
								<tr>
									<th>branch_fk</th>
									<th>cashier_fk</th>
									<th>customer_name</th>
									<th>operator_fk</th>
									<th>payment</th>
									<th>total_amount</th>
								</tr>
								<tr ng-repeat="transaction in transactions">
									<td>{{transaction.branch_fk}}</td>
									<td>{{transaction.cashier_fk}}</td>
									<td>{{transaction.customer_name}}</td>
									<td>{{transaction.operator_fk}}</td>
									<td>{{transaction.payment}}</td>
									<td>{{transaction.total_amount}}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</section>
		</main>


		
		<script src="/plugin/node_modules/jquery/dist/jquery.min.js"></script>
		<script src="/plugin/node_modules/materialize-css/dist/js/materialize.min.js"></script>

		<script src="/admin/js/angularFiles/modules.js"></script>
		<script src="/admin/js/angularFiles/services.js"></script>
		<script src="/admin/js/angularFiles/directives.js"></script>
		<script src="/admin/js/angularFiles/filters.js"></script>
		<script src="/admin/js/angularFiles/controllers.js"></script>
		
		<!-- <script src="/common/js/operations.js"></script> -->
		<script src="/admin/js/view.js"></script>
		<script src="/admin/js/main.js"></script>
		<!-- <script src="http://localhost:3000/socket.io/socket.io.js"></script>
		<script>
		  var socket = io();
		</script> -->
	</body>
</html>